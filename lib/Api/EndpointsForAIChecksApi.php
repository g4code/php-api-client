<?php
/**
 * EndpointsForAIChecksApi
 * PHP version 7.3
 *
 * @category Class
 * @package  Irisnet\API\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Irisnet API
 *
 * Artificial Intelligence (AI) for image- and video-processing in realtime. This is an interactive documentation meant to give a place were you can quickly look up the endpoints and their schemas, while also giving you the option to try things out yourself.  Listed below you'll see the available endpoints of the API that can be expanded by clicking on it. Each expanded endpoint lists the request parameter (if available) and the request body (if available). The request body can list some example bodies and the schema, explaining each model in detail. Additionally you'll find a 'Try it out' button where you can type in your custom parameters and custom body and execute that against the API. The responses section in the expanded endpoint lists the possible responses with their corresponding status codes. If you've executed an API call it will also show you the response from the server.  Underneath the endpoints you'll find the model schemas. These are the models used for the requests and responses. By clicking on the right arrow you can expand the model and it will show you a description of the model and the model parameters. For nested models you can keep clicking the right arrow to reveal further details on it.
 *
 * The version of the OpenAPI document: v1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.3.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Irisnet\API\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Irisnet\API\Client\ApiException;
use Irisnet\API\Client\Configuration;
use Irisnet\API\Client\HeaderSelector;
use Irisnet\API\Client\ObjectSerializer;

/**
 * EndpointsForAIChecksApi Class Doc Comment
 *
 * @category Class
 * @package  Irisnet\API\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class EndpointsForAIChecksApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation checkImage
     *
     * Upload and check image against previously chosen configuration.
     *
     * @param  string $licenseKey License obtained from irisnet.de shop. (required)
     * @param  \SplFileObject $file file (required)
     * @param  int $detail Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information. (optional, default to 1)
     * @param  bool $imageEncode Specifies whether or not to draw an output image that can be downloaded afterwards. (optional, default to false)
     *
     * @throws \Irisnet\API\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Irisnet\API\Client\Model\IrisNet|\Irisnet\API\Client\Model\INError
     */
    public function checkImage($licenseKey, $file, $detail = 1, $imageEncode = false)
    {
        list($response) = $this->checkImageWithHttpInfo($licenseKey, $file, $detail, $imageEncode);
        return $response;
    }

    /**
     * Operation checkImageWithHttpInfo
     *
     * Upload and check image against previously chosen configuration.
     *
     * @param  string $licenseKey License obtained from irisnet.de shop. (required)
     * @param  \SplFileObject $file (required)
     * @param  int $detail Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information. (optional, default to 1)
     * @param  bool $imageEncode Specifies whether or not to draw an output image that can be downloaded afterwards. (optional, default to false)
     *
     * @throws \Irisnet\API\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Irisnet\API\Client\Model\IrisNet|\Irisnet\API\Client\Model\INError, HTTP status code, HTTP response headers (array of strings)
     */
    public function checkImageWithHttpInfo($licenseKey, $file, $detail = 1, $imageEncode = false)
    {
        $request = $this->checkImageRequest($licenseKey, $file, $detail, $imageEncode);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Irisnet\API\Client\Model\IrisNet' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Irisnet\API\Client\Model\IrisNet', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\Irisnet\API\Client\Model\INError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Irisnet\API\Client\Model\INError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Irisnet\API\Client\Model\IrisNet';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Irisnet\API\Client\Model\IrisNet',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Irisnet\API\Client\Model\INError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation checkImageAsync
     *
     * Upload and check image against previously chosen configuration.
     *
     * @param  string $licenseKey License obtained from irisnet.de shop. (required)
     * @param  \SplFileObject $file (required)
     * @param  int $detail Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information. (optional, default to 1)
     * @param  bool $imageEncode Specifies whether or not to draw an output image that can be downloaded afterwards. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function checkImageAsync($licenseKey, $file, $detail = 1, $imageEncode = false)
    {
        return $this->checkImageAsyncWithHttpInfo($licenseKey, $file, $detail, $imageEncode)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation checkImageAsyncWithHttpInfo
     *
     * Upload and check image against previously chosen configuration.
     *
     * @param  string $licenseKey License obtained from irisnet.de shop. (required)
     * @param  \SplFileObject $file (required)
     * @param  int $detail Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information. (optional, default to 1)
     * @param  bool $imageEncode Specifies whether or not to draw an output image that can be downloaded afterwards. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function checkImageAsyncWithHttpInfo($licenseKey, $file, $detail = 1, $imageEncode = false)
    {
        $returnType = '\Irisnet\API\Client\Model\IrisNet';
        $request = $this->checkImageRequest($licenseKey, $file, $detail, $imageEncode);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'checkImage'
     *
     * @param  string $licenseKey License obtained from irisnet.de shop. (required)
     * @param  \SplFileObject $file (required)
     * @param  int $detail Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information. (optional, default to 1)
     * @param  bool $imageEncode Specifies whether or not to draw an output image that can be downloaded afterwards. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function checkImageRequest($licenseKey, $file, $detail = 1, $imageEncode = false)
    {
        // verify the required parameter 'licenseKey' is set
        if ($licenseKey === null || (is_array($licenseKey) && count($licenseKey) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $licenseKey when calling checkImage'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling checkImage'
            );
        }

        $resourcePath = '/v1/check-image/{licenseKey}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($detail !== null) {
            if('form' === 'form' && is_array($detail)) {
                foreach($detail as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['detail'] = $detail;
            }
        }
        // query params
        if ($imageEncode !== null) {
            if('form' === 'form' && is_array($imageEncode)) {
                foreach($imageEncode as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['imageEncode'] = $imageEncode;
            }
        }


        // path params
        if ($licenseKey !== null) {
            $resourcePath = str_replace(
                '{' . 'licenseKey' . '}',
                ObjectSerializer::toPathValue($licenseKey),
                $resourcePath
            );
        }

        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = [];
            $paramFiles = is_array($file) ? $file : [$file];
            foreach ($paramFiles as $paramFile) {
                $formParams['file'][] = \GuzzleHttp\Psr7\Utils::tryFopen(
                    ObjectSerializer::toFormValue($paramFile),
                    'rb'
                );
            }
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/xml', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/xml', 'application/json'],
                ['multipart/form-data']
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation checkImageUrl
     *
     * Check image url against previously chosen configuration.
     *
     * @param  string $url url (required)
     * @param  string $licenseKey License obtained from irisnet.de shop. (required)
     * @param  int $detail Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information. (optional, default to 1)
     * @param  bool $imageEncode Specifies whether or not to draw an output image that can be downloaded afterwards. (optional, default to false)
     *
     * @throws \Irisnet\API\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Irisnet\API\Client\Model\IrisNet|\Irisnet\API\Client\Model\INError
     */
    public function checkImageUrl($url, $licenseKey, $detail = 1, $imageEncode = false)
    {
        list($response) = $this->checkImageUrlWithHttpInfo($url, $licenseKey, $detail, $imageEncode);
        return $response;
    }

    /**
     * Operation checkImageUrlWithHttpInfo
     *
     * Check image url against previously chosen configuration.
     *
     * @param  string $url (required)
     * @param  string $licenseKey License obtained from irisnet.de shop. (required)
     * @param  int $detail Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information. (optional, default to 1)
     * @param  bool $imageEncode Specifies whether or not to draw an output image that can be downloaded afterwards. (optional, default to false)
     *
     * @throws \Irisnet\API\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Irisnet\API\Client\Model\IrisNet|\Irisnet\API\Client\Model\INError, HTTP status code, HTTP response headers (array of strings)
     */
    public function checkImageUrlWithHttpInfo($url, $licenseKey, $detail = 1, $imageEncode = false)
    {
        $request = $this->checkImageUrlRequest($url, $licenseKey, $detail, $imageEncode);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Irisnet\API\Client\Model\IrisNet' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Irisnet\API\Client\Model\IrisNet', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 402:
                    if ('\Irisnet\API\Client\Model\INError' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Irisnet\API\Client\Model\INError', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Irisnet\API\Client\Model\IrisNet';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Irisnet\API\Client\Model\IrisNet',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 402:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Irisnet\API\Client\Model\INError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation checkImageUrlAsync
     *
     * Check image url against previously chosen configuration.
     *
     * @param  string $url (required)
     * @param  string $licenseKey License obtained from irisnet.de shop. (required)
     * @param  int $detail Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information. (optional, default to 1)
     * @param  bool $imageEncode Specifies whether or not to draw an output image that can be downloaded afterwards. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function checkImageUrlAsync($url, $licenseKey, $detail = 1, $imageEncode = false)
    {
        return $this->checkImageUrlAsyncWithHttpInfo($url, $licenseKey, $detail, $imageEncode)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation checkImageUrlAsyncWithHttpInfo
     *
     * Check image url against previously chosen configuration.
     *
     * @param  string $url (required)
     * @param  string $licenseKey License obtained from irisnet.de shop. (required)
     * @param  int $detail Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information. (optional, default to 1)
     * @param  bool $imageEncode Specifies whether or not to draw an output image that can be downloaded afterwards. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function checkImageUrlAsyncWithHttpInfo($url, $licenseKey, $detail = 1, $imageEncode = false)
    {
        $returnType = '\Irisnet\API\Client\Model\IrisNet';
        $request = $this->checkImageUrlRequest($url, $licenseKey, $detail, $imageEncode);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'checkImageUrl'
     *
     * @param  string $url (required)
     * @param  string $licenseKey License obtained from irisnet.de shop. (required)
     * @param  int $detail Sets the response details.  * _1_ - The response body informs you if the image is ok or not ok (better API performance) * _2_ - In addition the response body lists all broken rules. * _3_ - In addition to the first two options, this will show all objects with positional information. (optional, default to 1)
     * @param  bool $imageEncode Specifies whether or not to draw an output image that can be downloaded afterwards. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function checkImageUrlRequest($url, $licenseKey, $detail = 1, $imageEncode = false)
    {
        // verify the required parameter 'url' is set
        if ($url === null || (is_array($url) && count($url) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $url when calling checkImageUrl'
            );
        }
        // verify the required parameter 'licenseKey' is set
        if ($licenseKey === null || (is_array($licenseKey) && count($licenseKey) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $licenseKey when calling checkImageUrl'
            );
        }

        $resourcePath = '/v1/check-url/{licenseKey}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($url !== null) {
            if('form' === 'form' && is_array($url)) {
                foreach($url as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['url'] = $url;
            }
        }
        // query params
        if ($detail !== null) {
            if('form' === 'form' && is_array($detail)) {
                foreach($detail as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['detail'] = $detail;
            }
        }
        // query params
        if ($imageEncode !== null) {
            if('form' === 'form' && is_array($imageEncode)) {
                foreach($imageEncode as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['imageEncode'] = $imageEncode;
            }
        }


        // path params
        if ($licenseKey !== null) {
            $resourcePath = str_replace(
                '{' . 'licenseKey' . '}',
                ObjectSerializer::toPathValue($licenseKey),
                $resourcePath
            );
        }


        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/xml', 'application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/xml', 'application/json'],
                []
            );
        }

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
