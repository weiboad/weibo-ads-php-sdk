<?php

namespace WeiboAd\Core;

use WeiboAd\Collection;
use WeiboAd\Core\Entity\Message;

/**
 * Class MessageApi
 * @package WeiboAd\Core
 */
class MessageApi extends AbstractApi
{

    const URI_COUNT = "/messages/count";
    const URI_LIST = "/messages";
    const URI_READ = "/messages/read/%d";
    const URI_ALL_READ = "/messages/read";

    /*获取消息数量
     * @param $source
     * @param $startTime
     */

    public function count($source, $startTime = '')
    {
        $scheme = self::URI_COUNT . "?source=$source";
        if ($startTime) {
            $scheme .= "&start_time=$startTime";
        }
        return $this->api->getApiRequest()->call($scheme, 'GET');
    }

    /*获取消息列表
     * @param string $source
     * @param int $type
     * @param int $page
     * @param int $pageSize
     * @return mixed
     */
    public function lists($source, $type, $page = 1, $pageSize = 10)
    {
        $scheme = self::URI_LIST . "?source=$source&type=$type&page=$page&page_size=$pageSize";
        $data = $this->api->getApiRequest()->call($scheme, 'GET');
        if(isset($data['list'])) {
            $collection = new Collection();
            foreach ($data['list'] as $value) {
                $collection[] = new Message($value);;
            }
            $data['list'] = $collection;
        }

        return $data;
    }

    /*标记消息已读
    * @param $messagesId
    * @param $source
    * @return mixed
    */
    public function read($messagesId, $source)
    {
        $scheme = sprintf(self::URI_READ, $messagesId);
        $putData = ['source' => $source];
        return $this->api->getApiRequest()->call($scheme, 'PUT',$putData);
    }

    /*标记所有消息已读
   * @param $messagesId
   * @param $source
   * @return mixed
   */
    public function allRead($source)
    {
        $scheme = sprintf(self::URI_ALL_READ);
        $putData = ['source' => $source];
        return $this->api->getApiRequest()->call($scheme, 'PUT',$putData);
    }
}