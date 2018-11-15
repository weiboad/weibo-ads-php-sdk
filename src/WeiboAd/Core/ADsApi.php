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

    const URI_READING = "/ads/%d";
    const URI_LIST    = "/ads";
    const URI_CREATE  = "/ads";
    const URI_UPDATE  = "/ads/%d";
    const URI_DELETE  = "/ads/%d";
    const URI_TOPIC   = "/ads/topic-search";
    const URI_DESIGNATED_ACCOUNT   = "/ads/designated-account";
    const URI_MID     = "/ads/mid";
    const URI_UPDATE_STATUS  = "/ads/status";
    const URI_TARGET_MAP        = "/ads/targetmap";
    const URI_GUARANTEE         = "/ads/guarantee";
    const URI_GUARANTEE_PRICE   = "/ads/guarantee/price";
    const URI_GUARANTEE_PRICE_RELEASE  = "/ads/guarantee/price-release";
    const URI_COVERAGE = "/ads/coverage";
    const URI_ACCURATE_INTEREST = "/ads/accurate-interest";
    const URI_SIMILAR_ACCOUNT = "/ads/similar-account";
    const URI_TOPIC_RECOMMEND = "/ads/topic-recommend";

    /*读取单条广告计划
     * @param $id
     * @return ADs
     */
    public function read($id)
    {
        $scheme = sprintf(self::URI_READING, $id);
        $data =  $this->api->getApiRequest()->call($scheme, 'GET');
        return new ADs($data);
    }

    /*广告计划列表
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

    /*广告计划创建
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

    /*广告计划修改
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


    /*
     *广告计划修改状态
     * @param $adId
     * @param $status  @see WeiboAd\Core\Constant\ConfiguredStatus
     *
     * @return ADs
     */
    public function updateStatus($adId, $status)
    {
        $scheme = self::URI_UPDATE_STATUS;
        $putData = ['configured_status' => $status, 'id' => $adId];
        $data = $this->api->getApiRequest()->call($scheme, 'PUT',$putData);
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new ADs($value);
            }
            $data['list'] = $collection;
        }
        return $data;
    }

    /*广告计划删除
     * @param $adId
     * @return mixed
     */
    public function delete($adId)
    {
        $scheme = sprintf(self::URI_DELETE, $adId);
        return  $this->api->getApiRequest()->call($scheme, 'DELETE');
    }

    /*广告计划定向条件码表
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

    /*定价保量可预定量
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

    /*获取定价保量预定费用
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

    /*获取定价保量释放费用
     * @param $adId
     * @param array $scheduleIds
     * @return mixed
     */
    public function getGuaranteeReleasePrice($adId, array $scheduleIds) {
        $scheme = self::URI_GUARANTEE_PRICE_RELEASE . "?release_list=" . json_encode($scheduleIds) . "&id=" . $adId;
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /*话题搜索
     * @param string $keyword
     * @return mixed
     */
    public function getTopicSearch($keyword = "")
    {
        $scheme = self::URI_TOPIC;
        if ($keyword) {
            $scheme .= "?keyword=" . $keyword;
        }
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /*通过微博url获取mid
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

    /*获取指定账号推荐信息
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

    /*
     * 获取人群覆盖
     * @param string $targeting , int $objective, int $billingType
     */
    public function getCoverage($ageMin, $ageMax, $gender, $objective, $billingType)
    {
        $params = ['age_min' => $ageMin, 'age_max' => $ageMax, 'genders' => $gender];
        $scheme = self::URI_COVERAGE . "?objective=" . $objective . "&billing_type=" . $billingType ."&targeting="  . json_encode($params) ;
        return $this->api->getApiRequest()->call($scheme, 'GET');

    }

    /*获取精准兴趣信息
     *
     */
    public function getAccurateInterest()
    {
        $scheme = sprintf(self::URI_ACCURATE_INTEREST);
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /*
     * 相似账号推荐信息
     */
    public function getSimilarAccount($customerId)
    {
        $scheme = self::URI_SIMILAR_ACCOUNT . "?customer_id=" . $customerId;
        return  $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /*
     * 话题推荐
     */
    public function getTopicRecommend()
    {
        $scheme = sprintf(self::URI_TOPIC_RECOMMEND);
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

 }