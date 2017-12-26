<?php

namespace WeiboAd;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * Class Api
 * @package WeiboAd
 */
class Api
{

    const API_VERSION = 'v1.0.0';

    /**
     * @var object
     */
    protected $logger;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $appId;

    /**
     * @var string
     */
    private $appSecret;

    /**
     * @var ApiRequest
     */
    protected $apiRequest;


    protected $config;

    public function __construct($appId, $appSecret, $token)
    {
        $this->token     = $token;
        $this->appId     =  $appId;
        $this->appSecret = $appSecret;
        $this->apiRequest = new ApiRequest($this);
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @return LoggerInterface $logger
     */
    public function getLogger()
    {
        if (!$this->logger) {
            $this->logger = new NullLogger();
        }
        return $this->logger;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return string
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return self::API_VERSION;
    }

    /**
     * @return ApiRequest
     */
    public function getApiRequest()
    {
        return $this->apiRequest;
    }
}