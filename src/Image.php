<?php

namespace Nibblebits\RssFeedReader;


final class Image
{
    private $link = '';
    private $title = '';
    private $url = '';
    private $description = '';
    private $height = '';
    private $width = '';

    public function __construct($link, $title, $url, $description, $height, $width)
    {
        $this->link = $link;
        $this->title = $title;
        $this->url = $url;
        $this->description = $description;
        $this->height = $height;
        $this->width = $width;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getDescription()
    {
        return $this->description;
    }
    
    public function getHeight()
    {
        return $this->height;
    }

    public function getWidth()
    {
        return $this->width;
    }
};