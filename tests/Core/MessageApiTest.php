<?php

namespace WeiboAdTest\Core;

use WeiboAd\Core\MessageApi;
use WeiboAd\Core\Entity\Message;
use WeiboAdTest\AbstractTestCase;

class MessageApiTest extends AbstractTestCase
{
    public function testCount()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/messages/count?source=2018', 'GET')->willReturn(['count' => 3]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $messagesApi = new MessageApi($api);
        $r = $messagesApi->count(2018);
        $this->assertEquals(3, $r['count']);
    }

    public function testList()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/messages?source=123&type=1&page=1&page_size=10', 'GET')->willReturn(['messages' =>['status' => 1]]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $messagesApi = new MessageApi($api);
        $r = $messagesApi->lists(123,1);
        $this->assertCount(1, $r['messages']);
    }

    public function testRead()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/messages/read/1', 'PUT')->willReturn(['success' => true]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $messagesApi = new MessageApi($api);
        $r = $messagesApi->read(1, 123);
        $this->assertEquals(1, $r['success']);
    }

    public function testallRead()
    {
        $api = $this->getMockApi();
        $apiRequest = $this->getMockApiRequest();
        $apiRequest->method('call')->with('/messages/read', 'PUT')->willReturn(['success' => true]);
        $api->method("getApiRequest")->willReturn($apiRequest);
        $messagesApi = new MessageApi($api);
        $r = $messagesApi->allRead(123);
        $this->assertEquals(1, $r['success']);
    }

}