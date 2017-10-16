<?php

namespace WeiboAd\Core;

use WeiboAd\Collection;
use WeiboAd\Core\Entity\Image;
use WeiboAd\Core\Entity\Video;


/**
 * Class ImageApi
 * @package WeiboAd\Core
 */
class VideoApi extends AbstractApi
{
    const URI_READING = "/video";
    const URI_LIST    = "/video/list";
    const URI_CREATE  = "/video";


    /**
     * @param $videoId
     * @param bool $isMD5
     * @return Video
     */
    public function read($videoId, $isMD5 = false) {
        $scheme = self::URI_READING . "?id=" . $videoId . "&is_md5=" . $isMD5;
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        return new Video($data);
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
                $collection[] = new Video($value);;
            }
            $data['list'] = $collection;
        }
        return $data;
    }

    /**
     * @param $name
     * @param $fileMD5
     * @param $fileSize
     *
     * get the handler with fopen function
     * @param $fileStream
     * @return Video
     */
    public function upload($name, $fileMD5, $fileSize, $fileStream) {
        $multiData = [
            ['name' => 'video_name', 'contents' => $name],
            ['name' => 'file_md5', 'contents' => $fileMD5],
            ['name' => 'file_size', 'contents' => $fileSize],
            ['name' => 'file_content', 'contents' => $fileStream],
        ];
        $data =  $this->api->getApiRequest()->call(self::URI_CREATE, 'POST', [], $multiData);
        return new Video($data);
    }
}