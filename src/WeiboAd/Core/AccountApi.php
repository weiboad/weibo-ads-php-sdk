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

    /**
     * @return Account
     */
    public function read() {
       $data =  $this->api->getApiRequest()->call(self::URI_READING, 'GET');
       return new Account($data);
    }


}
