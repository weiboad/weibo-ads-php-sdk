<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Targeting
 * @package WeiboAd\Core\Entity
 */
class Targeting extends AbstractEntity
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $accurateInterests;

    /**
     * @var int
     */
    private $adId;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var int
     */
    private $ageMax;

    /**
     * @var int
     */
    private $ageMin;

    /**
     * @var int
     */
    private $audienceId;

    /**
     * @var int
     */
    private $audienceType;

    /**
     * @var array
     */
    private $behaviors;

    /**
     * @var array
     */
    private $categoryInterests;

    /**
     * @var int
     */
    private $genders;

    /**
     * @var array
     */
    private $geoLocations;

    /**
     * @var int
     */
    private $isTemplate;

    /**
     * @var array
     */
    private $loginFrequency;

    /**
     * @var array
     */
    private $socialConnections;

    /**
     * @var array
     */
    private $userDevice;

    /**
     * @var array
     */
    private $userNetwork;

    /**
     * @var array
     */
    private $userOs;

    /**
     * @var int
     */
    private $userOsVersion;

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
     * @return array
     */
    public function getAccurateInterests()
    {
        return $this->accurateInterests;
    }

    /**
     * @param array $accurateInterests
     */
    public function setAccurateInterests($accurateInterests)
    {
        $this->accurateInterests = $accurateInterests;
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
    public function getAgeMax()
    {
        return $this->ageMax;
    }

    /**
     * @param int $ageMax
     */
    public function setAgeMax($ageMax)
    {
        $this->ageMax = $ageMax;
    }

    /**
     * @return int
     */
    public function getAgeMin()
    {
        return $this->ageMin;
    }

    /**
     * @param int $ageMin
     */
    public function setAgeMin($ageMin)
    {
        $this->ageMin = $ageMin;
    }

    /**
     * @return int
     */
    public function getAudienceId()
    {
        return $this->audienceId;
    }

    /**
     * @param int $audienceId
     */
    public function setAudienceId($audienceId)
    {
        $this->audienceId = $audienceId;
    }

    /**
     * @return int
     */
    public function getAudienceType()
    {
        return $this->audienceType;
    }

    /**
     * @param int $audienceType
     */
    public function setAudienceType($audienceType)
    {
        $this->audienceType = $audienceType;
    }

    /**
     * @return array
     */
    public function getBehaviors()
    {
        return $this->behaviors;
    }

    /**
     * @param array $behaviors
     */
    public function setBehaviors($behaviors)
    {
        $this->behaviors = $behaviors;
    }

    /**
     * @return array
     */
    public function getCategoryInterests()
    {
        return $this->categoryInterests;
    }

    /**
     * @param array $categoryInterests
     */
    public function setCategoryInterests($categoryInterests)
    {
        $this->categoryInterests = $categoryInterests;
    }

    /**
     * @return int
     */
    public function getGenders()
    {
        return $this->genders;
    }

    /**
     * @param int $genders
     */
    public function setGenders($genders)
    {
        $this->genders = $genders;
    }

    /**
     * @return array
     */
    public function getGeoLocations()
    {
        return $this->geoLocations;
    }

    /**
     * @param array $geoLocations
     */
    public function setGeoLocations($geoLocations)
    {
        $this->geoLocations = $geoLocations;
    }

    /**
     * @return int
     */
    public function getIsTemplate()
    {
        return $this->isTemplate;
    }

    /**
     * @param int $isTemplate
     */
    public function setIsTemplate($isTemplate)
    {
        $this->isTemplate = $isTemplate;
    }

    /**
     * @return array
     */
    public function getLoginFrequency()
    {
        return $this->loginFrequency;
    }

    /**
     * @param array $loginFrequency
     */
    public function setLoginFrequency($loginFrequency)
    {
        $this->loginFrequency = $loginFrequency;
    }

    /**
     * @return array
     */
    public function getSocialConnections()
    {
        return $this->socialConnections;
    }

    /**
     * @param array $socialConnections
     */
    public function setSocialConnections($socialConnections)
    {
        $this->socialConnections = $socialConnections;
    }

    /**
     * @return array
     */
    public function getUserDevice()
    {
        return $this->userDevice;
    }

    /**
     * @param array $userDevice
     */
    public function setUserDevice($userDevice)
    {
        $this->userDevice = $userDevice;
    }

    /**
     * @return array
     */
    public function getUserNetwork()
    {
        return $this->userNetwork;
    }

    /**
     * @param array $userNetwork
     */
    public function setUserNetwork($userNetwork)
    {
        $this->userNetwork = $userNetwork;
    }

    /**
     * @return array
     */
    public function getUserOs()
    {
        return $this->userOs;
    }

    /**
     * @param array $userOs
     */
    public function setUserOs($userOs)
    {
        $this->userOs = $userOs;
    }

    /**
     * @return int
     */
    public function getUserOsVersion()
    {
        return $this->userOsVersion;
    }

    /**
     * @param int $userOsVersion
     */
    public function setUserOsVersion($userOsVersion)
    {
        $this->userOsVersion = $userOsVersion;
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
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


}