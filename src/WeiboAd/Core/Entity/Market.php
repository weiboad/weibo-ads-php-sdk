<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Market
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
     * @var Effect
     */
    private $effect;

    /**
     * @var Provider
     */
    private $provider;

    /**
     * @var Usage
     */
    private $usage;


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
     * @return Effect
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * @param mixed $effect
     */
    public function setEffect($effect)
    {
        if ($effect instanceof Effect) {
            $this->effect = $effect;
        } elseif (is_array($effect)) {
            $this->effect = new Effect($effect);
        }
    }


    /**
     * @return Provider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param mixed $provider
     */
    public function setProvider($provider)
    {
        if ($provider instanceof Provider) {
            $this->provider = $provider;
        } elseif (is_array($provider)) {
            $this->provider = new Provider($provider);
        }
    }


    /**
     * @return Usage
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param mixed $usage
     */
    public function setUsage($usage)
    {
        if ($usage instanceof Usage) {
            $this->usage = $usage;
        } elseif (is_array($usage)) {
            $this->usage = new Usage($usage);
        }
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