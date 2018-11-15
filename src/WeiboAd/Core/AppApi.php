<?php

namespace WeiboAd\Core;

use WeiboAd\Collection;
use WeiboAd\Core\Entity\App;


/**
 * Class AppApi
 * @package WeiboAd\Core
 */
class AppApi extends AbstractApi
{
    const URI_LIST      = "/apps";
    const URI_UPLOAD    = "/app";
    const URI_ADD       = "/app/insert";
    const URI_CATEGORY  = "/apps/category";


    /*应用列表
     * @param string $name
     * @param int $status
     * @param int $page
     * @param int $pageSize
     * @return mixed
     */
    public function lists($name = '', $status = 0, $page = 1, $pageSize = 10)
    {
        $scheme = self::URI_LIST . "?page=$page&page_size=$pageSize";
        if ($name) {
            $scheme .= "&name=$name";
        }
        if ($name) {
            $scheme .= "&name=$name";
        }
        if ($status) {
            $scheme .= "&status=$status";
        }

        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new App($value);;
            }
            $data['list'] = $collection;
        }
        return $data;
    }

    /*应用市场分类
     * @return mixed
     */
    public function category()
    {
        return $this->api->getApiRequest()->call(self::URI_CATEGORY, 'GET');
    }


    /**
     * @param $appType
     * @param string $iosUrl
     * @param string $androidUrl
     * @return mixed
     */
    public function upload($appType, $iosUrl = "", $androidUrl = "")
    {
        $postData = ['app_type' => $appType, 'ios_url' => $iosUrl, 'android_url' => $androidUrl];
        return $this->api->getApiRequest()->call(self::URI_UPLOAD, 'POST', $postData);
    }

    /**
     * @param $name
     * @param $cate
     * @param $subCate
     * @param $developer
     * @param $packageName
     * @param $icon
     * @param $image
     * @param $description
     * @param $updateInfo
     * @return mixed
     */
    public function add($name, $cate, $subCate, $developer, $packageName, $icon, $image, $description, $updateInfo)
    {
        $postData = [
            'name' => $name,
            'cate' => $cate,
            'sub_ate' => $subCate,
            'developer' => $developer,
            'package_name' => $packageName,
            'icon' => $icon,
            'image' => $image,
            'description' => $description,
            'update_info' => $updateInfo

        ];
        return $this->api->getApiRequest()->call(self::URI_ADD, 'POST', $postData);
    }
}