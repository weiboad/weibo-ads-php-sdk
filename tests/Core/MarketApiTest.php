<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\Entity\Market;
use WeiboAd\Core\MarketApi;
use WeiboAdTest\AbstractTestCase;

class MarketApiTest extends AbstractTestCase
{

    public function testData()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/data?type=1', 'GET')->willReturn(['list' =>['id' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $marketApi = new MarketApi($api);
        $r = $marketApi->data(1);
        $this->assertCount(1, $r['list']);
    }


    public function testInfo()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/data/27?type=1', 'GET')->willReturn(['id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $marketApi = new MarketApi($api);
        $r = $marketApi->info(27,1);
        $this->assertEquals(1, $r->getId());

    }

    public function testIndustry()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/data/industry/27?page=1&page_size=6&type=1&sort=1', 'GET')->willReturn(['list' =>['code' => 33002]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $marketApi = new MarketApi($api);
        $r = $marketApi->industry(27,1);
        $this->assertCount(1, $r['list']);
    }

    public function testExtension()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/data/extension', 'POST')->willReturn(['pack_id' => 123]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $marketApi = new MarketApi($api);
        $r = $marketApi->extension(123,4,'新的自定义数据包','新的自定义数据包描述');
        $this->assertEquals('123', $r['pack_id']);
    }


    public function testCalculate()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/data/calculate', 'POST')->willReturn(['pack_id' => 123]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $marketApi = new MarketApi($api);
        $r = $marketApi->calculate(123,123,4,'新的自定义数据包','新的自定义数据包描述');
        $this->assertEquals('123', $r['pack_id']);
    }


    public function testCalculation()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/data/calculation?page=1&page_size=6', 'GET')->willReturn(['list' =>['id' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $audienceApi = new MarketApi($api);
        $r = $audienceApi->calculation();
        $this->assertCount(1, $r['list']);
    }


    public function testCustom()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/data/custom?page=1&page_size=6', 'GET')->willReturn(['list' =>['id' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $audienceApi = new MarketApi($api);
        $r = $audienceApi->custom(1,6);
        $this->assertCount(1, $r['list']);
    }


}