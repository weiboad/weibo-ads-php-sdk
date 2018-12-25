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
    const URI_BUDGET = "/account/budget";
    const URI_ASSET = "/account/asset";
    const URI_BUDGET = "/account/budget";

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
        $scheme = self::URI_BUDGET;
        $putData = ['spend_cap' => $spendCap];
        return  $this->api->getApiRequest()->call($scheme, 'PUT', $putData);
    }

    /* 获取账号资产
     * return mixed
     */
    public function asset()
    {
        return  $this->api->getApiRequest()->call(self::URI_ASSET, 'GET');
    }

    /**
     * @param $budget
     * @return Account
     */
    public function budget($budget)
    {
        $putData = ['spend_cap' => $budget];
        $data =  $this->api->getApiRequest()->call(self::URI_BUDGET, 'PUT', $putData);
        return new Account($data);
    }


}
