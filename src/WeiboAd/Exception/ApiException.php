<?php

namespace WeiboAd\Exception;

use Exception;

/**
 * Class ApiException
 * @package WeiboAd\Exception
 */
class ApiException extends Exception
{

    /**
     * ApiException constructor.
     * @param string $data
     * @param int $errorCode
     */
    public function __construct($data, $errorCode = 400)
    {

        if (is_array($data) && isset($data['error'])) {
            $message = $data['error']['message'];
            return parent::__construct($message, $data['error']['code']);
        } else {
            return parent::__construct(json_encode($data), $errorCode);
        }
    }
}
