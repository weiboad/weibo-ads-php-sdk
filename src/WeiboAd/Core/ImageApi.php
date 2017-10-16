<?php

namespace WeiboAd\Core;

use WeiboAd\Collection;
use WeiboAd\Core\Entity\Image;


/**
 * Class ImageApi
 * @package WeiboAd\Core
 */
class ImageApi extends AbstractApi
{
    const URI_READING = "/image";
    const URI_LIST    = "/image/list";
    const URI_CREATE  = "/image";


    /**
     * @param $picId
     * @return Image
     */
    public function read($picId) {
        $scheme = self::URI_READING . "?pic_id=" . $picId;
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        return new Image($data);
    }

    /**
     * @param int $page
     * @param int $pageSize
     * @return mixed
     */
    public function lists($page = 1, $pageSize = 10) {
        $scheme = self::URI_LIST . "?page=$page&page_size=$pageSize";
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new Image($value);;
            }
            $data['list'] = $collection;
        }
        return $data;
    }

    /**
     * @param $name
     *
     * get the handler with fopen function
     * @param $fileStream
     * @return Image
     */
    public function upload($name, $fileStream) {
        $multiData = [
            ['name' => 'image_name', 'contents' => $name],
            ['name' => 'image', 'contents' => $fileStream],
        ];
        $data = $this->api->getApiRequest()->call(self::URI_CREATE, 'POST', [], $multiData);
        return new Image($data);
    }
}