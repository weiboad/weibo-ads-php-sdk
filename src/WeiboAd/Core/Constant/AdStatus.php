<?php

namespace WeiboAd\Core\Constant;

class AdStatus
{


    /**
     * 删除、结束状态
     */
    const DELETE_STATUS = -1;

    /**
     * 默认状态
     */
    const DEFAULT_STATUS = 0;

    /**
     * 待投放
     */
    const WAIT_DELIVER_STATUS = 1;

    /**
     * 投放中
     */
    const DELIVERING_STATUS = 2;

    /**
     * 用户暂停
     */
    const PAUSE_STATUS = 3;

    /**
     * 账户异常
     */
    const ACCOUNT_ABNORMAL_STATUS = 5;

    /**
     * 系列暂停
     */
    const CAMPAIGN_PAUSE_STATUS = 6;

    /**
     * 余额不足
     */
    const ACCOUNT_BALANCE_LACK_STATUS = 7;

    /**
     * 到达账户日限额
     */
    const REACH_ACCOUNT_SPEND_CAP_STATUS = 8;

    /**
     * 到达系列预算
     */
    const REACH_CAMPAIGN_LIFETIME_BUDGET_STATUS = 9;

    /**
     * 到达计划日限额
     */
    const REACH_AD_DAILY_BUDGET_STATUS = 10;

    /**
     * 无可用创意
     */
    const CREATIVE_NOT_EXIST_STATUS = 11;

}