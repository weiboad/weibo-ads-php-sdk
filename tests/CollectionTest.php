<?php

namespace WeiboAdTest;


use WeiboAd\Collection;

class CollectionTest extends AbstractTestCase
{
    public function testCollection() {
        $data = [
            'index1' => ['k1'=> 'v1'],
            'index2' => ['k2' => 'v2']
        ];
        $collection = new Collection($data);
        $this->assertTrue($collection->offsetExists('index1'));
        $this->assertNotTrue($collection->offsetExists('index0'));

        $arr = $collection->offsetGet('index1');
        $this->assertEquals('k1', key($arr));

        $this->assertCount(2, $collection);

        foreach ($collection as $o) {
            $this->assertTrue(is_array($o));
        }

        $collection->offsetSet('index3', 'v3');
        $this->assertEquals('v3', $collection->offsetGet('index3'));
        $collection->offsetSet(null, 'v4');
        $this->assertEquals('v4', $collection->offsetGet(0));

        $collection->offsetUnset(0);
        $this->assertNotTrue($collection->offsetExists(0));
        
    }
}
