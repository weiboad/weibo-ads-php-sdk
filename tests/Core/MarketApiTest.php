<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\MarketApi;
use WeiboAdTest\AbstractTestCase;

class MarketApiTest extends AbstractTestCase
{

    public function testRead()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/market/list?type=1', 'GET')->willReturn(['list' =>['id' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $marketApi = new MarketApi($api);
        $r = $marketApi->readList(1);
        $this->assertCount(1, $r['list']);
    }


    public function testInfo()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/market/info/27', 'GET')->willReturn(['id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $marketApi = new MarketApi($api);
        $r = $marketApi->info(27);
        $this->assertEquals(1, $r->getId());

    }

    public function testData()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/market/industry_data?page=1&page_size=6&id=27&type=1', 'GET')->willReturn(['list' =>['code' => 33002]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $marketApi = new MarketApi($api);
        $r = $marketApi->data(27,1);
        $this->assertCount(1, $r['list']);
    }


}