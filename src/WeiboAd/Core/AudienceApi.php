<?php

namespace WeiboAd\Core;

use WeiboAd\Core\Entity\Audience;
use WeiboAd\Collection;

/**
 * Class AudienceApi
 * @package WeiboAd\Core
 */
class AudienceApi extends AbstractApi
{

    const URI_READING = "/audiences/info/%d";
    const URI_LIST    = "/audiences/list";
    const URI_CREATE  = "/audiences";
    const URI_UPLOAD  = "/audiences/upload";
    const URI_DELETE  = "/audiences";
    const URI_SET_COVERAGE = '/audiences/set_coverage';

    /**
     * @param $name
     * @param $dataSource
     * @param $fileId
     * @param $dataFormat
     * @param string $packageId
     * @param string $mids
     * @return Audience
     */
    public function create($name, $dataSource, $fileId, $dataFormat, $packageId = '', $mids = '')
    {
        $postData = [
            'name'          => $name,
            'data_source'   => $dataSource,
            'file_id'       => $fileId,
            'data_format'   => $dataFormat,
            'package_id'    => $packageId,
            'mids'          => $mids
        ];
        $data =  $this->api->getApiRequest()->call(self::URI_CREATE, 'POST', $postData);
        return new Audience($data);
    }

    /**
     * @param $dataFormat
     * @param $fileStream
     * @param $isMd5
     * @return mixed
     */
    public function upload($dataFormat, $fileStream, $isMd5)
    {
        $multiData = [
            ['name' => 'data_format', 'contents' => $dataFormat],
            ['name' => 'is_md5', 'contents' => $isMd5],
            ['name' => 'package', 'contents' => $fileStream],
        ];
        return $this->api->getApiRequest()->call(self::URI_UPLOAD, 'POST', [], $multiData);
    }

    /**
     * @param $audienceId
     * @return Audience
     */
    public function read($audienceId)
    {
        $scheme = sprintf(self::URI_READING, $audienceId);
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        return new Audience($data);
    }

    /**
     * @param string $name
     * @param string $status
     * @param string $dataSource
     * @param int $page
     * @param int $pageSize
     * @return mixed
     */
    public function lists($name = '', $status = '', $dataSource = '', $page = 1, $pageSize = 10)
    {
        $scheme = self::URI_LIST . "?page=$page&page_size=$pageSize";
        if ($name) {
            $scheme .= "&name=$name";
        }
        if ($status !== '') {
            $scheme .= "&status=$status";
        }
        if ($dataSource !== '') {
            $scheme .= "&data_source=$dataSource";
        }

        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new Audience($value);
            }
            $data['list'] = $collection;
        }
        return $data;
    }

    /**
     * @param $audienceId
     * @return mixed
     */
    public function delete($audienceId)
    {
        $scheme = self::URI_DELETE . "?id=" . $audienceId;
        return $this->api->getApiRequest()->call($scheme, 'DELETE');
    }

    /**
     * @param $id
     * @param $lookAlikeId
     * @param $name
     * @param $audiencesSize
     * @return Audience
     */
    public function setCoverage($id, $lookAlikeId, $name, $audiencesSize)
    {
        $postData = [
            'id'          => $id,
            'look_alike_id'   => $lookAlikeId,
            'name'       => $name,
            'audiences_size'   => $audiencesSize,
        ];
        $data = $this->api->getApiRequest()->call(self::URI_SET_COVERAGE, 'POST', $postData);
        return new Audience($data);
    }

}