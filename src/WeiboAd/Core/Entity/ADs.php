<?php

namespace WeiboAd\Core\Entity;

use WeiboAd\Collection;

/**
 * Class ADS
 * @package WeiboAd\Core\Entity
 */
class ADs extends AbstractEntity
{

    /**
     * @var int
     */
    private $id;

    /**
     *
     * @var float
     */
    private $bidAmount;

    /**
     * @var int
     */
    private $billingType;

    /**
     * @var int
     */
    private $campaignId;

    /**
     * @var Campaign;
     */
    private $campaign;

    /**
     * @var int
     */
    private $configuredStatus;

    /**
     * @var int
     */
    private $effectiveStatus;

    /**
     * @var Collection
     */
    private $creative;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var float
     */
    private $dailyBudget;

    /**
     * @var ADSchedule
     */
    private $deliverySchedule = [];

    /**
     * @var int
     */
    private $deliverySpeed;

    /**
     * @var int
     */
    private $deliveryType;

    /**
     * @var int
     */
    private $guaranteedDelivery;

    /**
     * @var int
     */
    private $isAutobid;

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
    private $optimizationGoal;

    /**
     * @var float
     */
    private $reverseDailyBudget;

    /**
     * @var Targeting
     */
    private $targeting;

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
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * @param int $campaignId
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;
    }


    /**
     * @return float
     */
    public function getBidAmount()
    {
        return $this->bidAmount;
    }

    /**
     * @param float $bidAmount
     */
    public function setBidAmount($bidAmount)
    {
        $this->bidAmount = $bidAmount;
    }

    /**
     * @return int
     */
    public function getBillingType()
    {
        return $this->billingType;
    }

    /**
     * @param int $billingType
     */
    public function setBillingType($billingType)
    {
        $this->billingType = $billingType;
    }

    /**
     * @return Campaign
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @param  mixed $campaign
     */
    public function setCampaign($campaign)
    {
        if (is_array($campaign)) {
            $this->campaign = new Campaign($campaign);
        } elseif ($campaign instanceof Campaign) {
            $this->campaign = $campaign;
        }

    }

    /**
     * @return Collection
     */
    public function getCreative()
    {
        return $this->creative;
    }

    /**
     * @param  mixed $creative
     */
    public function setCreative($creative)
    {
        if ($creative instanceof Collection) {
            $this->creative = $creative;
        } elseif (is_array($creative)) {
            $collection = new Collection();
            foreach ($creative as $v) {
                if (is_array($v)) {
                    $collection[] = new Creative($v);
                }
            }
            $this->creative = $collection;
        }
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
     * @return float
     */
    public function getDailyBudget()
    {
        return $this->dailyBudget;
    }

    /**
     * @param float $dailyBudget
     */
    public function setDailyBudget($dailyBudget)
    {
        $this->dailyBudget = $dailyBudget;
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
     * @return ADSchedule
     */
    public function getDeliverySchedule()
    {
        return $this->deliverySchedule;
    }

    /**
     * @param ADSchedule $deliverySchedule
     */
    public function setDeliverySchedule($deliverySchedule)
    {
        if (is_array($deliverySchedule)) {
            $collection = new Collection();
            foreach ($deliverySchedule as $v) {
                if (is_array($v)) {
                    $collection[] = new ADSchedule($v);
                }
            }
            $this->deliverySchedule = $collection;
        } else {
            $this->deliverySchedule = $deliverySchedule;
        }

    }

    /**
     * @return int
     */
    public function getDeliverySpeed()
    {
        return $this->deliverySpeed;
    }

    /**
     * @param int $deliverySpeed
     */
    public function setDeliverySpeed($deliverySpeed)
    {
        $this->deliverySpeed = $deliverySpeed;
    }

    /**
     * @return int
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * @param int $deliveryType
     */
    public function setDeliveryType($deliveryType)
    {
        $this->deliveryType = $deliveryType;
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
    public function getIsAutobid()
    {
        return $this->isAutobid;
    }

    /**
     * @param int $isAutobid
     */
    public function setIsAutobid($isAutobid)
    {
        $this->isAutobid = $isAutobid;
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
    public function getOptimizationGoal()
    {
        return $this->optimizationGoal;
    }

    /**
     * @param int $optimizationGoal
     */
    public function setOptimizationGoal($optimizationGoal)
    {
        $this->optimizationGoal = $optimizationGoal;
    }

    /**
     * @return float
     */
    public function getReverseDailyBudget()
    {
        return $this->reverseDailyBudget;
    }

    /**
     * @param float $reverseDailyBudget
     */
    public function setReverseDailyBudget($reverseDailyBudget)
    {
        $this->reverseDailyBudget = $reverseDailyBudget;
    }

    /**
     * @return Targeting
     */
    public function getTargeting()
    {
        return $this->targeting;
    }

    /**
     * @param Targeting $targeting
     */
    public function setTargeting($targeting)
    {
        if (is_array($targeting)) {
            $this->targeting = new Targeting($targeting);
        } else {
            $this->targeting = $targeting;
        }
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