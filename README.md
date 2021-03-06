# \Suin\RSSWriter

`\Suin\RSSWriter` is yet another simple RSS writer library for PHP 5.4 or later. This component is Licensed under MIT license.

This library can also be used to publish Podcasts.

[![Latest Stable Version](https://poser.pugx.org/suin/php-rss-writer/v/stable)](https://packagist.org/packages/suin/php-rss-writer)
[![Total Downloads](https://poser.pugx.org/suin/php-rss-writer/downloads)](https://packagist.org/packages/suin/php-rss-writer) 
[![Daily Downloads](https://poser.pugx.org/suin/php-rss-writer/d/daily)](https://packagist.org/packages/suin/php-rss-writer)
[![License](https://poser.pugx.org/suin/php-rss-writer/license)](https://packagist.org/packages/suin/php-rss-writer)
[![Build Status](https://travis-ci.org/suin/php-rss-writer.svg?branch=master)](https://travis-ci.org/suin/php-rss-writer)
[![Codacy Badge](https://api.codacy.com/project/badge/grade/1c5e4e28e7e24f6ab7221b2166b5b6c7)](https://www.codacy.com/app/suinyeze/php-rss-writer)

## Quick demo


```php
$feed = new Feed();

$channel = new Channel();
$channel
    ->title('Channel Title')
    ->description('Channel Description')
    ->url('http://blog.example.com')
    ->language('en-US')
    ->copyright('Copyright 2012, Foo Bar')
    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->lastBuildDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->ttl(60)
    ->appendTo($feed);

// Blog item
$item = new Item();
$item
    ->title('Blog Entry Title')
    ->description('<div>Blog body</div>')
    ->url('http://blog.example.com/2012/08/21/blog-entry/')
    ->author('Hidehito Nozawa')
    ->pubDate(strtotime('Tue, 21 Aug 2012 19:50:37 +0900'))
    ->guid('http://blog.example.com/2012/08/21/blog-entry/', true)
    ->appendTo($channel);

// Podcast item
$item = new Item();
$item
    ->title('Some Podcast Entry')
    ->description('<div>Podcast body</div>')
    ->url('http://podcast.example.com/2012/08/21/podcast-entry/')
    ->enclosure('http://podcast.example.com/2012/08/21/podcast.mp3', 4889, 'audio/mpeg')
    ->appendTo($channel);

echo $feed; // or echo $feed->render();
```

Output:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
  <channel>
    <title>Channel Title</title>
    <link>http://blog.example.com</link>
    <description>Channel Description</description>
    <language>en-US</language>
    <copyright>Copyright 2012, Foo Bar</copyright>
    <pubDate>Tue, 21 Aug 2012 19:50:37 +0900</pubDate>
    <lastBuildDate>Tue, 21 Aug 2012 19:50:37 +0900</lastBuildDate>
    <ttl>60</ttl>
    <item>
      <title>Blog Entry Title</title>
      <link>http://blog.example.com/2012/08/21/blog-entry/</link>
      <description>&lt;div&gt;Blog body&lt;/div&gt;</description>
      <guid>http://blog.example.com/2012/08/21/blog-entry/</guid>
      <pubDate>Tue, 21 Aug 2012 19:50:37 +0900</pubDate>
      <author>Hidehito Nozawa</author>
    </item>
    <item>
      <title>Some Podcast Entry</title>
      <link>http://podcast.example.com/2012/08/21/podcast-entry/</link>
      <description>&lt;div&gt;Podcast body&lt;/div&gt;</description>
      <enclosure url="http://podcast.example.com/2012/08/21/podcast.mp3" type="audio/mpeg" length="4889"/>
    </item>
  </channel>
</rss>
```

## Installation

### Easy installation

You can install directly via [Composer](https://getcomposer.org/):

```bash
$ composer require suin/php-rss-writer
```

### Manual installation

Add the following code to your `composer.json` file:

```json
{
	"require": {
		"suin/php-rss-writer": ">=1.0"
	}
}
```

...and run composer to install it:

```bash
$ composer install
```

Finally, include `vendor/autoload.php` in your product:

```php
require_once 'vendor/autoload.php';
```

## How to use

The [`examples`](examples) directory contains usage examples for RSSWriter.

If you want to know APIs, please see [`FeedInterface`](src/Suin/RSSWriter/FeedInterface.php), [`ChannelInterface`](src/Suin/RSSWriter/ChannelInterface.php) and [`ItemInterface`](src/Suin/RSSWriter/ItemInterface.php).

## License

MIT license
