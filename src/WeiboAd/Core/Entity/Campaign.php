<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Campaign
 * @package WeiboAd\Core\Entity
 */
class Campaign extends AbstractEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $objective;

    /**
     * @var int
     */
    private $appId;

    /**
     * @var int
     */
    private $appType;

    /**
     * @var float
     */
    private $lifetimeBudget;

    /**
     * @var int
     */
    private $guaranteedDelivery;

    /**
     * @var int
     */
    private $configuredStatus;

    /**
     * @var int
     */
    private $effectiveStatus;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getObjective()
    {
        return $this->objective;
    }

    /**
     * @param int $objective
     */
    public function setObjective($objective)
    {
        $this->objective = $objective;
    }

    /**
     * @return int
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param int $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return int
     */
    public function getAppType()
    {
        return $this->appType;
    }

    /**
     * @param int $appType
     */
    public function setAppType($appType)
    {
        $this->appType = $appType;
    }

    /**
     * @return float
     */
    public function getLifetimeBudget()
    {
        return $this->lifetimeBudget;
    }

    /**
     * @param float $lifetimeBudget
     */
    public function setLifetimeBudget($lifetimeBudget)
    {
        $this->lifetimeBudget = $lifetimeBudget;
    }

    /**
     * @return int
     */
    public function getGuaranteedDelivery()
    {
        return $this->guaranteedDelivery;
    }

    /**
     * @param int $guaranteedDelivery
     */
    public function setGuaranteedDelivery($guaranteedDelivery)
    {
        $this->guaranteedDelivery = $guaranteedDelivery;
    }

    /**
     * @return int
     */
    public function getConfiguredStatus()
    {
        return $this->configuredStatus;
    }

    /**
     * @param int $configuredStatus
     */
    public function setConfiguredStatus($configuredStatus)
    {
        $this->configuredStatus = $configuredStatus;
    }

    /**
     * @return int
     */
    public function getEffectiveStatus()
    {
        return $this->effectiveStatus;
    }

    /**
     * @param int $effectiveStatus
     */
    public function setEffectiveStatus($effectiveStatus)
    {
        $this->effectiveStatus = $effectiveStatus;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


}
