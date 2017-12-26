<?php

namespace WeiboAdTest;

use GuzzleHttp\Client;
use WeiboAd\Api;
use WeiboAd\ApiRequest;
use WeiboAd\Exception\ApiException;

class ApiRequestTest extends AbstractTestCase
{
    private $obj;

    public function setUp()
    {
        parent::setUp();
        $api = new Api('app_id_123', 'app_secret_123', 'token123456');
        $this->obj = new ApiRequest($api);
    }

    public function testSetTimeout()
    {
        $this->obj->setTimeout(3);
        $this->assertEquals(3, $this->obj->timeout);
    }


    public function testGetHttpClient()
    {
        $client = $this->obj->getHttpClient();
        $this->assertTrue($client instanceof  Client);
    }

    public function testCall()
    {
        $httpClient = $this->createMock("GuzzleHttp\\Client");
        $response = $this->createMock("Psr\\Http\\Message\\ResponseInterface");
        $response->method('getBody')->willReturn(json_encode(['success'=>1]));
        $response->method('getStatusCode')->willReturn(200);
        $httpClient->method('request')->willReturn($response);
        $this->obj->setHttpClient($httpClient);
        $this->obj->call('/path', 'GET', function ($data) {
            $this->assertEquals(1, $data['success']);
        }, ['test' => 'test'], ['test2' => 'test2'], 'body');

        $httpClient = $this->createMock("GuzzleHttp\\Client");
        $response = $this->createMock("Psr\\Http\\Message\\ResponseInterface");
        $response->method('getStatusCode')->willReturn(400);
        $httpClient->method('request')->willReturn($response);
        $this->obj->setHttpClient($httpClient);
        try {
            $this->obj->call('/path', 'GET', function ($data) {
                $this->assertEquals(1, $data['success']);
            });
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof ApiException);
        }
    }

}