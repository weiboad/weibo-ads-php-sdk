<?php

namespace WeiboAd\Core;

use WeiboAd\Collection;
use WeiboAd\Core\Entity\ADs;
use WeiboAd\Exception\InvalidArgumentException;

/**
 * Class ADsApi
 * @package WeiboAd\Core
 */
class ADsApi extends AbstractApi
{

    const URI_READING = "/ads/info/%d";
    const URI_LIST    = "/ads/search";
    const URI_CREATE  = "/ads";
    const URI_UPDATE  = "/ads/%d";
    const URI_DELETE  = "/ads/%d";
    const URI_TOPIC   = "/ads/topic";
    const URI_DESIGNATED_ACCOUNT   = "/ads/designated-account";
    const URI_MID     = "/ads/mid";
    const URI_UPDATE_STATUS  = "/ads/updatestatus";
    const URI_TARGET_MAP        = "/ads/targetmap";
    const URI_GUARANTEE         = "/ads/guarantee";
    const URI_GUARANTEE_PRICE   = "/ads/guarantee/price";
    const URI_GUARANTEE_PRICE_RELEASE  = "/ads/guarantee/price-release";

    /**
     * @param $id
     * @return ADs
     */
    public function read($id)
    {
        $scheme = sprintf(self::URI_READING, $id);
        $data =  $this->api->getApiRequest()->call($scheme, 'GET');
        return new ADs($data);
    }

    /**
     * @param string $name
     * @param int $campaignId
     * @param int $objective
     * @param bool $isReserved
     * @param int $page
     * @param int $pageSize
     * @return mixed
     */
    public function lists($name = '', $campaignId = 0, $objective = 0, $isReserved = false, $page = 1, $pageSize = 10)
    {
        $scheme = self::URI_LIST . "?page=$page&page_size=$pageSize";
        if ($name) {
            $scheme .= "&name=$name";
        }
        if ($campaignId) {
            $scheme .= "&campaign_id=$campaignId";
        }
        if ($objective) {
            $scheme .= "&objective=$objective";
        }
        if ($isReserved) {
            $scheme .= "&guaranteed_delivery=" .boolval($isReserved);
        }

        $data =  $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new ADs($value);
            }
            $data['list'] = $collection;
        }
        return $data;
    }

    /**
     * @param ADs $ads
     * @return ADs
     */
    public function create(ADs $ads)
    {
        if ($ads->getId()) {

            return $this->update($ads);
        }
        $postData = $this->entityToArray($ads);
        foreach ($postData as $k => $v) {
            if (is_array($v)) {
                $postData[$k] = json_encode($v);
            }
        }
        $data =  $this->api->getApiRequest()->call(self::URI_CREATE, 'POST', $postData);
        return new ADs($data);
    }

    /**
     * @param ADs $ads
     * @return ADs
     */
    public function update(ADs $ads)
    {
        $scheme = sprintf(self::URI_UPDATE, $ads->getId());
        $putData = $this->entityToArray($ads);
        foreach ($putData as $k => $v) {
            if (is_array($v)) {
                if (empty($v)) {
                    unset($putData[$k]);
                }
                $putData[$k] = json_encode($v);
            }
        }
        $data = $this->api->getApiRequest()->call($scheme, 'PUT', $putData);
        return new ADs($data);
    }


    /**
     *
     * @param $adId
     * @param $status  @see WeiboAd\Core\Constant\ConfiguredStatus
     *
     * @return ADs
     */
    public function updateStatus($adId, $status)
    {
        $scheme = self::URI_UPDATE_STATUS;
        $putData = ['configured_status' => $status, 'id' => $adId];
        $data = $this->api->getApiRequest()->call($scheme, 'POST',$putData);
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new ADs($value);
            }
            $data['list'] = $collection;
        }
        return $data;
    }

    /**
     * @param $adId
     * @return mixed
     */
    public function delete($adId)
    {
        $scheme = sprintf(self::URI_DELETE, $adId);
        return  $this->api->getApiRequest()->call($scheme, 'DELETE');
    }

    /**
     * @param array $target
     * @return mixed
     */
    public function targetMap(array $target = [])
    {
        if (!empty($target)) {
            $scheme = self::URI_TARGET_MAP . "?target=" . json_encode($target);
        } else {
            $scheme = self::URI_TARGET_MAP;
        }
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /**
     * @param $ageMin
     * @param $ageMax
     * @param $gender
     * @param array $locations
     * @param array $interests
     * @param array $os
     * @return mixed
     */
    public function guarantee($ageMin, $ageMax, $gender, array $locations = [], $interests = [], $os = [])
    {
        $params = ['age_min' => $ageMin, 'age_max' => $ageMax, 'genders' => $gender];
        if ($locations) {
            $params['geo_locations'] = $locations;
        }
        if ($interests) {
            $params['category_interests'] = $interests;
        }
        if ($os) {
            $params['user_os'] = $os;
        }
        $scheme = self::URI_GUARANTEE . "?targeting=" . json_encode($params);
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /**
     * @param $ageMin
     * @param $ageMax
     * @param $gender
     * @param array $locations
     * @param array $interests
     * @param array $os
     * @return mixed
     */
    public function getGuaranteePrice($ageMin, $ageMax, $gender, array $locations = [], $interests = [], $os = [])
    {
        $params = ['age_min' => $ageMin, 'age_max' => $ageMax, 'genders' => $gender];
        if ($locations) {
            $params['geo_locations'] = $locations;
        }
        if ($interests) {
            $params['category_interests'] = $interests;
        }
        if ($os) {
            $params['user_os'] = $os;
        }
        $scheme = self::URI_GUARANTEE_PRICE . "?targeting=" . json_encode($params);
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /**
     * @param $adId
     * @param array $scheduleIds
     * @return mixed
     */
    public function getGuaranteeReleasePrice($adId, array $scheduleIds) {
        $scheme = self::URI_GUARANTEE_PRICE_RELEASE . "?release_list=" . json_encode($scheduleIds) . "&id=" . $adId;
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /**
     * @param string $keyword
     * @return mixed
     */
    public function getTopic($keyword = "")
    {
        $scheme = self::URI_TOPIC;
        if ($keyword) {
            $scheme .= "?keyword=" . $keyword;
        }
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /**
     * @param $url
     * @return mixed
     */
    public function getMid($url)
    {
        if (!$url) {
            throw new InvalidArgumentException();
        }
        $scheme = self::URI_MID;
        $scheme .= "?url=" . $url;
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /**
     * @param string $keyword
     * @return mixed
     *
     */
    public function getDesignatedAccount($keyword = "")
    {
        $scheme = self::URI_DESIGNATED_ACCOUNT;
        if ($keyword) {
            $scheme .= "?keyword=" . $keyword;
        }
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

 }