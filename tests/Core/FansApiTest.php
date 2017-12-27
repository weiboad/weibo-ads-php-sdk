<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\FansApi;
use WeiboAdTest\AbstractTestCase;

class FansApiTest extends AbstractTestCase
{
    public function testGetMapping()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/fans/mapping?type=gender', 'GET')->willReturn(['gender' => [401]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $fansApi = new FansApi($api);
        $mapping = $fansApi->getMapping("gender");
        $this->assertNotEmpty($mapping['gender']);
    }


    public function testGetPrice()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/fans/price?mid=41878140887231123', 'GET')->willReturn(['total_price' => 0]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $fansApi = new FansApi($api);
        $ret = $fansApi->getPrice("41878140887231123");
        $this->assertArrayHasKey("total_price", $ret);
    }



    public function testRemain()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/fans/remain?mid=41878140887231123&designate=20051,20052', 'GET')->willReturn(['designate' => [20051, 20052]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $fansApi = new FansApi($api);
        $ret = $fansApi->getRemain("41878140887231123", "",  "", "", "20051,20052");
        $this->assertArrayHasKey("designate", $ret);
    }

    public function testGetAdvancePrice()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/fans/advance_price?mid=41878140887231123&touid=2608812381', 'GET')->willReturn(['price' => 0]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $fansApi = new FansApi($api);
        $ret = $fansApi->getAdvancePrice("41878140887231123", 2608812381);
        $this->assertArrayHasKey("price", $ret);
    }

    public function testGetPromoteData()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/fans/promote_data?adid=170603250165822062', 'GET')->willReturn(['interactive' => []]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $fansApi = new FansApi($api);
        $ret = $fansApi->getPromoteData("170603250165822062");
        $this->assertArrayHasKey("interactive", $ret);
    }

    public function testSetPromote()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/fans/promote', 'POST')->willReturn(['order_id' => 123]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $fansApi = new FansApi($api);
        $ret = $fansApi->setPromote("4189210846177068");
        $this->assertArrayHasKey("order_id", $ret);
    }

    public function testSetAdvancePromote()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/fans/advance', 'POST')->willReturn(['is_advance' => true]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $fansApi = new FansApi($api);
        $ret = $fansApi->setAdvancePromote("4187814088723155", "2608812381");
        $this->assertArrayHasKey("is_advance", $ret);
    }

    public function testOffline()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/fans/offline', 'POST')->willReturn(['order_id' => 123]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $fansApi = new FansApi($api);
        $ret = $fansApi->offline(123);
        $this->assertEquals("123", $ret['order_id']);
    }
}