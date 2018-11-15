<?php

namespace WeiboAd\Core;

use WeiboAd\Core\Entity\Licenses;
use WeiboAd\Collection;

/**
 * Class LicensesApi
 * @package WeiboAd\Core
 */
class LicensesApi extends AbstractApi
{
    const URI_LIST = "/licenses";
    const URI_READING = "/licenses/%d";

    /*资质列表
     * @param string $name
     * @param string $status
     * @param int $page
     * @param int $pageSize
     * @return mixed
     */
    public function lists($name = '', $status = '', $page = 1, $pageSize = 20)
    {
        $scheme = self::URI_LIST . "?page=$page&page_size=$pageSize";
        if ($name) {
            $scheme .= "&name=$name";
        }
        if ($status !== '') {
            $scheme .= "&status=$status";
        }


        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new Licenses($value);
            }
            $data['list'] = $collection;
        }
        return $data;
    }


    /*读取资质
     * @param $licensesId
     * @return Licenses
     */
    public function read($licensesId)
    {
        $scheme = sprintf(self::URI_READING, $licensesId);
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        return new Licenses($data);
    }
}