<?php

namespace WeiboAd;

use GuzzleHttp\Client;
use WeiboAd\Exception\ApiException;

/**
 * Class ApiRequest
 * @package WeiboAd
 */
class ApiRequest
{
    const API_BASE_URL = "https://api.biz.weibo.com/";

    const HTTP_CODE_OK = 200;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var Api
     */
    protected $api;

    /**
     * @var int
     */
    public $timeout = 10;

    /**
     * ApiRequest constructor.
     * @param Api $api
     */
    public function __construct(Api $api) {
        $this->api = $api;
    }

    /**
     * @param $timeout
     */
    public function setTimeout($timeout) {
        $this->timeout = $timeout;
    }

    /**
     * @return Client
     */
    public function getHttpClient() {
        if (!$this->httpClient) {
            $config = [
                'base_uri' => self::API_BASE_URL,
                'timeout'  => $this->timeout,
                'verify'   => false
            ];
            $this->httpClient =  new Client($config);

        }
        return $this->httpClient;
    }

    /**
     * @param $client
     */
    public function setHttpClient($client) {
        $this->httpClient = $client;
    }

    /**
     * @param $scheme
     * @param $method
     * @param array $formData
     * @param array $multiData
     * @param null $body
     * @return mixed
     * @throws ApiException
     */
    public function call($scheme, $method, $formData = [], $multiData = [], $body = null) {

        $options =  [
            "http_errors" => false,
            'headers'     => ['Authorization' => 'Bearer ' . $this->api->getToken()]
        ];
        if ($body) {
            $options['body'] = $body;
        }
        if (!empty($formData)) {
            $options['form_params'] = $formData;
        }

        if (!empty($multiData)) {
            $options['multipart'] = $multiData;
        }

        $res   = $this->getHttpClient()->request($method, $scheme, $options);
        $body  = $res->getBody();
        $this->api->getLogger()->debug("upstream response:" . $body);
        $data  = Util::jsonDecode($body, true);
        if ($res->getStatusCode() == self::HTTP_CODE_OK && !empty($data)) {
            return $data;
        } else {
            throw new ApiException($data);
        }
    }

}
