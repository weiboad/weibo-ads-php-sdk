<?php
/**
 *
 * Add some GET and PUT api tests from some fake data
 */

namespace WeiboAdTest;

use WeiboAd\Api;
use WeiboAd\Core\AccountApi;
use WeiboAd\Core\ADsApi;
use WeiboAd\Core\AppApi;
use WeiboAd\Core\AudienceApi;
use WeiboAd\Core\CampaignApi;
use WeiboAd\Core\Constant\ConfiguredStatus;
use WeiboAd\Core\Constant\CreativeConfiguredStatus;
use WeiboAd\Core\CreativeApi;
use WeiboAd\Core\ImageApi;
use WeiboAd\Core\InsightApi;
use WeiboAd\Core\VideoApi;

class IntegrationTest extends AbstractTestCase
{
    private $api;

    public function setUp() {
        parent::setUp();
        $this->api = new Api('app_id_test', 'app_secret_test', '1a581e6debf774d7aeec48939b82d737fb7c10106dd45074ae9402bc2b72a37d5c224ca137a042a632fd56d9a1e09cec399aa641ae2cb327ccc25111c534c76d');
    }

    public function testAccount() {
        $obj = new AccountApi($this->api);
        $account = $obj->read();
        $this->assertEquals('1656783065', $account->getCustomerId());
    }

    public function testCampaign() {
        $obj = new CampaignApi($this->api);
        $campaigns = $obj->lists();
        if (isset($campaigns['list']) && !empty($campaigns['list'])) {
            $data = $campaigns['list'][0];

            $campaign = $obj->read($data->getId());
            $this->assertEquals($data->getId(), $campaign->getId());

            $title = 'campaign title test' . time();
            $campaign->setName($title);
            $campaign = $obj->update($campaign);
            $this->assertEquals($campaign->getName(), $title);

            $campaign = $obj->updateStatus($campaign->getId(), ConfiguredStatus::ACTIVE);
            $this->assertEquals($campaign->getConfiguredStatus(), ConfiguredStatus::ACTIVE);
        }
    }

    public function testAds() {
        $obj = new ADsApi($this->api);
        $ads = $obj->lists();

        if (isset($ads['list']) && !empty($ads['list'])) {
            $data = $ads['list'][0];

            $ad = $obj->read($data->getId());
            $this->assertEquals($data->getId(), $ad->getId());

            $title = 'ad title test';
            $ad->setName($title);
            $ad = $obj->update($ad);
            $this->assertEquals($ad->getName(), $title);

            $ads = $obj->updateStatus($ad->getId(), ConfiguredStatus::ACTIVE);
            $ad = $ads['list'][0];
            $this->assertEquals($ad->getConfiguredStatus(), ConfiguredStatus::ACTIVE);
        }

    }

    public function testCreative() {
        $obj = new CreativeApi($this->api);
        $creatives = $obj->lists();
        if (isset($creatives['list']) && !empty($creatives['list'])) {
            $data = $creatives['list'][0];

            $creative = $obj->read($data->getId());
            $this->assertEquals($data->getId(), $creative->getId());

            $title = 'creative title test';
            $creative->setName($title);
            $creative = $obj->update($creative->getId(), 1, ['third_party_show' => 'http://weibo.com'], true);
            $monitor = $creative->getMonitor();
            $this->assertEquals('http://weibo.com', $monitor['third_party_show']);
            $status = $creative->getConfiguredStatus() != 0 ? CreativeConfiguredStatus::PAUSE : CreativeConfiguredStatus::OPEN;
            $ret = $obj->updateStatus($creative->getId(), $status);
            $this->assertTrue($ret['success']);

        }
    }

    public function testAudience() {
        $obj = new AudienceApi($this->api);
        $audiences = $obj->lists();
        if (isset($audiences['list']) && $audiences['list']->count()) {
            $data = $audiences['list'][0];
            $audience = $obj->read($data->getId());
            $this->assertEquals($data->getId(), $audience->getId());
        }

    }

    public function testImage() {
        $obj = new ImageApi($this->api);
        $images = $obj->lists();
        if (isset($images['list']) && $images['list']->count()) {
            $data = $images['list'][0];
            $image = $obj->read($data->getPicId());
            $this->assertEquals($data->getPicId(), $image->getPicId());
        }
    }


    public function testVideo() {
        $obj = new VideoApi($this->api);
        $videos = $obj->lists();
        if (isset($videos['list']) && $videos['list']->count()) {
            $data = $videos['list'][0];
            $video = $obj->read($data->getId());
            $this->assertEquals($data->getId(), $video->getId());
        }
    }

    public function testDemography() {
        $obj = new InsightApi($this->api);
        $data = $obj->demography(['2017-07-01', '2017-07-11'], ['pv', 'ecpm'], ['account'], ['age'], new \stdClass(), ['pv'], 'desc', 1, 10);

        if (isset($data['rows'])) {
            $this->assertEquals(10, $data['rows']);
        }
    }
    public function testEffect() {
        $obj = new InsightApi($this->api);
        $data = $obj->effect(['2017-07-01', '2017-07-11'], ['pv', 'ecpm'], ['account'], ['account', 'date'], new \stdClass(), ['pv'], 'desc', 1, 10);
        if (isset($data['rows'])) {
            $this->assertEquals(10, $data['rows']);
        }
    }

    public function testLayer() {
        $obj = new InsightApi($this->api);
        $data = $obj->layer(['2017-07-01', '2017-07-11'], ['second_pv', 'second_layer_pv_rate'], ['account'], ['account', 'date'], ['account_id' => '123'], ['second_pv'], 'desc', 1, 10);
        if (isset($data['page'])) {
            $this->assertEquals(1, $data['page']);
        }
    }

    public function testAppCategory() {
        $obj = new AppApi($this->api);
        $data = $obj->category();
        $this->assertTrue(is_array($data));
    }

    public function testAppList() {
        $obj = new AppApi($this->api);
        $data = $obj->lists();
        $this->assertEquals(10, $data['page_size']);
    }

    public function testAppUpload() {
        $this->api->getApiRequest()->setTimeout(30);
        $obj = new AppApi($this->api);
        $data = $obj->upload(1, "https://itunes.apple.com/cn/app/dong-qiu-di-zhuan-ye-quan/id766695512?ls=1&mt=8");
        $this->assertEquals(0, $data['errcode']);
    }
}