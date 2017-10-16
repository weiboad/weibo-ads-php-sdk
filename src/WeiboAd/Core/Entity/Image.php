<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Image
 * @package WeiboAd\Core\Entity
 */
class Image extends AbstractEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $uid;

    /**
     * @var string
     */
    private $picId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $originalPicUrl;

    /**
     * @var string
     */
    private $bmiddlePicUrl;

    /**
     * @var string
     */
    private $thumbnailPicUrl;


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
    public function getPicId()
    {
        return $this->picId;
    }

    /**
     * @param string $picId
     */
    public function setPicId($picId)
    {
        $this->picId = $picId;
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

    /**
     * @return string
     */
    public function getOriginalPicUrl()
    {
        return $this->originalPicUrl;
    }

    /**
     * @param string $originalPicUrl
     */
    public function setOriginalPicUrl($originalPicUrl)
    {
        $this->originalPicUrl = $originalPicUrl;
    }

    /**
     * @return string
     */
    public function getBmiddlePicUrl()
    {
        return $this->bmiddlePicUrl;
    }

    /**
     * @param string $bmiddlePicUrl
     */
    public function setBmiddlePicUrl($bmiddlePicUrl)
    {
        $this->bmiddlePicUrl = $bmiddlePicUrl;
    }


    /**
     * @return string
     */
    public function getThumbnailPicUrl()
    {
        return $this->thumbnailPicUrl;
    }

    /**
     * @param string $thumbnailPicUrl
     */
    public function setThumbnailPicUrl($thumbnailPicUrl)
    {
        $this->thumbnailPicUrl = $thumbnailPicUrl;
    }


}