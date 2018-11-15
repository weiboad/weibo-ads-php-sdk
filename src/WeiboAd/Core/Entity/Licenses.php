<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Licenses
 * @package WeiboAd\Core\Entity
 */
class Licenses extends AbstractEntity
{
    /**
     * @var int
     */
    private $bizId;

    /**
     * @var int
     */
    private $status;

    /**
     * @var string
     */
    private $uid;

    /**
     * @var string
     */
    private $ext;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var string
     */
    private $validityTime;


    /**
     * @var int
     */
    private $packageId;


    /**
     * @var string
     */
    private $desription;


    /**
     * @var int
     */
    private $entityId;


    /**
     * @var int
     */
    private $industry;

    /**
     * @var int
     */
    private $version;


    /**
     * @var string
     */
    private $packageName;

    /**
     * @var string
     */
    private $updateTime;


    /**
     * @var string
     */
    private $createTime;

    /**
     * @return int
     */
    public function getbizId()
    {
        return $this->bizId;
    }

    /**
     * @param int $bizId
     */
    public function setbizId($bizId)
    {
        $this->bizId = $bizId;
    }


    /**
     * @return int
     */
    public function getstatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setstatus($status)
    {
        $this->status = $status;
    }



    /**
     * @return int
     */
    public function getuid()
    {
        return $this->uid;
    }

    /**
     * @param int $uid
     */
    public function setuid($uid)
    {
        $this->uid = $uid;
    }


    /**
     * @return string
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * @param string $ext
     */
    public function setExt($ext)
    {
        $this->ext = $ext;
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
    public function getValidityTime()
    {
        return $this->validityTime;
    }

    /**
     * @param string $validityTime
     */
    public function setValidityTime($validityTime)
    {
        $this->validityTime = $validityTime;
    }


    /**
     * @return int
     */
    public function getpackageId()
    {
        return $this->packageId;
    }

    /**
     * @param int $packageId
     */
    public function setpackageId($packageId)
    {
        $this->packageId = $packageId;
    }

    /**
     * @return string
     */
    public function getDesription()
    {
        return $this->desription;
    }

    /**
     * @param string $desription
     */
    public function setDesription($desription)
    {
        $this->desription = $desription;
    }

    /**
     * @return int
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param int $entityId
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
    }

    /**
     * @return int
     */
    public function getIndustry()
    {
        return $this->industry;
    }

    /**
     * @param int $industry
     */
    public function setIndustry($industry)
    {
        $this->industry = $industry;
    }


    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }


    /**
     * @return string
     */
    public function getPackageName()
    {
        return $this->packageName;
    }

    /**
     * @param string $packageName
     */
    public function setPackageName($packageName)
    {
        $this->packageName = $packageName;
    }

    /**
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->updateTime;
    }

    /**
     * @param string $updateTime
     */
    public function setUpdateTime($updateTime)
    {
        $this->updateTime = $updateTime;
    }

    /**
     * @return string
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param string $createTime
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }


}