<?php

namespace WeiboAd\Core\Constant;

class CreativeStatus
{

    /**
     * 审核中
     */
    const PENDING_REVIEW = 0;

    /**
     * 正常
     */
    const NORMAL = 1;

    /**
     * 异常 审核异常
     */
    const UNUSUAL_GUARD = 2;

    /**
     * 异常 uid/mid异常
     */
    const UNUSUAL_INFO = 3;

    /**
     * 暂停
     */
    const PARSED = 4;

    /**
     * 异常
     */
    const UNUSUAL = 5;

    /**
     * 异常 （自动）发布异常
     */
    const UNUSUAL_PUBLISH = 6;

    /**
     * 待发布
     */
    const PUBLISHING = 7;

    /**
     * 已删除
     */
    const DELETED = 9;


}