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



- Step #3
  Set Your default playListID and defaultVideo

      Example:
        $this->playListID = 'YouTubePlaylistIDGoesHere'
        $this->defaultVideo = 'YouTubeVideoIDGoesHere'


// Dirs and URLs -- make a directory on your server where you want to store youtube thumbnails.
// They will be downloaded and descriptive file names will assigned to them making them searchable from google images
// caching will reduce the need for pulling your playlist data from YouTube for every request. The data will
// be refreshed based on the $refresh value in seconds. Make sure you create the directory on your server, and make it
// writable by the web server ie: chmod 777 or a+rw
  $youtube_image_path="./youtube-images/";
  $youtube_image_uri="/youtube-images/";
  $feed_path="./feed-cache/";
  $refresh='86400';

// set the snippet info for sharing on Facebook, Twitter, Etc, must be 200px wide
  $siteName='The Johnny O Show';
  $twitterName='@thejohnnyoshow';
  include('./thejohnnyoshow/functions.php');
  ?>
//-----------------CUT AND PASTE THE CODE ABOVE INTO YOUR MUSE PAGE PROPERTIES HTML HEADER SECTION---------------------------

  Step 3 Make the needed changes to the values in the code you just pasted
  to match your needs

  Step 4 Make a folder in your HTML folder on your server named 'thejohnnyoshow' and put
  this file with the name of 'functions.php' inside of it using an ftp client or
  the file manager if your hosting provider offers one (like in cPanel or plesk)

  Step 5 Place the following HTML tags by inserting an HTML object in Muse in
  any location you want on your page. Tags can be used separately and in any
  order or layout on your page. Again watch my videos for help :-)

  <?php showMetatags(); ?>
  <?php showVideo(); ?>
  <?php showTitle(); ?>
  <?php showDescription(); ?>
  <?php showPlaylist(); ?>

  Step 6 Please like and share my videos, and subscribe and
  follow THANKS!!! And if you really want you can send me money :-)

  John Orjias
  http://www.thejohnnyoshow.com
  http://facebook.com/thejohnnyoshow
  http://youtube.com/thejohnnyoshow
*/
