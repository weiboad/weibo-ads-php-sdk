<?php

namespace WeiboAdTest;


use Psr\Log\NullLogger;
use WeiboAd\Api;
use WeiboAd\ApiRequest;

class ApiTest extends AbstractTestCase
{
    private $api;

    public function setUp()
    {
        parent::setUp();
        $this->api = new Api('app_id_123', 'app_secret_123', 'token123456');
    }

    public function testGetAppId()
    {
        $this->assertEquals($this->api->getAppId(), 'app_id_123');
    }

    public function testGetAppSecret()
    {
        $this->assertEquals($this->api->getAppSecret(), 'app_secret_123');
    }

    public function testGetVersion()
    {
        $this->assertEquals($this->api->getVersion(), Api::API_VERSION);
    }

    public function testGetToken()
    {
        $this->assertEquals($this->api->getToken(), 'token123456');
    }

    public function testLogger()
    {
        $this->api->setLogger(new NullLogger());
        $logger = $this->api->getLogger();
        $this->assertTrue($logger instanceof NullLogger);
    }

    public function testGetLogger()
    {
        $logger = $this->api->getLogger();
        $this->assertTrue($logger instanceof NullLogger);
    }

    public function testGetApiRequest()
    {
        $apiRequest  = $this->api->getApiRequest();
        $this->assertTrue($apiRequest instanceof ApiRequest);
    }


}