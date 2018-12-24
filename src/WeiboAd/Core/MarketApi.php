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

    const URI_DATA = "/data";
    const URI_INFO = "/data/%d";
    const URI_INDUSTRY = "/data/industry/%d";
    const URI_EXTENSION = "/data/extension";
    const URI_CALCULATE = "/data/calculate";
    const URI_CALCULATION = "/data/calculation";
    const URI_CUSTOM = "/data/custom";

    /*
     *数据市场数据包列表
     * @param $type
     * @return mixed
     */
    public function data($type)
    {
        $scheme = self::URI_DATA . "?type=$type";
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
    /*数据市场数据包信息
     *@param $id
     * @return Market
     * */
    public  function info($id, $type)
    {
        $scheme = sprintf(self::URI_INFO, $id);
        if ($type) {
            $scheme .= "?type=$type";
        }

        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        return new Market($data);
    }

    /*数据市场数据包行业报表
     * @param $id, $type
     * @param int $page
     * @param int $pageSize
     * @return mixed
     *
     */
    public function industry($id, $type = '', $sort = 1 , $page = 1 , $pageSize = 6  )
    {
        $scheme = sprintf(self::URI_INDUSTRY ."?page=$page&page_size=$pageSize", $id);
        if ($type) {
            $scheme .= "&type=$type";
        }
        if ($sort) {
            $scheme .= "&sort=$sort";
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

    /*扩展创建数据包
     * @param $marketPacketId
     * @param $multiple
     * @param $packName
     * @param $packDesc
     * @return Market
     */
    public function extension($marketPacketId, $multiple, $packName, $packDesc)
    {
        $postData = [
            'market_packet_id'    => $marketPacketId,
            'multiple'   => $multiple,
            'pack_name'       => $packName,
            'pack_desc'   => $packDesc,
        ];
        return  $this->api->getApiRequest()->call(self::URI_EXTENSION, 'POST', $postData);
    }


    /*运算创建数据包
     * @param $marketPacketId
     * @param $commissionPacketId
     * @param $calculationType
     * @param $packName
     * @param $packDesc
     * @return Market
     */
    public function calculate($marketPacketId, $commissionPacketId, $calculationType, $packName, $packDesc)
    {
        $postData = [
            'market_packet_id'    => $marketPacketId,
            'commission_packet_id'   => $commissionPacketId,
            'calculation_type' => $calculationType,
            'pack_name'       => $packName,
            'pack_desc'   => $packDesc,
        ];
        return  $this->api->getApiRequest()->call(self::URI_CALCULATE, 'POST', $postData);
    }


    /*运算数据包列表
     * @param int $supplierId
     * @param string $name
     * @param int $sort
     * @param int $sortType
     * @param int $page
     * @param int $pageSize
     * @param int $packMixedType
     * @return mixed
     */
    public function calculation($supplierId = '', $name = '', $sort = '', $sortType = '', $page = 1, $pageSize = 6, $packMixedType = '')
    {
        $scheme = self::URI_CALCULATION . "?page=$page&page_size=$pageSize";
        if ($supplierId) {
            $scheme .= "&supplier_id=$supplierId";
        }
        if ($name) {
            $scheme .= "&name=$name";
        }
        if ($sort !== '') {
            $scheme .= "&sort=$sort";
        }
        if ($sortType !== '') {
            $scheme .= "&sort_type=$sortType";
        }
        if ($packMixedType !== '') {
            $scheme .= "&pack_mixed_type=$packMixedType";
        }

        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new Market($value);
            }
            $data['list'] = $collection;
        }
        return $data;
    }


    /*自定义数据包列表
    * @param string $name
    * @param int $sort
    * @param int $sortType
    * @param int $page
    * @param int $pageSize
    * @param int $dataSource
    * @return mixed
    */
    public function custom($page , $pageSize , $name = '', $sort = '', $sortType = '', $dataSource = '')
    {
        $scheme = self::URI_CUSTOM . "?page=$page&page_size=$pageSize";
        if ($name) {
            $scheme .= "&name=$name";
        }
        if ($sort !== '') {
            $scheme .= "&sort=$sort";
        }
        if ($sortType !== '') {
            $scheme .= "&sort_type=$sortType";
        }
        if ($dataSource !== '') {
            $scheme .= "&data_source=$dataSource";
        }

        $data = $this->api->getApiRequest()->call($scheme, 'GET');
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
