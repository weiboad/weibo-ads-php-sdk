<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\CampaignApi;
use WeiboAd\Core\Constant\ConfiguredStatus;
use WeiboAd\Core\Entity\Campaign;
use WeiboAdTest\AbstractTestCase;

class CampaignApiTest extends AbstractTestCase
{

    public function testRead()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/campaigns/1', 'GET')->willReturn(['id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $campaignApi = new CampaignApi($api);
        $r = $campaignApi->read(1);
        $this->assertEquals(1, $r->getId());
    }

    public function testList()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/campaigns?page=1&page_size=10&name=campaign_title', 'GET')->willReturn(['list' =>['id' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $campaignApi = new CampaignApi($api);
        $r = $campaignApi->lists('campaign_title');
        $this->assertCount(1, $r['list']);
    }


    public function testCreate()
    {
        $ad = new Campaign(['name' => 'campaign_title']);
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/campaigns', 'POST')->willReturn(['id' => 1, 'name' => 'campaign_title']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $campaignApi = new CampaignApi($api);
        $r = $campaignApi->create($ad);
        $this->assertEquals('campaign_title', $r->getName());
    }

    public function testUpdate()
    {
        $ad = new Campaign(['name' => 'campaign_title2', 'id' => 1]);
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/campaigns/1', 'PUT')->willReturn(['id' => 1, 'name' => 'campaign_title2']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $campaignApi = new CampaignApi($api);
        $r = $campaignApi->update($ad);
        $this->assertEquals('campaign_title2', $r->getName());

        $r = $campaignApi->create($ad);
        $this->assertEquals('campaign_title2', $r->getName());
    }

    public function testDelete()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/campaigns/1', 'DELETE')->willReturn(['success' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $campaignApi = new CampaignApi($api);
        $r = $campaignApi->delete(1);
        $this->assertEquals(1, $r['success']);
    }

    public function testUpdateStatus()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/campaigns/status/1', 'PUT')->willReturn(['list'=>['id' => 1, 'name' => 'campaign_title', 'configure_status' => 0, 'effective_status' => 0]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $campaignApi = new CampaignApi($api);
        $r = $campaignApi->updateStatus(1, ConfiguredStatus::PAUSE);
        $this->assertEquals(0, $r->getConfiguredStatus());
    }
}