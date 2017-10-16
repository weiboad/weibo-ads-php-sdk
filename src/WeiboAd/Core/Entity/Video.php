<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Image
 * @package WeiboAd\Core\Entity
 */
class Video extends AbstractEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $uid;

    /**
     * @var string
     */
    private $fid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $length;

    /**
     * @var string
     */
    private $md5;

    /**
     * @var string
     */
    private $shortUrl;

    /**
     * @var string
     */
    private $uploadedStatus;

    /**
     * @var string
     */
    private $transcodedStatus;


    /**
     * @var string
     */
    private $status;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param int $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @return string
     */
    public function getFid()
    {
        return $this->fid;
    }

    /**
     * @param string $fid
     */
    public function setFid($fid)
    {
        $this->fid = $fid;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param string $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return string
     */
    public function getMd5()
    {
        return $this->md5;
    }

    /**
     * @param string $md5
     */
    public function setMd5($md5)
    {
        $this->md5 = $md5;
    }

    /**
     * @return string
     */
    public function getShortUrl()
    {
        return $this->shortUrl;
    }

    /**
     * @param string $shortUrl
     */
    public function setShortUrl($shortUrl)
    {
        $this->shortUrl = $shortUrl;
    }

    /**
     * @return string
     */
    public function getUploadedStatus()
    {
        return $this->uploadedStatus;
    }

    /**
     * @param string $uploadedStatus
     */
    public function setUploadedStatus($uploadedStatus)
    {
        $this->uploadedStatus = $uploadedStatus;
    }

    /**
     * @return string
     */
    public function getTranscodedStatus()
    {
        return $this->transcodedStatus;
    }

    /**
     * @param string $transcodedStatus
     */
    public function setTranscodedStatus($transcodedStatus)
    {
        $this->transcodedStatus = $transcodedStatus;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}