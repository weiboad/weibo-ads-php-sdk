<?php

namespace WeiboAd\Core\Entity;


/**
 * Class ADSchedule
 * @package WeiboAd\Core\Entity
 */
class ADSchedule extends AbstractEntity
{
    /**
     * @var int
     */
    private $adId;

    /**
     * @var string
     */
    private $startTime;

    /**
     * @var string
     */
    private $stopTime;

    /**
     * @var int
     */
    private $dailyStartTime;

    /**
     * @var int
     */
    private $dailyStopTime;

    /**
     * @var int
     */
    private $impression;

    /**
     * @var float
     */
    private $money;

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
    public function getAdId()
    {
        return $this->adId;
    }

    /**
     * @param int $adId
     */
    public function setAdId($adId)
    {
        $this->adId = $adId;
    }

    /**
     * @return string
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param string $startTime
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    }

    /**
     * @return string
     */
    public function getStopTime()
    {
        return $this->stopTime;
    }

    /**
     * @param string $stopTime
     */
    public function setStopTime($stopTime)
    {
        $this->stopTime = $stopTime;
    }

    /**
     * @return int
     */
    public function getDailyStartTime()
    {
        return $this->dailyStartTime;
    }

    /**
     * @param int $dailyStartTime
     */
    public function setDailyStartTime($dailyStartTime)
    {
        $this->dailyStartTime = $dailyStartTime;
    }

    /**
     * @return int
     */
    public function getDailyStopTime()
    {
        return $this->dailyStopTime;
    }

    /**
     * @param int $dailyStopTime
     */
    public function setDailyStopTime($dailyStopTime)
    {
        $this->dailyStopTime = $dailyStopTime;
    }

    /**
     * @return int
     */
    public function getImpression()
    {
        return $this->impression;
    }

    /**
     * @param int $impression
     */
    public function setImpression($impression)
    {
        $this->impression = $impression;
    }

    /**
     * @return float
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param float $money
     */
    public function setMoney($money)
    {
        $this->money = (float)$money;
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