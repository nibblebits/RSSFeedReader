<?php

namespace Nibblebits\RssFeedReader;

use Nibblebits\RssFeedReader\Exceptions\BadRssFeedException;
use Nibblebits\RssFeedReader\Reader;
use Nibblebits\RssFeedReader\Channel;
use Nibblebits\RssFeedReader\Image;

class Reader
{
    private function parseImage($xml_image)
    {
        $link = isset($xml_image->link) ? $xml_image->link : '';
        $title = isset($xml_image->title) ? $xml_image->title : '';
        $url = isset($xml_image->url) ? $xml_image->url : '';
        $description = isset($xml_image->description) ? $xml_image->description : '';
        $height = isset($xml_image->height) ? $xml_image->height : '';
        $width = isset($xml_image->width) ? $xml_image->width : '';
        return new Image($link, $title, $url, $description, $height, $width);
    }


    private function parseItem($item)
    {
        $title = isset($item->title) ? $item->title : '';
        $description = isset($item->description) ? $item->description : '';
        $link = isset($item->link) ? $item->link : '';
        $dated = isset($item->pubDate) ? $item->pubDate : NULL;
        return new Item($title, $description, $link, $dated);
    }

    private function parseItems($items)
    {
        $result = array();
        foreach ($items as $item) {
            $result[] = $this->parseItem($item);
        }

        return $result;
    }

    private function parseChannel($xml_channel)
    {
        $title = isset($xml_channel->title) ? $xml_channel->title : '';
        $description = isset($xml_channel->description) ? $xml_channel->description : '';
        $link = isset($xml_channel->link) ? $xml_channel->link : '';
        $language = isset($xml_channel->language) ? $xml_channel->language : '';
        $copyright = isset($xml_channel->copyright) ? $xml_channel->copyright : '';
        $image = isset($xml_channel->image) ? $this->parseImage($xml_channel->image) : NULL;
        $items = $this->parseItems($xml_channel->item);
        return new Channel($title, $description, $link, $language, $copyright, $image, $items);
    }



    public function load($url)
    {

        $result = new Result();
        $contents = @file_get_contents($url, true);
        if (!$contents)
        {
            throw new BadRssFeedException("Problem loading the url: " . $url);
        }
        
        $xml = @simplexml_load_string($contents);
        if (!$xml)
        {
            throw new BadRssFeedException("Failed to parse the RSS file, is this an actual valid RSS file?");
        }
        if (isset($xml->channel)) {
            $result->setChannel($this->parseChannel($xml->channel));
        }

        return $result;
    }
};
