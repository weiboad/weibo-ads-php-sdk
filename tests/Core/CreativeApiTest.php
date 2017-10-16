<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\CreativeApi;
use WeiboAd\Core\Constant\ConfiguredStatus;
use WeiboAd\Core\Entity\Creative;
use WeiboAdTest\AbstractTestCase;

class CreativeApiTest extends AbstractTestCase
{

    public function testRead() {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/creatives/info/1', 'GET')->willReturn(['id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $creativeApi = new CreativeApi($api);
        $r = $creativeApi->read(1);
        $this->assertEquals(1, $r->getId());
    }

    public function testList() {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/creatives/search?page=1&page_size=10&name=creative_title', 'GET')->willReturn(['list' =>['id' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $creativeApi = new CreativeApi($api);
        $r = $creativeApi->lists('creative_title');
        $this->assertCount(1, $r['list']);
    }


    public function testCreate() {
        $creative = new Creative(['name' => 'creative_title']);
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/creatives', 'POST')->willReturn(['id' => 1, 'name' => 'creative_title']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $creativeApi = new CreativeApi($api);
        $r = $creativeApi->create($creative);
        $this->assertEquals('creative_title', $r->getName());

        $creative = new Creative(['name' => 'creative_title', 'id' => 1]);
        $r = $creativeApi->create($creative);
        $this->assertEquals(1, $r->getId());
    }

    public function testUpdate() {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/creatives/1', 'PUT')->willReturn(['id' => 1, 'name' => 'creative_title']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $creativeApi = new CreativeApi($api);
        $r = $creativeApi->update(1, 1, ['third_party_show' => 'http://weibo.com'], 1);
        $this->assertEquals('creative_title', $r->getName());

    }

    public function testCreateWithMid() {
        $creative = new Creative(['name' => 'creative_title']);
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/creatives', 'POST')->willReturn(['id' => 1, 'name' => 'creative_title']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $creativeApi = new CreativeApi($api);
        $r = $creativeApi->createWithMid($creative);
        $this->assertEquals('creative_title', $r->getName());

        $creative = new Creative(['name' => 'creative_title', 'id' => 1]);
        $r = $creativeApi->createWithMid($creative);
        $this->assertEquals(1, $r->getId());
    }

    public function testDelete() {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/creatives/1', 'DELETE')->willReturn(['success' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new CreativeApi($api);
        $r = $adsApi->delete(1);
        $this->assertEquals(1, $r['success']);
    }

    public function testUpdateStatus() {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/creatives/1', 'PUT')->willReturn(['id' => 1, 'name' => 'creative_title2', 'configured_status' => 0, 'effective_status' => 0]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $creativeApi = new CreativeApi($api);
        $r = $creativeApi->updateStatus(1, ConfiguredStatus::PAUSE);
        $this->assertEquals(0, $r['configured_status']);
    }

    public function testCreateTag() {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/tags', 'POST')->willReturn(['tags' => ['6648544ajw1fbthp8r3d5j21kw11x1kx' => ['long_url' => 'http%3A%2F%2Fshorturl.biz.weibo.cn%2FRfsetev']]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $creativeApi = new CreativeApi($api);
        $r = $creativeApi->createTag(['http%3A%2F%2Fshorturl.biz.weibo.cn%2FRfsetev'], ['tag1', 'tag2'], ['tag_des'], '');
        $this->assertCount(1, $r['tags']);
    }

}