<?php

namespace WeiboAd\Core;

/**
 * Class InsightApi
 * @package WeiboAd\Core
 */
class InsightApi extends AbstractApi
{
    const URI_DEMOGRAPHY = "/insights/demography";
    const URI_EFFECT     = "/insights/effect";
    const URI_LAYER      = "/insights/layer";
    const URI_GRAPH      = "/insights/graph";

    /*按人群统计分析
     * @param array $timeInterval
     * @param array $field
     * @param array $dimension
     * @param array $granularity
     * @param  $param
     * @param array $orderBy
     * @param $orderMode
     * @param $page
     * @param $rows
     * @return mixed
     */
    public function demography(array $timeInterval, array $field, array $dimension, array $granularity,  $param, array $orderBy, $orderMode, $page, $rows)
    {
        $params = [
            'time_interval' => $timeInterval,
            'order_by' => $orderBy,
            'granularity' => $granularity,
            'dimension' => $dimension,
            'page' => $page,
            'rows' => $rows,
            'field' => $field,
            'param' => $param,
            'order_mode' => $orderMode
        ];
        $url = self::URI_DEMOGRAPHY . "?data=" . json_encode($params);

        $data =  $this->api->getApiRequest()->call($url, 'GET');
        return $data;
    }

    /*按效果统计分析
     * @param array $timeInterval
     * @param array $field
     * @param array $dimension
     * @param array $granularity
     * @param  $param
     * @param array $orderBy
     * @param $orderMode
     * @param $page
     * @param $rows
     * @return mixed
     */
    public function effect(array $timeInterval, array $field, array $dimension, array $granularity, $param, array $orderBy, $orderMode, $page, $rows)
    {
        $params = [
            'time_interval' => $timeInterval,
            'order_by' => $orderBy,
            'granularity' => $granularity,
            'dimension' => $dimension,
            'page' => $page,
            'rows' => $rows,
            'field' => $field,
            'param' => $param,
            'order_mode' => $orderMode
        ];
        $url = self::URI_EFFECT . "?data=" . json_encode($params);
        $data =  $this->api->getApiRequest()->call($url, 'GET');
        return $data;
    }

    /*二次传播数据统计
     * @param array $timeInterval
     * @param array $field
     * @param array $dimension
     * @param array $granularity
     * @param  $param
     * @param array $orderBy
     * @param $orderMode
     * @param $page
     * @param $rows
     * @return mixed
     */
    public function layer(array $timeInterval, array $field, array $dimension, array $granularity, $param, array $orderBy, $orderMode, $page, $rows)
    {
        $params = [
            'time_interval' => $timeInterval,
            'order_by' => $orderBy,
            'granularity' => $granularity,
            'dimension' => $dimension,
            'page' => $page,
            'rows' => $rows,
            'field' => $field,
            'param' => $param,
            'order_mode' => $orderMode

        ];
        $url = self::URI_LAYER . "?data=" . json_encode($params);
        $data =  $this->api->getApiRequest()->call($url, 'GET');
        return $data;
    }

    /*图标数据
     * @param array $timeInterval
     * @param array $field
     * @param array $dimension
     * @param array $granularity
     * @param $param
     * @param array $orderBy
     * @param $orderMode
     * @param $page
     * @param $rows
     * @return mixed
     */
    public function graph(array $timeInterval, array $field, array $dimension, array $granularity, $param, array $orderBy, $orderMode, $page, $rows)
    {
        $params = [
            'time_interval' => $timeInterval,
            'order_by' => $orderBy,
            'granularity' => $granularity,
            'dimension' => $dimension,
            'page' => $page,
            'rows' => $rows,
            'field' => $field,
            'param' => $param,
            'order_mode' => $orderMode
        ];
        $url = self::URI_GRAPH . "?data=" . json_encode($params);
        $data =  $this->api->getApiRequest()->call($url, 'GET');
        return $data;
    }
}