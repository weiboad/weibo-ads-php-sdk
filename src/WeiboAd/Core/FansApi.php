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
    const URI_PRICE_ADVANCE  = "/fans/advance_price";
    const URI_PROMOTE_DATA  = "/fans/promote_data";
    const URI_REMAIN  = "/fans/remain";
    const URI_PROMOTE = '/fans/promote';
    const URI_ADVANCE = '/fans/advance';
    const URI_OFFLINE = '/fans/offline';


    /**
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

    /**
     * @param $mid
     * @param string $fansTop
     * @param string $nonFans
     * @param string $trade
     * @param string $designate
     * @param string $cbd
     * @param string $target
     * @return mixed
     */
    public function getPrice($mid, $fansTop = "", $nonFans= "", $trade= "", $designate = "", $cbd = "", $target = "")
    {
        $url = self::URI_PRICE . "?mid=" . $mid;
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

    /**
     * @param $mid
     * @param $toUid
     * @return mixed
     */
    public function getAdvancePrice($mid, $toUid)
    {
        $url = self::URI_PRICE_ADVANCE . "?mid=" . $mid . "&touid=" . $toUid;
        return $this->api->getApiRequest()->call($url, 'GET');
    }

    /**
     * @param $adId
     * @return mixed
     */
    public function getPromoteData($adId)
    {
        $url = self::URI_PROMOTE_DATA . "?adid=" . $adId;
        return $this->api->getApiRequest()->call($url, 'GET');
    }

    /**
     * @param $mid
     * @param string $fansTop
     * @param string $nonFans
     * @param string $trade
     * @param string $designate
     * @param string $cbd
     * @return mixed
     */
    public function getRemain($mid, $fansTop = "", $nonFans= "", $trade= "", $designate = "", $cbd = "")
    {
        $url = self::URI_REMAIN . "?mid=" . $mid;
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

    /**
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
    public function setPromote($mid, $adsUid = "", $fansTop = "", $nonFans= "", $trade= "", $designate = "", $cbd = "", $target = "")
    {
        $param = ["mid" => $mid];
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


    /**
     * @param $mid
     * @param $toUid
     * @param string $adsUid
     * @param string $duration
     * @param string $sponsor
     * @return mixed
     */
    public function setAdvancePromote($mid, $toUid, $adsUid = "", $duration = "", $sponsor = "")
    {
        $param = ["mid" => $mid, "touid" => $toUid];
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


    /**
     * @param $adId
     * @return mixed
     */
    public function offline($adId)
    {
        return $this->api->getApiRequest()->call(self::URI_OFFLINE, 'POST', ['adid' => $adId]);
    }

}