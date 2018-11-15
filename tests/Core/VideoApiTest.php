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

    public function testInit()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/video/init', 'POST')->willReturn(['length' => 555]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $videoApi = new VideoApi($api);
        $r = $videoApi->init('video_name', "file_md5",'file_size');
        $this->assertEquals(555, $r['length']);
    }


    public function testSegment()
    {

        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/video/segment', 'POST')->willReturn(['id' => 1]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $videoApi = new VideoApi($api);
        $r = $videoApi->segment('file_token', "file_md5",'segment_size','length','segment_md5','index','file');
        $this->assertEquals(1, $r['id']);

    }
}