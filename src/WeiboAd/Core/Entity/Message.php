<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Message
 * @package WeiboAd\Core\Entity
 */
class Message extends AbstractEntity
{
    /**
     * @var int
     */
    private $psize;

    /**
     * @return int
     */
    public function getPsize()
    {
        return $this->psize;
    }

    /**
     * @param int $psize
     */
    public function setPsize($psize)
    {
        $this->psize = $psize;
    }

}