<?php

namespace WeiboAd\Core;

use WeiboAd\Core\Entity\Assets;


/**
 * Class AssetsApi
 * @package WeiboAd\Core
 */
class AssetsApi extends AbstractApi
{

    const URI_ASSET = "/account/asset";


    /* 获取账号资产
     * return mixed
     */
    public function asset()
    {
        return  $this->api->getApiRequest()->call(self::URI_ASSET, 'GET');
    }


}
