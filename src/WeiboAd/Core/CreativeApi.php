<?php

namespace WeiboAd\Core;

use WeiboAd\Core\Entity\Creative;
use WeiboAd\Collection;

/**
 * Class CreativeApi
 * @package WeiboAd\Core
 */
class CreativeApi extends AbstractApi
{

    const URI_READING = "/creatives/info/%d";
    const URI_LIST    = "/creatives/search";
    const URI_CREATE  = "/creatives";
    const URI_UPDATE  = "/creatives/%d";
    const URI_DELETE  = "/creatives/%d";
    const URI_CREATE_TAG = '/tags';

    /**
     * @param $creativeId
     * @return Creative
     */
    public function read($creativeId)
    {
        $scheme = sprintf(self::URI_READING, $creativeId);
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        return new Creative($data);
    }

    /**
     * @param Creative $creative
     * @return Creative
     */
    public function create(Creative $creative)
    {
        if ($creative->getId()) {
            return $creative;
        }
        $postData = $this->entityToArray($creative);
        foreach ($postData as $k => $v) {
            if (is_array($v)) {
                $postData[$k] = json_encode($v);
            }
        }
        $data = $this->api->getApiRequest()->call(self::URI_CREATE, 'POST', $postData);
        return new Creative($data);
    }

    /**
     * @param Creative $creative
     * @return Creative
     */
    public function createWithMid(Creative $creative)
    {
        return $this->create($creative);
    }

    /**
     * @param $creativeId
     * @param $monitorType
     * @param $monitor
     * @param $commentOpen
     * @return Creative
     */
    public function update($creativeId, $monitorType, $monitor, $commentOpen)
    {
        $scheme = sprintf(self::URI_UPDATE, $creativeId);
        $putData = [
            'monitor_type' => $monitorType,
            'monitor'      => json_encode($monitor),
            'comment_open' => $commentOpen
        ];
        $data = $this->api->getApiRequest()->call($scheme, 'PUT',$putData);
        return new Creative($data);
    }

    /**
     * @param $creativeId
     * @param $status @see WeiboAd\Core\Constant\CreativeConfiguredStatus
     * @return mixed
     */
    public function updateStatus($creativeId, $status)
    {
        $scheme = sprintf(self::URI_UPDATE, $creativeId);
        $putData = ['update_status' => true, 'status' => $status];
        return $this->api->getApiRequest()->call($scheme, 'PUT',$putData);
    }


    /**
     * @param string $name
     * @param int $adId
     * @param int $page
     * @param int $pageSize
     * @return mixed
     */
    public function lists($name = '', $adId = 0, $page = 1, $pageSize = 10)
    {
        $scheme = self::URI_LIST . "?page=$page&page_size=$pageSize";
        if ($name) {
            $scheme .= "&name=$name";
        }
        if ($adId) {
            $scheme .= "&ad_id=$adId";
        }
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new Creative($value);;
            }
            $data['list'] = $collection;
        }
        return $data;
    }

    /**
     * @param $creativeId
     * @return mixed
     */
    public function delete($creativeId)
    {
        $scheme = sprintf(self::URI_DELETE, $creativeId);
        return $this->api->getApiRequest()->call($scheme, 'DELETE');
    }

    /**
     * @param array $photoUrl
     * @param array $photoTags
     * @param $tagDesc
     * @param $deepLink
     * @param string $appId
     * @return mixed
     */
    public function createTag(array $photoUrl, array $photoTags, $tagDesc, $deepLink, $appId = '')
    {
        $postData = [
            'photo_url'  => json_encode($photoUrl),
            'photo_tags' => json_encode($photoTags),
            'tag_desc'   => json_encode($tagDesc),
            'app_id'     => $appId,
            'deep_link'  => $deepLink,
        ];
        return $this->api->getApiRequest()->call(self::URI_CREATE_TAG, 'POST',$postData);
    }

}