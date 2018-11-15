<?php

namespace WeiboAdTest\Core;


use WeiboAd\Core\AudienceApi;
use WeiboAdTest\AbstractTestCase;

class AudienceApiTest extends AbstractTestCase
{

    public function testRead()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/audiences/1', 'GET')->willReturn(['id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $audienceApi = new AudienceApi($api);
        $r = $audienceApi->read(1);
        $this->assertEquals(1, $r->getId());
    }

    public function testList()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/audiences?page=1&page_size=10&name=audience_title', 'GET')->willReturn(['list' =>['id' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $audienceApi = new AudienceApi($api);
        $r = $audienceApi->lists('audience_title');
        $this->assertCount(1, $r['list']);
    }


    public function testCreate()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/audiences', 'POST')->willReturn(['id' => 1, 'name' => 'audience_title']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $audienceApi = new AudienceApi($api);
        $r = $audienceApi->create('audience_title', 0 ,1, 1, 1);
        $this->assertEquals('audience_title', $r->getName());
    }


    public function testDelete()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/audiences/1', 'DELETE')->willReturn(['success' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $audienceApi = new AudienceApi($api);
        $r = $audienceApi->delete(1);
        $this->assertEquals(1, $r['success']);
    }

    public function testUpload()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/audiences/upload', 'POST')->willReturn(['file_id' => '34e4801457c82f1378fd165862cd7002-0-3-1-txt']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $audienceApi = new AudienceApi($api);
        $r = $audienceApi->upload('/file_path', 0, 0);
        $this->assertEquals('34e4801457c82f1378fd165862cd7002-0-3-1-txt', $r['file_id']);
    }

    public function testSetCoverage()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/audiences/set_coverage', 'POST')->willReturn(['id' => 2, 'look_alike_id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $audienceApi = new AudienceApi($api);
        $r = $audienceApi->setCoverage(1 , 2,'audience_title2', 123);
        $this->assertEquals(1, $r->getLookAlikeId());
    }
}