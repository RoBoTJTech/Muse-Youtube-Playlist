/*
 Copying and distribution of this file, with or without modification,
 are permitted in any medium without royalty provided the copyright
 notice and this notice are preserved including information about me
 and my site http://www.thejohnnyoshow.com :-)
 This file is offered as-is, without any warranty.

 This software is free to use and alter as you need, however please don't
 sell it, and please if possible direct others to my site if they want a
 copy (http://www.thejohnnyoshow.com) Please like and share my videos :-)

Requirements
  - Site running HTML and PHP
  - YouTube Data API from Google. https://developers.google.com/youtube/registering_an_application (This API is free and will be linked to your personal Google account)

Install

  - Basic Site(HTML/PHP)
      The easiest way to use the YouTube Integration software is by adding the yt-integration folder to the root directory of your site.

Usage

- Step #1
  Once installed, add your YouTube Data API key into the config.php file.

      Example: $this->googleAPIKey = 'yourGoogleApiKeyGoesHere';


- Step #2
  Set your baseURI and basePath for your local config.

      Example:
        $basePath = 'local/file/path/';
        $baseURI = '/web/directory';

    The basePath is your server file path and is used for caching your API requests as long as the request is the same it will not make a new request from YouTube. This will make load times faster and will make sure your API limit is not reached.

      e.g. /home/user/site/public_html/yt-integration/resources/feed-cache

    The baseURI is used to save your YouTube thumbnails. These images will be downloaded with descriptive filenames and will be searchable from google images. Make sure your the URI is accessible by the public.

      e.g. $baseURI/yt-integration/resources/youtube-images/image_name

    IMPORTANT - Make sure the above directories are writeable by the server.

      e.g. chmod 777 or a+rw


- Step #3
  Set Your default playListID and defaultVideo

      Example:
        $this->playListID = 'YouTubePlaylistIDGoesHere'
        $this->defaultVideo = 'YouTubeVideoIDGoesHere'


- Step #4
  Place the following lines of code inside the <head></head> tags of each page you wish to display playlists or videos.

      <?php
        // error_reporting(E_ALL); // Uncomment to display errors for debugging
        include('./yt-integration/functions.php');
        $rbtj_YT = new RBTJ_YT_Plugin;
        $rbtj_YT->getConfigs();

        // You can set playlist and video IDs for each page if required, if left empty or removed, it will use the defaults set in your config.php file
        $rbtj_YT->playListID='';
        $rbtj_YT->defaultVideo='';

        $rbtj_YT->getVideoInfo();
        echo $rbtj_YT->showMetatags();
      ?>


- Step #5
  Place the following PHP tags into your HTML code where you would like each element to appear.

      <?php showVideo(); ?>
      <?php showTitle(); ?>
      <?php showDescription(); ?>
      <?php showPlaylist(); ?>



- Caching

  The cached API request data will be refreshed based on the value in seconds give to $this->refresh. The default value is 86400 seconds which is equivalent to 24 hours.

      Common refresh times:
        1 hour  = 3600
        1 day   = 86400
        1 week  = 604800
        1 month = 2629800
        1 year  = 31557600


  <?php showVideo(); ?>
  <?php showTitle(); ?>
  <?php showDescription(); ?>
  <?php showPlaylist(); ?>

- Final Step
  Please like and share my videos, and subscribe and follow my channel
  THANKS!!! And if you find this useful feel free to make a donation towards my work.
  
  John Orjias
  http://www.thejohnnyoshow.com
  http://facebook.com/thejohnnyoshow
  http://youtube.com/thejohnnyoshow
*/
