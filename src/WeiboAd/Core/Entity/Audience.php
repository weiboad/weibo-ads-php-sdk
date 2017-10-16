<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Audience
 * @package WeiboAd\Core\Entity
 */
class Audience extends AbstractEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $audiencesSize;

    /**
     * @var int
     */
    private $audiencesType;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var int
     */
    private $dataFormat;

    /**
     * @var int
     */
    private $dataSource;

    /**
     * @var int
     */
    private $digSourceId;

    /**
     * @var int
     */
    private $isDeleteEnable;

    /**
     * @var int
     */
    private $isDug;

    /**
     * @var int
     */
    private $isUsing;

    /**
     * @var int
     */
    private $lookAlikeId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var string
     */
    private $summary;

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
    public function getAudiencesSize()
    {
        return $this->audiencesSize;
    }

    /**
     * @param int $audiencesSize
     */
    public function setAudiencesSize($audiencesSize)
    {
        $this->audiencesSize = $audiencesSize;
    }

    /**
     * @return int
     */
    public function getAudiencesType()
    {
        return $this->audiencesType;
    }

    /**
     * @param int $audiencesType
     */
    public function setAudiencesType($audiencesType)
    {
        $this->audiencesType = $audiencesType;
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
     * @return int
     */
    public function getDataFormat()
    {
        return $this->dataFormat;
    }

    /**
     * @param int $dataFormat
     */
    public function setDataFormat($dataFormat)
    {
        $this->dataFormat = $dataFormat;
    }

    /**
     * @return int
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }

    /**
     * @param int $dataSource
     */
    public function setDataSource($dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @return int
     */
    public function getDigSourceId()
    {
        return $this->digSourceId;
    }

    /**
     * @param int $digSourceId
     */
    public function setDigSourceId($digSourceId)
    {
        $this->digSourceId = $digSourceId;
    }

    /**
     * @return int
     */
    public function getIsDeleteEnable()
    {
        return $this->isDeleteEnable;
    }

    /**
     * @param int $isDeleteEnable
     */
    public function setIsDeleteEnable($isDeleteEnable)
    {
        $this->isDeleteEnable = $isDeleteEnable;
    }

    /**
     * @return int
     */
    public function getIsDug()
    {
        return $this->isDug;
    }

    /**
     * @param int $isDug
     */
    public function setIsDug($isDug)
    {
        $this->isDug = $isDug;
    }

    /**
     * @return int
     */
    public function getIsUsing()
    {
        return $this->isUsing;
    }

    /**
     * @param int $isUsing
     */
    public function setIsUsing($isUsing)
    {
        $this->isUsing = $isUsing;
    }

    /**
     * @return int
     */
    public function getLookAlikeId()
    {
        return $this->lookAlikeId;
    }

    /**
     * @param int $lookAlikeId
     */
    public function setLookAlikeId($lookAlikeId)
    {
        $this->lookAlikeId = $lookAlikeId;
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
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
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

}
