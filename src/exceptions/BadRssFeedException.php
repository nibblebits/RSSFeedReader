<?php

namespace Nibblebits\RssFeedReader\Exceptions;

use Exception;

class BadRssFeedException extends Exception
{
    

    public function __construct($message)
    {
        parent::__construct($message);
    }

   
};