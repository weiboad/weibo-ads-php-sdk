<?php

namespace WeiboAdTest\Core;


use WeiboAd\Core\VideoApi;
use WeiboAdTest\AbstractTestCase;

class VideoApiTest extends AbstractTestCase
{

    public function testRead()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/video?id=1&is_md5=', 'GET')->willReturn(['id' => 1, 'fid' => '4050443606690251']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $videoApi = new VideoApi($api);
        $r = $videoApi->read(1);
        $this->assertEquals('4050443606690251', $r->getFid());
    }

    public function testList()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/video/list?page=1&page_size=10', 'GET')->willReturn(['list' =>['id' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $videoApi = new VideoApi($api);
        $r = $videoApi->lists();
        $this->assertCount(1, $r['list']);
    }


    public function testUpload()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/video', 'POST')->willReturn(['id' => 1, 'name' => 'video_test.mp4']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $videoApi = new VideoApi($api);
        $r = $videoApi->upload('video_test.mp4', '5d19b6554bef99b36aed3418e5566717', 123,"file_stream");
        $this->assertEquals('video_test.mp4', $r->getName());
    }
}