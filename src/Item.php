<?php

namespace Nibblebits\RssFeedReader;


final class Item
{
    private $title = '';
    private $description = '';
    private $link = '';
    private $dated = '';

    public function __construct($title, $description, $link, $dated)
    {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->link = $link;
        $this->dated = $dated;
    }


    public function fetchArticleImage()
    {
        $image = NULL;
        $htmlString = file_get_contents($this->link);
        $htmlDom = new \DOMDocument();
        @$htmlDom->loadHTML($htmlString);

        $imageTags = $htmlDom->getElementsByTagName('img');

        //Loop through the image tags that DOMDocument found.
        foreach ($imageTags as $imageTag) {
            $width = $imageTag->getAttribute('width');
            $height = $imageTag->getAttribute('height');

            // If the image is above or equal to 300 width and 200 height, assume that its the article image
            if ($width >= 400 && $height >= 300) {
                $title = $imageTag->getAttribute('title');
                if (!$title) {
                    $title = $imageTag->getAttribute('alt');
                }
                $src = $imageTag->getAttribute('src');
                $image = new Image($this->link, $title, $src, $title, $width, $height);
            }
        }

        return $image;
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

    public function getDated()
    {
        return $this->dated;
    }
};
