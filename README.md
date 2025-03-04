# IrisnetPHPClient

Artificial Intelligence (AI) for image- and video-processing in realtime. This is an interactive documentation meant to give a place were you can quickly look up the endpoints and their schemas, while also giving you the option to try things out yourself.

Listed below you'll see the available endpoints of the API that can be expanded by clicking on it. Each expanded endpoint lists the request parameter (if available) and the request body (if available). The request body can list some example bodies and the schema, explaining each model in detail. Additionally you'll find a 'Try it out' button where you can type in your custom parameters and custom body and execute that against the API.
The responses section in the expanded endpoint lists the possible responses with their corresponding status codes. If you've executed an API call it will also show you the response from the server.

Underneath the endpoints you'll find the model schemas. These are the models used for the requests and responses. By clicking on the right arrow you can expand the model and it will show you a description of the model and the model parameters. For nested models you can keep clicking the right arrow to reveal further details on it.




## Installation & Usage

### Requirements

PHP 7.3 and later.
Should also work with PHP 8.0 but has not been tested.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/IrisnetPHPClient/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');




$apiInstance = new Irisnet\API\Client\Api\EndpointsForAIChecksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$licenseKey = 'licenseKey_example'; // string | License obtained from irisnet.de shop.
$file = "/path/to/file.txt"; // \SplFileObject
$detail = 1; // int | Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information.
$imageEncode = false; // bool | Specifies whether or not to draw an output image that can be downloaded afterwards.

try {
    $result = $apiInstance->checkImage($licenseKey, $file, $detail, $imageEncode);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EndpointsForAIChecksApi->checkImage: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *https://api.irisnet.de*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*EndpointsForAIChecksApi* | [**checkImage**](docs/Api/EndpointsForAIChecksApi.md#checkimage) | **POST** /v1/check-image/{licenseKey} | Upload and check image against previously chosen configuration.
*EndpointsForAIChecksApi* | [**checkImageUrl**](docs/Api/EndpointsForAIChecksApi.md#checkimageurl) | **POST** /v1/check-url/{licenseKey} | Check image url against previously chosen configuration.
*EndpointsToSetupTheAIApi* | [**setINDefine**](docs/Api/EndpointsToSetupTheAIApi.md#setindefine) | **POST** /v1/set-definition | Set definitions via pre-defined prototypes.
*EndpointsToSetupTheAIApi* | [**setINParams**](docs/Api/EndpointsToSetupTheAIApi.md#setinparams) | **POST** /v1/set-parameters | Set the behaviour parameters for one object class.
*MiscellaneousOperationsApi* | [**downloadProcessed**](docs/Api/MiscellaneousOperationsApi.md#downloadprocessed) | **GET** /v1/download/{filename} | Get the resulting media file.
*MiscellaneousOperationsApi* | [**getAICost**](docs/Api/MiscellaneousOperationsApi.md#getaicost) | **GET** /v1/cost | Get the cost per image check of the previously set parameters. The cost of the configuration is subtracted from the license key during each check.
*MiscellaneousOperationsApi* | [**getLicenseInfo**](docs/Api/MiscellaneousOperationsApi.md#getlicenseinfo) | **GET** /v1/info/{licenseKey} | Get information from given license key.

## Models

- [INDefault](docs/Model/INDefault.md)
- [INDefineAI](docs/Model/INDefineAI.md)
- [INError](docs/Model/INError.md)
- [INImage](docs/Model/INImage.md)
- [INObject](docs/Model/INObject.md)
- [INParam](docs/Model/INParam.md)
- [INParams](docs/Model/INParams.md)
- [INRule](docs/Model/INRule.md)
- [IrisNet](docs/Model/IrisNet.md)
- [LicenseInfo](docs/Model/LicenseInfo.md)

## Authorization
All endpoints do not require authorization.
## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `v1`
    - Package version: `2.4.2`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
