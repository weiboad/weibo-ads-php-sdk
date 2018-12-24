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
    const URI_ASSET = "/account/budget";

    /*获取广告账户信息
     * return Account;
     */
    public function read()
    {
       $data =  $this->api->getApiRequest()->call(self::URI_READING, 'GET');
       return new Account($data);
    }

    /*获取日限额
     * return mixed;
     */
    public function budget($spendCap)
    {
        $scheme = self::URI_ASSET;
        $putData = ['spend_cap' => $spendCap];
        return  $this->api->getApiRequest()->call($scheme, 'PUT', $putData);
    }


}
