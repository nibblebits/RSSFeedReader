<?php

namespace Nibblebits\RssFeedReader;


class Channel
{
    private $title;
    private $description;
    private $link;
    private $language;
    private $copyright;
    private $image;
    private $items;

    public function __construct($title, $description, $link, $language, $copyright, $image, $items)
    {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->language = $language;
        $this->copyright = $copyright;
        $this->image = $image;
        $this->items = $items;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getCopyright()
    {
        return $this->copyright;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getItems()
    {
        return $this->items;
    }
};