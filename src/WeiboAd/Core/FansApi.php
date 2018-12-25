<?php

namespace WeiboAd\Core;

/**
 * Class FansApi
 * @package WeiboAd\Core
 */
class FansApi extends AbstractApi
{
    const URI_MAPPING = "/fans/mapping";
    const URI_PRICE   = "/fans/price";
    const URI_PRICE_ADVANCE  = "/fans/advance-price";
    const URI_PROMOTE_DATA  = "/fans/promote-data";
    const URI_REMAIN  = "/fans/remain";
    const URI_PROMOTE = '/fans/promote';
    const URI_ADVANCE = '/fans/advance';
    const URI_OFFLINE = '/fans/offline';


    /*映射信息
     * @param string $type
     * @return mixed
     */
    public function getMapping($type = "")
    {
        $url = self::URI_MAPPING;
        if ($type) {
            $url .= "?type=" . $type;
        }
        return $this->api->getApiRequest()->call($url, 'GET');
    }

    /*价格信息
     * @param $uid
     * @param $mid
     * @param string $fansTop
     * @param string $nonFans
     * @param string $trade
     * @param string $designate
     * @param string $cbd
     * @param string $target
     * @param $signature
     * @param $timestamp
     * @return mixed
     */
    public function getPrice($uid, $mid, $fansTop = "", $nonFans= "", $trade= "", $designate = "", $cbd = "", $target = "", $signature, $timestamp)
    {
        $url = self::URI_PRICE ."?uid=" . $uid . "&mid=" . $mid . "&signature=" . $signature . "&timestamp=" . $timestamp;
        if ($fansTop != "") {
            $url .= "&fanstop=" . $fansTop;
        }
        if ($nonFans != "") {
            $url .= "&nofans=" . $nonFans;
        }
        if ($trade != "") {
            $url .= "&trade=" . $trade;
        }
        if ($designate != "") {
            $url .= "&designate=" . $designate;
        }
        if ($cbd != "") {
            $url .= "&cbd=" . $cbd;
        }
        if ($target != "") {
            $url .= "&target=" . $target;
        }
        return $this->api->getApiRequest()->call($url, 'GET');
    }

    /*获取博文代投价格信息
     * @param $mid
     * @param $toUid
     * @return mixed
     */
    public function getAdvancePrice($uid, $mid, $toUid)
    {
        $url = self::URI_PRICE_ADVANCE . "?uid=" . $uid ."&mid=" . $mid . "&touid=" . $toUid;
        return $this->api->getApiRequest()->call($url, 'GET');
    }

    /*投放信息
     * @param $adId
     * @return mixed
     */
    public function getPromoteData($adId)
    {
        $url = self::URI_PROMOTE_DATA . "?adid=" . $adId;
        return $this->api->getApiRequest()->call($url, 'GET');
    }

    /*获取余量
     * @param $uid
     * @param $mid
     * @param string $fansTop
     * @param string $nonFans
     * @param string $trade
     * @param string $designate
     * @param string $cbd
     * @param $signature
     * @param $timestamp
     * @return mixed
     */
    public function getRemain($uid, $mid, $fansTop = "", $nonFans= "", $trade= "", $designate = "", $cbd = "", $signature, $timestamp)
    {
        $url = self::URI_REMAIN ."?uid=" . $uid . "&mid=" . $mid . "&signature=" . $signature. "&timestamp=" . $timestamp;
        if ($fansTop != "") {
            $url .= "&fanstop=" . $fansTop;
        }
        if ($nonFans != "") {
            $url .= "&nofans=" . $nonFans;
        }
        if ($trade != "") {
            $url .= "&trade=" . $trade;
        }
        if ($designate != "") {
            $url .= "&designate=" . $designate;
        }
        if ($cbd != "") {
            $url .= "&cbd=" . $cbd;
        }
        return $this->api->getApiRequest()->call($url, 'GET');
    }

    /*投放
     * @param $uid
     * @param $mid
     * @param string $adsUid
     * @param string $fansTop
     * @param string $nonFans
     * @param string $trade
     * @param string $designate
     * @param string $cbd
     * @param string $target
     * @return mixed
     */
    public function setPromote($uid, $mid, $adsUid = "", $fansTop = "", $nonFans= "", $trade= "", $designate = "", $cbd = "", $target = "")
    {
        $param = ["uid" => $uid,
                  "mid" => $mid];
        if ($adsUid != "") {
            $param['adsuid'] = $adsUid;
        }
        if ($fansTop != "") {
            $param['fanstop'] = $fansTop;
        }
        if ($nonFans != "") {
            $param['nonfans'] = $nonFans;
        }
        if ($trade != "") {
            $param['trade'] = $trade;
        }
        if ($designate != "") {
            $param['trade'] = $designate;
        }
        if ($cbd != "") {
            $param['cbd'] = $cbd;
        }
        if ($target != "") {
            $param['target'] = $target;
        }
        return $this->api->getApiRequest()->call(self::URI_PROMOTE, 'POST', $param);
    }


    /*代投
     * @param $uid
     * @param $mid
     * @param $toUid
     * @param string $adsUid
     * @param string $duration
     * @param string $sponsor
     * @return mixed
     */
    public function setAdvancePromote($uid, $mid, $toUid, $adsUid = "", $duration = "", $sponsor = "")
    {
        $param = ["uid" => $uid, "mid" => $mid, "touid" => $toUid];
        if ($adsUid != "") {
            $param['adsuid'] = $adsUid;
        }
        if ($adsUid != "") {
            $param['duration'] = $duration;
        }
        if ($adsUid != "") {
            $param['sponsor'] = $sponsor;
        }
        return $this->api->getApiRequest()->call(self::URI_ADVANCE, 'POST', $param);
    }


    /*下线投放
     * @param $adId
     * @return mixed
     */
    public function offline($adId)
    {
        return $this->api->getApiRequest()->call(self::URI_OFFLINE, 'POST', ['adid' => $adId]);
    }

}