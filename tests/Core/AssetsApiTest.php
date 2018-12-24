<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\AssetsApi;
use WeiboAdTest\AbstractTestCase;

class AssetsApiTest extends AbstractTestCase
{



    public function testAsset()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method("call")->with('/account/asset','GET')->willReturn(['balance' => "100",'real_time_consume' => "9.19"]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $accountApi = new AssetsApi($api);
        $r = $accountApi->asset();
        $this->assertEquals("100", $r['balance']);
        $this->assertEquals("9.19", $r['real_time_consume']);
    }


}