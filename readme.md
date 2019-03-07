# PHP Youku SDK

[![Build Status](https://travis-ci.com/ChiVincent/youku-uploader.svg?branch=master)](https://travis-ci.com/ChiVincent/youku-uploader)

The youku.com php sdk.

## Installation

```bash
composer require chivincent/youku-uploader
```

## Usage

```php
<?php

use Chivincent\Youku\Uploader;

$file = '/tmp/test.mp4';                // Must be full path.
$clientId = 'this-is-your-client-id';
$accessToken = 'this-is-your-access-token';

$meta = [];
// $meta['title'] = basename($file);    // The video title. strlen($title) should between 2 and 50.
// $meta['tags'] = [];                  // The video tags. count($meta['tags']) should <= 10, and each tag strlen($tag) should >= 2 and <= 12
// $meta['description'] = '';           // The video description. strlen($description) should < 2000
// $meta['category'] = null;            // The video category.
// $meta['copyrightType'] = 'original'; // "original" or "reproduced"
// $meta['publicType'] = 'all';         // "all", "friend" or "password"
// $meta['watchPassword'] = null;       // if publicType is "password, this is required.
// $meta['deshake'] = 0;                // If use the de-shake process, it is 1.  
$configure = [];
// $configure['checkWaiting'] = 60;     // Check every 60 seconds if it can be committed.

$uploader = new Uploader($clientId, $accessToken);
$uploader->upload($file, $meta, $configure); // It will return video_id for youku.
```