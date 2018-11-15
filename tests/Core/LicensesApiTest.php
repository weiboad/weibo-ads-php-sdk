<?php

namespace WeiboAdTest\Core;


use WeiboAd\Core\LicensesApi;
use WeiboAdTest\AbstractTestCase;

class LicensesApiTest extends AbstractTestCase
{
    public function testList()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/licenses?page=1&page_size=20&name=超粉test', 'GET')->willReturn(['list' =>['bizId' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $licensesApi = new LicensesApi($api);
        $r = $licensesApi->lists('超粉test');
        $this->assertCount(1, $r['list']);
    }


    public function testRead()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/licenses/1', 'GET')->willReturn(['bizId' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $licensesApi = new LicensesApi($api);
        $r = $licensesApi->read(1);
        $this->assertEquals(1, $r->getbizId());
    }
}