<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Account
 * @package WeiboAd\Core\Entity
 */
class Account extends AbstractEntity
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
     * @var float
     */
    private $spendCap;

    /**
     * @var float
     */

    private $reverseSpendCap;

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
    private $disableReason;

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
     * @return float
     */
    public function getSpendCap()
    {
        return $this->spendCap;
    }

    /**
     * @param float $spendCap
     */
    public function setSpendCap($spendCap)
    {
        $this->spendCap = $spendCap;
    }

    /**
     * @return float
     */
    public function getReverseSpendCap()
    {
        return $this->reverseSpendCap;
    }

    /**
     * @param float $reverseSpendCap
     */
    public function setReverseSpendCap($reverseSpendCap)
    {
        $this->reverseSpendCap = $reverseSpendCap;
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
    public function getDisableReason()
    {
        return $this->disableReason;
    }

    /**
     * @param string $disableReason
     */
    public function setDisableReason($disableReason)
    {
        $this->disableReason = $disableReason;
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