<?php

namespace WeiboAd\Core;

use WeiboAd\Collection;
use WeiboAd\Core\Entity\Image;
use WeiboAd\Core\Entity\Video;


/**
 * Class VideoApi
 * @package WeiboAd\Core
 */
class VideoApi extends AbstractApi
{
    const URI_READING = "/video";
    const URI_LIST    = "/video/list";
    const URI_CREATE  = "/video";
    const URI_INIT  = "/video/init";
    const URI_SEGMENT  = "/video/segment";


    /**
     * @param $videoId
     * @param bool $isMD5
     * @return Video
     */
    public function read($videoId, $isMD5 = false)
    {
        $scheme = self::URI_READING . "?id=" . $videoId . "&is_md5=" . $isMD5;
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        return new Video($data);
    }

    /**
     * @param int $page
     * @param int $pageSize
     * @return mixed
     */
    public function lists($page = 1, $pageSize = 10)
    {
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
    public function upload($name, $fileMD5, $fileSize, $fileStream)
    {
        $multiData = [
            ['name' => 'video_name', 'contents' => $name],
            ['name' => 'file_md5', 'contents' => $fileMD5],
            ['name' => 'file_size', 'contents' => $fileSize],
            ['name' => 'file_content', 'contents' => $fileStream],
        ];
        $data =  $this->api->getApiRequest()->call(self::URI_CREATE, 'POST', [], $multiData);
        return new Video($data);
    }

    /*
     * 视频上传初始化
     * @param $name
     * @param $fileMD5
     * @param $fileSize
     * @return mixed
     */
    public function init($name, $fileMD5, $fileSize)
    {
        $multiData = [
            ['name' => 'video_name', 'contents' => $name],
            ['name' => 'file_md5', 'contents' => $fileMD5],
            ['name' => 'file_size', 'contents' => $fileSize],
        ];
        $data =  $this->api->getApiRequest()->call(self::URI_INIT, 'POST', [], $multiData);
        return $data;
    }

    /*
     * 视频分片上传
     * @param $fileToken
     * @param $fileMD5
     * @param $segmentSize
     * @param $length
     * @param $segmentMD5
     * @param $index
     * @param $file
     * @return mixed
     */
    public function segment($fileToken, $fileMD5, $segmentSize, $length, $segmentMD5, $index, $file)
    {
        $multiData = [
            ['name' => 'file_token', 'contents' => $fileToken],
            ['name' => 'file_md5', 'contents' => $fileMD5],
            ['name' => 'length', 'contents' => $length],
            ['name' => 'segment_size', 'contents' => $segmentSize],
            ['name' => 'segment_md5', 'contents' => $segmentMD5],
            ['name' => 'index', 'contents' => $index],
            ['name' => 'file', 'contents' => $file],
        ];
        $data =  $this->api->getApiRequest()->call(self::URI_SEGMENT, 'POST', [], $multiData);
        return $data;
    }
}