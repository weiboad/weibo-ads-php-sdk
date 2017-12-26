<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\InsightApi;
use WeiboAdTest\AbstractTestCase;

class InsightApiTest extends AbstractTestCase
{

    public function testDemography()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/insights/demography?data={"time_interval":["2017-07-01","2017-07-11"],"order_by":["pv"],"granularity":["age"],"dimension":["account"],"page":1,"rows":10,"field":["pv","ecpm"],"param":{"account_id":"123"},"order_mode":"desc"}', 'GET')->willReturn(['rows' => 10]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $obj = new InsightApi($api);
        $data = $obj->demography(['2017-07-01', '2017-07-11'], ['pv', 'ecpm'], ['account'], ['age'], ['account_id' => '123'], ['pv'], 'desc', 1, 10);
        $this->assertEquals(10, $data['rows']);
    }


    public function testEffect()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/insights/effect?data={"time_interval":["2017-07-01","2017-07-11"],"order_by":["pv"],"granularity":["account","date"],"dimension":["account"],"page":1,"rows":10,"field":["pv","ecpm"],"param":{"account_id":"123"},"order_mode":"desc"}', 'GET')->willReturn(['rows' => 10]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $obj = new InsightApi($api);
        $data = $obj->effect(['2017-07-01', '2017-07-11'], ['pv', 'ecpm'], ['account'], ['account', 'date'], ['account_id' => '123'], ['pv'], 'desc', 1, 10);
        $this->assertEquals(10, $data['rows']);
    }

    public function testLayer()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/insights/layer?data={"time_interval":["2017-07-01","2017-07-11"],"order_by":["second_pv"],"granularity":["account","date"],"dimension":["account"],"page":1,"rows":10,"field":["second_pv","second_layer_pv_rate"],"param":{"account_id":"123"},"order_mode":"desc"}', 'GET')->willReturn(['rows' => 10]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $obj = new InsightApi($api);
        $data = $obj->layer(['2017-07-01', '2017-07-11'], ['second_pv', 'second_layer_pv_rate'], ['account'], ['account', 'date'], ['account_id' => '123'], ['second_pv'], 'desc', 1, 10);
        $this->assertEquals(10, $data['rows']);
    }
}