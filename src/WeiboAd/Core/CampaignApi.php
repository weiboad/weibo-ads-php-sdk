<?php

namespace WeiboAd\Core;

use WeiboAd\Collection;
use WeiboAd\Core\Entity\Campaign;

/**
 * Class CampaignApi
 * @package WeiboAd\Core
 */
class CampaignApi extends AbstractApi
{

    const URI_READING = "/campaigns/%d";
    const URI_LIST    = "/campaigns";
    const URI_CREATE  = "/campaigns";
    const URI_UPDATE  = "/campaigns/%d";
    const URI_DELETE  = "/campaigns/%d";
    const STATUS_UPDATE = "/campaigns/status/%d";

    /*读取单个广告系列
     * @param $campaignId
     * @return Campaign
     */

    public function read($campaignId)
    {
        $scheme = sprintf(self::URI_READING, $campaignId);
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        return new Campaign($data);
    }

    /*广告系列列表
     * @param string $name
     * @param int $objective   @see WeiboAd\Core\Constant\MarketingObjective
     * @param int $budget
     * @param bool $isReserved
     * @param int $page
     * @param int $pageSize
     * @return mixed
     */
    public function lists($name = '', $objective = 0, $budget = 0, $isReserved = false, $page = 1, $pageSize = 10)
    {
        $scheme = self::URI_LIST . "?page=$page&page_size=$pageSize";
        if ($name) {
            $scheme .= "&name=$name";
        }
        if ($objective) {
            $scheme .= "&objective=$objective";
        }
        if ($budget) {
            $scheme .= "&lifetime_budget=$budget";
        }
        if ($isReserved) {
            $scheme .= "&guaranteed_delivery=" .boolval($isReserved);
        }

        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new Campaign($value);;
            }
            $data['list'] = $collection;
        }

        return $data;
    }


    /*创建广告系列
     * @param Campaign $campaign
     * @return Campaign
     */
    public function create(Campaign $campaign)
    {
        if ($campaign->getId()) {
            return $this->update($campaign);
        }
        $postData = $this->entityToArray($campaign);
        $data = $this->api->getApiRequest()->call(self::URI_CREATE, 'POST', $postData);
        return new Campaign($data);
    }

    /*
     *更新状态
     * @param $campaignId
     * @param $status  @see WeiboAd\Core\Constant\ConfiguredStatus
     *
     * @return Campaign
     */
    public function updateStatus($campaignId, $status)
    {
        $scheme = sprintf(self::STATUS_UPDATE, $campaignId);
        $putData = ['update_status' => true, 'status' => $status];
        //var_dump($putData);
        $data = $this->api->getApiRequest()->call($scheme, 'PUT', $putData);
        return new Campaign($data);
    }

    /*修改广告系列
     * @param Campaign $campaign
     * @return Campaign
     */
    public function update(Campaign $campaign)
    {
        $scheme = sprintf(self::URI_UPDATE, $campaign->getId());
        $putData = $this->entityToArray($campaign);
        foreach ($putData as $k => $v) {
            if (is_array($v)) {
                if (empty($v)) {
                    unset($putData[$k]);
                }
                $putData[$k] = json_encode($v);
            }
        }
        $data = $this->api->getApiRequest()->call($scheme, 'PUT', $putData);
        return new Campaign($data);
    }

    /*删除广告系列
     * @param $campaignId
     * @return Campaign
     */
    public function delete($campaignId)
    {
        $scheme = sprintf(self::URI_DELETE, $campaignId);
        return  $this->api->getApiRequest()->call($scheme, 'DELETE');
    }

}
