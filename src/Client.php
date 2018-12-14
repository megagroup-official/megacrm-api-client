<?php

namespace Megagroup\MegaCrm\Api;

use GuzzleHttp;

class Client
{

    const DEFAULT_ENDPOINT = 'https://api.megacrm.ru/v1/';

    /**
     * @var int
     */
    private $account_id;

    /**
     * @var string
     */
    private $api_key;

    /**
     * @var GuzzleHttp\Client
     */
    private $http_client;

    /**
     * @param int               $account_id
     * @param string            $api_key
     * @param GuzzleHttp\Client $http_client
     */
    public function __construct(
        $account_id,
        $api_key,
        GuzzleHttp\Client $http_client = null
    ) {
        $this->account_id = $account_id;
        $this->api_key = $api_key;
        $this->http_client = $http_client ?: self::createHttpClient();
    }

    /**
     * @param RequestInterface $request
     *
     * @return mixed
     */
    public function send(RequestInterface $request)
    {
        $options = [
            'headers' => $this->getHttpRequestHeaders($request),
        ];

        if ($request->getMethod() == 'GET') {
            $options['query'] = $request->jsonSerialize();
        } else {
            $options['json'] = $request->jsonSerialize();
        }

        try {
            $response = $this->http_client->request(
                $request->getMethod(),
                $request->getUrl(),
                $options
            );
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            if ($e instanceof GuzzleHttp\Exception\RequestException) {
                $response = $e->getResponse();

                if (!$response) {
                    throw new Exception\RequestException(
                        "Cannot make HTTP request: {$e->getMessage()}",
                        0,
                        $e
                    );
                }
            } else {
                throw new Exception\RequestException(
                    'Cannot make HTTP request',
                    0,
                    $e
                );
            }
        }

        $body = $response->getBody()->getContents();
        $errors = null;
        $json = null;

        if ($body) {
            $json = json_decode($body, true);

            if ($json === null && json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception\RequestException(
                    'Invalid JSON response: ' . json_last_error_msg()
                );
            }

            if (isset($json['errors'])) {
                $errors = self::errorsFromArray($json['errors']);
            }
        } elseif ($response->getStatusCode() == 200) {
            throw new Exception\RequestException('Empty response body');
        }

        if ($errors !== null || $response->getStatusCode() != 200) {
            throw new Exception\ResponseException(
                'Cannot make HTTP request',
                0,
                $errors
            );
        }

        if (!isset($json['result'])) {
            throw new Exception\ResponseException(
                'Missing "result" parameter in response'
            );
        }

        return $request->parseResponse($json['result']);
    }

    private function getHttpRequestHeaders(RequestInterface $request)
    {
        $signature = $this->getRequestSignature(
            $request,
            $this->api_key,
            $this->http_client->getConfig()
        );

        return [
            'X-MegaCrm-ApiAccount' => $this->account_id,
            'X-MegaCrm-ApiSignature' => $signature,
        ];
    }

    private static function createHttpClient()
    {
        $client = new GuzzleHttp\Client([
            'base_uri' => self::DEFAULT_ENDPOINT,
        ]);

        return $client;
    }

    /**
     * @param array $errors
     *
     * @return Error[]
     */
    private static function errorsFromArray(array $errors)
    {
        if (!is_array($errors)) {
            $type = gettype($errors);

            throw new Exception\ResponseException(
                "Invalid error response: expected 'errors' to be array, got {$type}"
            );
        }

        $result = [];

        foreach ($errors as $key => $error) {
            if (!isset($error['code'])) {
                throw new Exception\ResponseException(
                    "Invalid error response: missing 'code' at position {$key}"
                );
            }

            if (!isset($error['message'])) {
                throw new Exception\ResponseException(
                    "Invalid error response: missing 'message' at position {$key}"
                );
            }

            $path = null;

            if (isset($error['path'])) {
                if (!is_array($error['path'])) {
                    $type = gettype($error['path']);

                    throw new Exception\ResponseException(
                        "Invalid error response: expected 'path' to be array, got {$type} at position {$key}"
                    );
                }

                $path = $error['path'];
            }

            $result[] = new Error($error['code'], $error['message'], $path);
        }

        return $result;
    }

    private static function getRequestSignature(
        RequestInterface $request,
        $api_key,
        array $http_client_config
    ) {
        $parameters = $request->jsonSerialize();

        $query_params = '';
        $request_body = '';

        if ($request->getMethod() == 'GET') {
            $query_params = rawurldecode(
                http_build_query(
                    $parameters,
                    null,
                    '&',
                    PHP_QUERY_RFC3986
                )
            );
        } else {
            $request_body = json_encode($parameters);
        }

        $url = GuzzleHttp\Psr7\uri_for($request->getUrl());

        if (isset($http_client_config['base_uri'])) {
            $url = GuzzleHttp\Psr7\UriResolver::resolve(
                GuzzleHttp\Psr7\uri_for($http_client_config['base_uri']),
                $url
            );
        }

        $hash = implode(
            ':',
            [
                $request->getMethod(),
                $url->getPath(),
                $query_params,
                $request_body,
                $api_key,
            ]
        );

        $signature = hash('sha256', $hash);

        if ($signature === null) {
            throw new Exception\RequestException(
                'Cannot hash request signature data'
            );
        }

        return $signature;
    }

}
