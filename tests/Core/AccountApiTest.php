<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\AccountApi;
use WeiboAd\Core\Entity\Account;
use WeiboAdTest\AbstractTestCase;

class AccountApiTest extends AbstractTestCase
{

    public function testRead()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/account', 'GET')->willReturn(['id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $accountApi = new AccountApi($api);
        $r = $accountApi->read();
        $this->assertEquals(1, $r->getId());
    }

    public function testBudget()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method("call")->with('/account/budget','PUT')->willReturn(['configured_status' => 1,'id' => 34]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $accountApi = new AccountApi($api);
        $r = $accountApi->budget('100.00');
        $this->assertEquals(1, $r['configured_status']);
        $this->assertEquals(34, $r['id']);
    }

    public function testAsset()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method("call")->with('/account/asset','GET')->willReturn(['balance' => "100",'real_time_consume' => "9.19"]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $accountApi = new AccountApi($api);
        $r = $accountApi->asset();
        $this->assertEquals("100", $r['balance']);
        $this->assertEquals("9.19", $r['real_time_consume']);
    }



}