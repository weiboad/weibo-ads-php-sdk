<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\AccountApi;
use WeiboAdTest\AbstractTestCase;

class AccountApiTest extends AbstractTestCase
{

    public function testAccount()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/account', 'GET')->willReturn(['id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $accountApi = new AccountApi($api);
        $r = $accountApi->read();
        $this->assertEquals(1, $r->getId());
    }

    public function testAsset()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method("call")->with('/account/asset','GET')->willReturn(['balance' => 100,'real_time_consume' => 9.19]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $accountApi = new AccountApi($api);
        $r = $accountApi->asset();
        $this->assertEquals(100, $r['balance']);
        $this->assertEquals(9.19, $r['real_time_consume']);
    }

    public function testBudget()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/account/budget', 'PUT')->willReturn(['id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $accountApi = new AccountApi($api);
        $r = $accountApi->budget(100);
        $this->assertEquals(1, $r->getId());
    }


}