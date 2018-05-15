<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Maket
 * @package WeiboAd\Core\Entity
 */
class Market extends AbstractEntity
{
    /**
     * @var int
     */
    private $id;


    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $desc;

    /**
     * @var int
     */

    private $activeNum;

    /**
     * @var string
     */
    private $updateTime;


    /**
     * @var int
     */
    private $price;


    /**
     * @var int
     */
    private $star;


    /**
     * @var float
     */
    private $score;


    /**
     * @var float
     */
    private $hot;


    /**
     * @var int
     */
    private $effectNormal;


    /**
     * @var int
     */
    private $effectVideo;



    /**
     * @var string
     */
    private $providerName;


    /**
     * @var int
     */
    private $providerId;


    /**
     * @var string
     */
    private $providerIcon;


    /**
     * @var string
     */
    private $providerDesc;

    /**
     * @var int
     */
    private $usageAll;

    /**
     * @var int
     */
    private $usageCustomer;

    /**
     * @var int
     */
    private $usageOwner;

    /**
     * @var int
     */
    private $code;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param int $aid
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return int
     */
    public function getActiveNum()
    {
        return $this->activeNum;
    }

    /**
     * @param int $activeNum
     */
    public function setActiveNum($activeNum)
    {
        $this->activeNum = $activeNum;
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
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


    /**
     * @return int
     */
    public function getStar()
    {
        return $this->star;
    }

    /**
     * @param int $star
     */
    public function setStar($star)
    {
        $this->star = $star;
    }

    /**
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param float $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getHot()
    {
        return $this->hot;
    }

    /**
     * @param int $hot
     */
    public function setHot($hot)
    {
        $this->hot = $hot;
    }


    /**
     * @return int
     */
    public function getEffectNormal()
    {
        return $this->effectNormal;
    }

    /**
     * @param int $effectNormal
     */
    public function setEffectNormal($effectNormal)
    {
        $this->effectNormal = $effectNormal;
    }


    /**
     * @return int
     */
    public function getEffectVideo()
    {
        return $this->effectVideo;
    }

    /**
     * @param int $effectVideo
     */
    public function setEffectVideo($effectVideo)
    {
        $this->effectVideo = $effectVideo;
    }


    /**
     * @return string
     */
    public function getProviderName()
    {
        return $this->providerName;
    }

    /**
     * @param string $providerName
     */
    public function setProviderName($providerName)
    {
        $this->providerName = $providerName;
    }


    /**
     * @return int
     */
    public function getProvideId()
    {
        return $this->providerId;
    }

    /**
     * @param int  $providerId
     */
    public function setProvideId($providerId)
    {
        $this->providerId = $providerId;
    }


    /**
     * @return string
     */
    public function getProviderIcon()
    {
        return $this->providerIcon;
    }

    /**
     * @param string $providerIcon
     */
    public function setProviderIcon($providerIcon)
    {
        $this->providerIcon = $providerIcon;
    }


    /**
     * @return string
     */
    public function getProviderDesc()
    {
        return $this->providerDesc;
    }

    /**
     * @param string $providerDesc
     */
    public function setProviderDesc($providerDesc)
    {
        $this->providerDesc = $providerDesc;
    }


    /**
     * @return int
     */
    public function getUsageAll()
    {
        return $this->usageAll;
    }

    /**
     * @param int $usageAll
     */
    public function setUsageAll($usageAll)
    {
        $this->usageAll = $usageAll;
    }


    /**
     * @return int
     */
    public function getUsageCustomer()
    {
        return $this->usageCustomer;
    }

    /**
     * @param int $usageCustomer
     */
    public function setUsageCustomer($usageCustomer)
    {
        $this->usageAll = $usageCustomer;
    }

    /**
     * @return int
     */
    public function getUsageOwner()
    {
        return $this->usageOwner;
    }

    /**
     * @param int $usageOwner
     */
    public function setUsageOwner($usageOwner)
    {
        $this->usageOwner = $usageOwner;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }


}