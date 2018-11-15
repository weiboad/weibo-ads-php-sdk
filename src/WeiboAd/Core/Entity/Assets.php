<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Account
 * @package WeiboAd\Core\Entity
 */
class Assets extends AbstractEntity
{
    /**
     * @var string
     */
    private $balance;

    /**
     * @var string
     */
    private $realTimeConsume;

    /**
     * @return string
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param string $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getrealTimeConsume()
    {
        return $this->realTimeConsume;
    }

    /**
     * @param string $realTimeConsume
     */
    public function setrealTimeConsume($realTimeConsume)
    {
        $this->realTimeConsume = $realTimeConsume;
    }




}