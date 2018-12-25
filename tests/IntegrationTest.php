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
use WeiboAd\Core\FansApi;
use WeiboAd\Core\ImageApi;
use WeiboAd\Core\InsightApi;
use WeiboAd\Core\MarketApi;
use WeiboAd\Core\VideoApi;
use WeiboAd\Core\AssetsApi;
use WeiboAd\Core\MessageApi;
use WeiboAd\Core\LicensesApi;

class IntegrationTest extends AbstractTestCase
{
    private $api;

    public function setUp()
    {
        parent::setUp();
        $this->api = new Api('app_id_test', 'app_secret_test', '1a581e6debf774d7aeec48939b82d737fb7c10106dd45074ae9402bc2b72a37d5c224ca137a042a632fd56d9a1e09cec399aa641ae2cb327ccc25111c534c76d');
    }



  /*  public function testFans()
    {
        $obj = new FansApi($this->api);

        $mapping = $obj->getMapping("gender");
        $this->assertNotEmpty($mapping['gender']);

        $price = $obj->getPrice("41878140887231123");
        $this->assertArrayHasKey("total_price", $price);

        $advancePrice = $obj->getAdvancePrice("4187814088723155", "2608812381");
        $this->assertArrayHasKey("price", $advancePrice);

        $data = $obj->getPromoteData("170603250165822062");
        $this->assertArrayHasKey("interactive", $data);

        $remain = $obj->getRemain("41878140887231123", "",  "", "", "20051,20052");
        $this->assertArrayHasKey("designate", $remain);


    }



      public function testDemography()
      {
          $obj = new InsightApi($this->api);
          $data = $obj->demography(['2017-07-01', '2017-07-11'], ['pv', 'ecpm'], ['account'], ['age'], new \stdClass(), ['pv'], 'desc', 1, 10);

          if (isset($data['rows'])) {
              $this->assertEquals(10, $data['rows']);
          }
      }


      public function testLayer()
      {
          $obj = new InsightApi($this->api);
          $data = $obj->layer(['2017-07-01', '2017-07-11'], ['second_pv', 'second_layer_pv_rate'], ['account'], ['account', 'date'], ['account_id' => '123'], ['second_pv'], 'desc', 1, 10);
          if (isset($data['page'])) {
              $this->assertEquals(1, $data['page']);
          }
      }

      public function testAppCategory()
      {
          $obj = new AppApi($this->api);
          $data = $obj->category();
          $this->assertTrue(is_array($data));
      }



*/





    /*
        * 测试账户
        */
     public function testAccount()
     {
         $obj = new AccountApi($this->api);
         $account = $obj->read();
         $this->assertEquals(272999, $account->getId());

         $account = $obj->budget("100.00");
         $this->assertEquals(1, $account['configured_status']);
         $this->assertEquals(272999, $account['id']);

         $Assets = $obj->asset();
         $this->assertEquals("0.00", $Assets['real_time_consume']);
     }

    /*
     * 测试广告系列
     */
     public function testCampaign()
     {
         $obj = new CampaignApi($this->api);
         $campaigns = $obj->lists();
         if (isset($campaigns['list']) && !empty($campaigns['list'])) {
             $data = $campaigns['list'][0];
             $campaign = $obj->read($data->getId());
             $this->assertEquals($data->getId(), $campaign->getId());

             $title = 'campaign title test' . time();
             $campaign = $obj->update($campaign);

             $campaign = $obj->updateStatus($campaign->getId(), ConfiguredStatus::ACTIVE);
             $this->assertEquals($campaign->getConfiguredStatus(), ConfiguredStatus::PAUSE);


         }
     }

     /*
      * 测试广告计划
      */
    public function testAds()
    {
        $obj = new ADsApi($this->api);
        $ads = $obj->lists();

        if (isset($ads['list']) && !empty($ads['list'])) {
            $data = $ads['list'][0];

            $ad = $obj->read($data->getId());
            $this->assertEquals($data->getId(), $ad->getId());

            $ad = $obj->targetMap();
            $this->assertEquals(100101, $ad['interests_normal'][0]['value'][0]['value']);

            $ad = $obj->getTopicSearch("女");
            $this->assertEquals(45738608, $ad['list'][0]['follow']);

            $ads = $obj->updateStatus($data->getId(), ConfiguredStatus::ACTIVE);
            $ad = $ads['list'][0];
            $this->assertEquals($ad->getConfiguredStatus(), ConfiguredStatus::ACTIVE);
        }

    }

    /*
    * 测试广告创意
    */
    public function testCreative()
    {
        $obj = new CreativeApi($this->api);
        $creatives = $obj->lists();
        if (isset($creatives['list']) && !empty($creatives['list'])) {
            $data = $creatives['list'][0];

            $creativeRead = $obj->read($data->getId());
            $this->assertEquals($data->getId(), $creativeRead->getId());

            $creative = $obj->createIndustry();
            $this->assertCount(31, $creative['list']);

            $title = 'creative title test';
            $creativeRead->setName($title);

            $monitor = $creativeRead->getMonitor();
            $this->assertEquals('', $monitor['third_party_show']);
            $status = $creativeRead->getConfiguredStatus() != 0 ? CreativeConfiguredStatus::PAUSE : CreativeConfiguredStatus::OPEN;
            $ret = $obj->updateStatus($creativeRead->getId(), $status);
            $this->assertTrue($ret['success']);

        }
    }

    /*
     * 受众管理测试
     */
    public function testAudience()
    {
        $obj = new AudienceApi($this->api);
        $audiences = $obj->lists();
        if (isset($audiences['list']) && $audiences['list']->count()) {
            $data = $audiences['list'][0];
            $audience = $obj->read($data->getId());
            $this->assertEquals($data->getId(), $audience->getId());
        }

    }

     /*
      * 数据市场测试
      */
     public function testData()
     {
         $obj = new MarketApi($this->api);
         $markets = $obj->data(1);
         if(isset($markets['list']) && !empty($markets['list'])){
             $marketInfo = $obj->info(100061, 1);
             $this->assertEquals(100061, $marketInfo->getId());
         }
         $this->assertCount(6, $markets['list']);

     }

    /*
     * 应用市场测试
     */
    public function testAppList()
    {
        $obj = new AppApi($this->api);
        $data = $obj->lists();
        $this->assertEquals(200, $data['page_size']);
    }



    /*
     * 消息通知测试
     */
    public function testMessage()
    {
        $obj = new MessageApi($this->api);
        $messages = $obj->lists('SFST',0);
        if (isset($images['list']) && $messages['list']->count()) {
            $data = $messages['list'][0];
            $message = $obj->read($data->getMid(), 'SFST');
            $this->assertEquals(1, $message['success']);
        }
    }

    /*
     * 数据统计测试
     */
    public function testEffect()
    {
        $obj = new InsightApi($this->api);
        $data = $obj->effect(['2017-07-01', '2017-07-11'], ['pv', 'ecpm'], ['account'], ['account', 'date'], new \stdClass(), ['pv'], 'desc', 1, 10);
        if (isset($data['rows'])) {
            $this->assertEquals(10, $data['rows']);
        }
    }




}