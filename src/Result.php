<?php

namespace Nibblebits\RssFeedReader;


final class Result
{
    private $channel;

    public function __construct()
    {

    }

    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    public function getChannel()
    {
        return $this->channel;
    }

};