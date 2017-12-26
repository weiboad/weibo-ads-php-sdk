<?php

namespace WeiboAd\Core;

use WeiboAd\Api;
use WeiboAd\Collection;
use WeiboAd\Core\Entity\AbstractEntity;
use WeiboAd\Util;

/**
 * Class AbstractApi
 * @package WeiboAd\Core
 */
class AbstractApi
{
    protected $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * @param AbstractEntity $entity
     * @return array
     */
    protected function entityToArray(AbstractEntity $entity)
    {
        $ref = new \ReflectionClass($entity);
        $properties = $ref->getProperties();
        $data = [];
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $key = $property->getName();
            $value = $property->getValue($entity);
            $key = Util::snake($key);
            if ($value instanceof AbstractEntity) {
                $data[$key] = $this->entityToArray($value);
            } elseif ($value instanceof Collection) {
                $data[$key] = [];
                foreach ($value as $v) {
                    $data[$key][] = $this->entityToArray($v);
                }
            } else {
                $data[$key] = $value;
            }
        }
        return $data;
    }

}
