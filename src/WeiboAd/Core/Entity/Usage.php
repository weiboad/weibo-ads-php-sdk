<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Feed
 * @package WeiboAd\Core\Entity
 */
class Usage extends AbstractEntity
{
    /**
     * @var int
     */
    private $all;

    /**
     * @var int
     */
    private $customer;

    /**
     * @var int
     */
    private $owner;

    /**
     * @return int
     */
    public function getAll()
    {
        return $this->all;
    }

    /**
     * @param int $all
     */
    public function setAll($all)
    {
        $this->all = $all;
    }

    /**
 * @return int
 */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param int $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return int
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param int $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }



}