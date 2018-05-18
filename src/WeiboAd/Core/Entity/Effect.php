<?php

namespace WeiboAd\Core\Entity;

/**
 * Class Feed
 * @package WeiboAd\Core\Entity
 */
class Effect extends AbstractEntity
{
    /**
     * @var int
     */
    private $normal;

    /**
     * @var int
     */
    private $video;


    /**
     * @return int
     */
    public function getNormal()
    {
        return $this->normal;
    }

    /**
     * @param int $normal
     */
    public function setNormal($normal)
    {
        $this->normal = $normal;
    }

    /**
     * @return int
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param int $video
     */
    public function setVideo($video)
    {
        $this->video = $video;
    }



}