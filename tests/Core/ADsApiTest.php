<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\ADsApi;
use WeiboAd\Core\Constant\ConfiguredStatus;
use WeiboAd\Core\Entity\ADs;
use WeiboAdTest\AbstractTestCase;

class ADsApiTest extends AbstractTestCase
{

    public function testRead()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/ads/1', 'GET')->willReturn(['id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->read(1);
        $this->assertEquals(1, $r->getId());
    }

    public function testList()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/ads?page=1&page_size=10&name=ad_title', 'GET')->willReturn(['list' =>['id' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->lists('ad_title');
        $this->assertCount(1, $r['list']);
    }


    public function testCreate()
    {
        $ad = new ADs(['name' => 'ad_title']);
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/ads', 'POST')->willReturn(['id' => 1, 'name' => 'ad_title']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->create($ad);
        $this->assertEquals('ad_title', $r->getName());
    }

    public function testUpdate()
    {
        $ad = new ADs(['name' => 'ad_title2', 'id' => 1]);
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/ads/1', 'PUT')->willReturn(['id' => 1, 'name' => 'ad_title2']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->update($ad);
        $this->assertEquals('ad_title2', $r->getName());

        $r = $adsApi->create($ad);
        $this->assertEquals('ad_title2', $r->getName());
    }

    public function testDelete()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/ads/1', 'DELETE')->willReturn(['success' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->delete(1);
        $this->assertEquals(1, $r['success']);
    }

    public function testUpdateStatus()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/ads/status/1', 'PUT')->willReturn(['list' => ['id' => 1, 'name' => 'ad_title', 'configured_status' => 0, 'effective_status' => 0]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->updateStatus(1, ConfiguredStatus::PAUSE);
        $ad = $r['list'][0];
        $this->assertEquals(0, $ad->getConfiguredStatus());
    }

    public function testTargetMap()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/ads/targetmap', 'GET')->willReturn(['interests_normal' => [['name' => '金融', 'value' => [['name' => 'name', 'value' => 100202]]]]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->targetMap();
        $this->assertEquals(100202, $r['interests_normal'][0]['value'][0]['value']);
    }

    public function testGuarantee()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $url = '/ads/guarantee?targeting=' . json_encode(['age_min' => 8, 'age_max' => 10, 'genders' => 401, 'geo_locations' => [0,401], 'category_interests' => [100402,100403], 'user_os' => [90110201,90110202,90110100]]);
        $apiRequest->method('call')->with($url, 'GET')->willReturn(['list' => ['2017-05-11' => [10 ,10 ,10]]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->guarantee(8, 10,401,[0,401],[100402,100403],[90110201,90110202,90110100]);
        $this->assertCount(3, $r['list']['2017-05-11']);
    }

    public function testGetGuaranteePrice()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $url = '/ads/guarantee/price?targeting=' . json_encode(['age_min' => 8, 'age_max' => 10, 'genders' => 401]);
        $apiRequest->method('call')->with($url, 'GET')->willReturn(['list' => ['2017-05-11'=> 6000, 'sum' => 6000]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->getGuaranteePrice(8, 10,401);
        $this->assertEquals(6000, $r['list']['2017-05-11']);
        $this->assertEquals(6000, $r['list']['sum']);
    }

    public function testGetGuaranteeReleasePrice()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $url = '/ads/guarantee/price-release?release_list=' . json_encode([1,2,3]) . '&id=1';
        $apiRequest->method('call')->with($url, 'GET')->willReturn(['list' => ['daily' => ['2017-05-11'=> ['fine' => 0, 'percentage' => '0%', 'unfreeze' => 6000]], 'sum_fine' => 6000]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->getGuaranteeReleasePrice(1, [1, 2, 3]);
        $this->assertEquals(6000, $r['list']['daily']['2017-05-11']['unfreeze']);
        $this->assertEquals(6000, $r['list']['sum_fine']);
    }

    public function testGetTopicSearch()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $url = '/ads/topic-search';
        $apiRequest->method('call')->with($url, 'GET')->willReturn(['list' => [['follow' => 123, 'id' => 'id', 'topicName' => '王源']]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->getTopicSearch();
        $this->assertEquals(123, $r['list'][0]['follow']);
    }

    public function testGetDesignatedAccount()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $url = '/ads/designated-account';
        $apiRequest->method('call')->with($url, 'GET')->willReturn(['list' => [['verified' => 2]]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->getDesignatedAccount();
        $this->assertEquals(2, $r['list'][0]['verified']);
    }

    public function testGetMid()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $url = '/ads/mid?url=http://weibo.com/1656783065/F6AOUl7pA?from=page_1005051656783065_profile&wvr=6&mod=weibotime&type=comment#_rnd1500261404282';
        $apiRequest->method('call')->with($url, 'GET')->willReturn(['list' => [['mid' => '4079855484080351', 'url' => 'http://weibo.com/1656783065/F6AOUl7pA?from=page_1005051656783065_profile&wvr=6&mod=weibotime&type=comment#_rnd1500261404282']]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->getMid("http://weibo.com/1656783065/F6AOUl7pA?from=page_1005051656783065_profile&wvr=6&mod=weibotime&type=comment#_rnd1500261404282");
        $this->assertEquals('4079855484080351', $r['list'][0]['mid']);
    }

    public function testGetCoverage()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $url = '/ads/coverage?objective=88010001' .'&billing_type=2'. '&targeting=' . json_encode(['age_min' => 8, 'age_max' => 10, 'genders' => 401]) ;
        $apiRequest->method('call')->with($url, 'GET')->willReturn(['number'=> "约7,000用户"]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->getCoverage(8,10,401,88010001,2);
        $this->assertEquals('约7,000用户', $r['number']);

    }


    public function testGetAccurateInterest()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/ads/accurate-interest', 'GET')->willReturn(['list' => ['count'=> '27789830']]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->getAccurateInterest();
        $this->assertEquals(27789830, $r['list']['count']);
    }

    public function testGetSimilarAccount()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/ads/similar-account?customer_id=2429264874', 'GET')->willReturn(['result' => ['list'=>['id' => 1796217437]]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->getSimilarAccount(2429264874);
        $this->assertEquals(1796217437, $r['result']['list']['id']);
    }


    public function testTopicRecommend()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/ads/topic-recommend', 'GET')->willReturn(['list' => ['follow'=> '862534971']]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $adsApi = new ADsApi($api);
        $r = $adsApi->getTopicRecommend();
        $this->assertEquals('862534971', $r['list']['follow']);
    }

}