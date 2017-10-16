<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Creative
 * @package WeiboAd\Core\Entity
 */
class Creative extends AbstractEntity
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
    private $adId;

    /**
     * @var int
     */
    private $adStyle;

    /**
     * @var Feed
     */
    private $feed;

    /**
     * @var int
     */
    private $creativeType;

    /**
     * @var int
     */
    private $appId;

    /**
     * @var int
     */
    private $feedSource;

    /**
     * @var int
     */
    private $feedStyle;

    /**
     * @var int
     */
    private $publishType;

    /**
     * @var string
     */
    private $publishDatetime;

    /**
     * @var int
     */
    private $feedLicenseId;

    /**
     * @var int
     */
    private $monitorType;

    /**
     * @var string
     */
    private $monitor;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var int
     */
    private $isRecycled;

    /**
     * @var string
     */
    private $recycleDatetime;

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
     * @return int
     */
    public function getAdStyle()
    {
        return $this->adStyle;
    }

    /**
     * @param int $adStyle
     */
    public function setAdStyle($adStyle)
    {
        $this->adStyle = $adStyle;
    }

    /**
     * @return Feed
     */
    public function getFeed()
    {
        return $this->feed;
    }

    /**
     * @param mixed $feed
     */
    public function setFeed($feed)
    {
        if ($feed instanceof Feed) {
            $this->feed = $feed;
        } elseif (is_array($feed)) {
            $this->feed = new Feed($feed);
        }
    }

    /**
     * @return int
     */
    public function getCreativeType()
    {
        return $this->creativeType;
    }

    /**
     * @param int $creativeType
     */
    public function setCreativeType($creativeType)
    {
        $this->creativeType = $creativeType;
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
    public function getFeedSource()
    {
        return $this->feedSource;
    }

    /**
     * @param int $feedSource
     */
    public function setFeedSource($feedSource)
    {
        $this->feedSource = $feedSource;
    }

    /**
     * @return int
     */
    public function getFeedStyle()
    {
        return $this->feedStyle;
    }

    /**
     * @param int $feedStyle
     */
    public function setFeedStyle($feedStyle)
    {
        $this->feedStyle = $feedStyle;
    }

    /**
     * @return int
     */
    public function getPublishType()
    {
        return $this->publishType;
    }

    /**
     * @param int $publishType
     */
    public function setPublishType($publishType)
    {
        $this->publishType = $publishType;
    }

    /**
     * @return string
     */
    public function getPublishDatetime()
    {
        return $this->publishDatetime;
    }

    /**
     * @param string $publishDatetime
     */
    public function setPublishDatetime($publishDatetime)
    {
        $this->publishDatetime = $publishDatetime;
    }

    /**
     * @return int
     */
    public function getFeedLicenseId()
    {
        return $this->feedLicenseId;
    }

    /**
     * @param int $feedLicenseId
     */
    public function setFeedLicenseId($feedLicenseId)
    {
        $this->feedLicenseId = $feedLicenseId;
    }

    /**
     * @return int
     */
    public function getMonitorType()
    {
        return $this->monitorType;
    }

    /**
     * @param int $monitorType
     */
    public function setMonitorType($monitorType)
    {
        $this->monitorType = $monitorType;
    }

    /**
     * @return string
     */
    public function getMonitor()
    {
        return $this->monitor;
    }

    /**
     * @param string $monitor
     */
    public function setMonitor($monitor)
    {
        $this->monitor = $monitor;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return int
     */
    public function getIsRecycled()
    {
        return $this->isRecycled;
    }

    /**
     * @param int $isRecycled
     */
    public function setIsRecycled($isRecycled)
    {
        $this->isRecycled = $isRecycled;
    }

    /**
     * @return string
     */
    public function getRecycleDatetime()
    {
        return $this->recycleDatetime;
    }

    /**
     * @param string $recycleDatetime
     */
    public function setRecycleDatetime($recycleDatetime)
    {
        $this->recycleDatetime = $recycleDatetime;
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