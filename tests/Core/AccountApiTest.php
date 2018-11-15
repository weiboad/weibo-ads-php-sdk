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

    public function testBudget()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method("call")->with('/account/budget','PUT')->willReturn(['configured_status' => 1,'id' => 34]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $accountApi = new AccountApi($api);
        $r = $accountApi->budget();
        $this->assertEquals(1, $r['configured_status']);
        $this->assertEquals(34, $r['id']);
    }


}