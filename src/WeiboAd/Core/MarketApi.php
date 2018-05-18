<?php

namespace WeiboAd\Core;

use WeiboAd\Core\Entity\Market;
use WeiboAd\Collection;


/**
 * Class MarketApi
 * @package WeiboAd\Core
 */
class MarketApi extends AbstractApi
{

    const URI_LIST = "/market/list";
    const URI_INFO = "/market/info/%d";
    const URI_DATA = "/market/industry_data";

    /**
     *获取数据市场数据包列表
     * @param $type
     * @return mixed
     */
    public function readList($type)
    {
        $scheme = sprintf(self::URI_LIST. "?type=" . $type);
        $data =  $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new Market($value);
            }
            $data['list'] = $collection;
        }
        return $data;
    }
    /*获取数据市场数据包信息
     *@param $id
     * @return Market
     * */
    public  function info($id)
    {
        $scheme = sprintf(self::URI_INFO, $id);
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        return new Market($data);
    }

    /**获取数据市场数据包行业报表
     * @param $id, $type
     * @param int $page
     * @param int $pageSize
     * @return mixed
     *
     */
    public function data($id, $type, $page = 1, $pageSize = 6)
    {
        $scheme = self::URI_DATA . "?page=$page&page_size=$pageSize";
        if ($id) {
            $scheme .= "&id=$id";
        }
        if ($type) {
            $scheme .= "&type=$type";
        }
        $data =  $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new Market($value);
            }
            $data['list'] = $collection;
        }
        return $data;
    }
    
}
