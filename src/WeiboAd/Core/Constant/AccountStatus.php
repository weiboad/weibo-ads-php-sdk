<?php

class AccountStatus {

    /**
     * 未开户/聚财系统删户
     */
    const ENRICH_NOT_OPEN = 100;

    /**
     * 聚财系统用户资质审核未通过
     */
    const ENRICH_NOT_THROUGH = 101;

    /**
     * 聚财系统用户冻结
     */
    const ENRICH_STATUS_FREEZE = 201;

    /**
     * 聚财系统用户封杀
     */
    const ENRICH_STATUS_BAN = 202;

    /**
     * 聚财系统用户冻结封杀
     */
    const ENRICH_STATUS_FREEZE_AND_BAN = 203;

    /**
     * 未定义的错误态
     */
    const UNDEFINDE_ERROR = 2;

    /**
     * 用户正常
     */
    const USER_NORMAL = 1;

    /**
     * 用户删除
     */
    const USER_DELETE = -1;
}