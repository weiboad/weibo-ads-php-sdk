<?php

namespace WeiboAd\Core;

use WeiboAd\Core\Entity\Account;


/**
 * Class AccountApi
 * @package WeiboAd\Core
 */
class AccountApi extends AbstractApi
{

    const URI_READING = "/account";
    const URI_ASSET = "/account/asset";

    /**
     * @return Account
     */
    public function read()
    {
       $data =  $this->api->getApiRequest()->call(self::URI_READING, 'GET');
       return new Account($data);
    }

    /**
     * @return mixed
     */
    public function asset()
    {
        return  $this->api->getApiRequest()->call(self::URI_ASSET, 'GET');
    }


}
