<?php

namespace WeiboAd\Core\Entity;

use WeiboAd\Util;

/**
 * Class AbstractEntity
 * @package WeiboAd\Core\Entity
 */
class AbstractEntity
{

    /**
     * AbstractEntity constructor.
     * @param $data
     */
    public function __construct($data = "")
    {
        if (is_array($data)) {
            $this->fillValues($data);
        }
    }

    /**
     * @param $data
     */
    protected function fillValues($data)
    {
        if (!is_array($data)) {
            return;
        }
        foreach ($data as $k => $v) {
            $setter = "set" . Util::studly($k);
            if (method_exists($this, $setter)) {
                $this->$setter($v);
            }
        }
    }

}