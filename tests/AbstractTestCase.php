<?php

namespace WeiboAdTest;

use PHPUnit\Framework\TestCase;

class AbstractTestCase extends TestCase
{

    protected function getMockApiRequest()
    {
        return $this->createMock("WeiboAd\\ApiRequest");
    }

    protected function getMockApi()
    {
        return $this->createMock("WeiboAd\\Api");
    }

}