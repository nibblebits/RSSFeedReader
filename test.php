<?php

use Nibblebits\RssFeedReader\Reader;

include "./src/exceptions/BadRssFeedException.php";
include "./src/Result.php";
include "./src/Channel.php";
include "./src/Image.php";
include "./src/Item.php";

include "./src/Reader.php";

$reader = new Reader();
$result = $reader->load('http://feeds.bbci.co.uk/news/wales/rss.xml');

print_r($result->getChannel()->getItems()[0]->getLink());
print_r($result->getChannel()->getItems()[0]->fetchArticleImage());