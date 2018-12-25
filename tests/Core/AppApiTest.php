<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\AppApi;
use WeiboAdTest\AbstractTestCase;

class AppApiTest extends AbstractTestCase
{

    public function testList()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/apps?page=1&page_size=10', 'GET')->willReturn(['total' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $appApi = new AppApi($api);
        $r = $appApi->lists();
        $this->assertEquals(1, $r['total']);
    }

    public function testUpdate()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/app', 'POST')->willReturn(['errcode' => 0]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $appApi = new AppApi($api);
        $r = $appApi->upload(1, "http://test");
        $this->assertEquals(0, $r['errcode']);
    }


    public function testCategory()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/apps/category', 'GET')->willReturn([]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $appApi = new AppApi($api);
        $r = $appApi->category();
        $this->assertTrue(is_array($r));
    }


}