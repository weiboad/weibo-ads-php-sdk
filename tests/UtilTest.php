<?php

namespace WeiboAdTest;

use WeiboAd\Util;
use WeiboAd\Exception\InvalidArgumentException;

class UtilTest extends AbstractTestCase
{
    public function testJsonDecode() {
        $arr = ['k' => 'v'];
        $this->assertEquals($arr, Util::jsonDecode(json_encode($arr), true));
        try {
            Util::jsonDecode('test');
        } catch (\Exception $e) {
            $this->assertTrue($e instanceof InvalidArgumentException);
        }
    }

    public function testSnake() {
        $this->assertEquals('test_test', Util::snake('testTest'));
        $this->assertEquals('test_test', Util::snake('testTest'));
        $this->assertEquals('test|test', Util::snake('testTest','|'));
    }

    public function testStudly() {
        $this->assertEquals('TestTest', Util::studly('test_test'));
        $this->assertEquals('TestTest', Util::studly('test_test'));
    }
}