<?php

namespace WeiboAdTest\Core;


use WeiboAd\Core\ImageApi;
use WeiboAdTest\AbstractTestCase;

class ImageApiTest extends AbstractTestCase
{

    public function testRead()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/image?pic_id=e06601f1jw1faie2emzv6j21dg0rads7', 'GET')->willReturn(['id' => 1, 'pic_id' => 'e06601f1jw1faie2emzv6j21dg0rads7']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $imageApi = new ImageApi($api);
        $r = $imageApi->read('e06601f1jw1faie2emzv6j21dg0rads7');
        $this->assertEquals('e06601f1jw1faie2emzv6j21dg0rads7', $r->getPicId());
    }

    public function testList()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/image/list?page=1&page_size=10', 'GET')->willReturn(['list' =>['id' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $imageApi = new ImageApi($api);
        $r = $imageApi->lists();
        $this->assertCount(1, $r['list']);
    }


    public function testUpload()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/openapi/image', 'POST')->willReturn(['pic_id' => 'e06601f1jw1faie2emzv6j21dg0rads7']);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $imageApi = new ImageApi($api);
        $r = $imageApi->upload('image_name', "file_stream");
        $this->assertEquals('e06601f1jw1faie2emzv6j21dg0rads7', $r->getPicId());
    }
}