# Client library for MegaCRM API

## Installation

`composer require megagroup/megacrm-api-client`

## Example

```php
<?php

use Megagroup\MegaCrm\Api;

$megacrm_account_id = 12345678;
$megacrm_api_key = 'edaf8e71d644fd09d30f1fc417e1aebe1e66a366';

$transport = new Api\Client($megacrm_account_id, $megacrm_api_key);

$deal = new Api\Request\Type\Deal;

$deal->setTitle('Your deal title');
$deal->setPrice(1000);
$deal->setTags(['VIP']);

$deal->setFields([
  (new Api\Request\Type\CustomField)->setId('code')->setValues(['Your custom field value'])
]);

$request = new Api\Request\Deal\Create;

$request->add($deal);

try {
    $response = $request->invoke($transport);
} catch (Api\Exception\ResponseException $e) {
    var_dump($e->getErrors());
}
```
