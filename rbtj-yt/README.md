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
  - YouTube Data API from Google (This API is free and will be linked to your personal Google account)

Install

  Basic Site(HTML/PHP)
    The easiest way to use the YouTube Integration software is by adding the yt-integration folder to the root directory of your site.

  Usage
    Step #1
      Once installed, add your YouTube Data API key into the config.php file.

        Example: $this->googleAPIKey = 'yourGoogleApiKeyGoesHere';


    Step #2
      Set your baseURI and basePath for your local config.

        Example:
          $basePath = 'local/file/path/';
          $baseURI = '/web/directory';

    Step #3
      Set Your default videoID and playListID





// you can also include a default settings file. You would create a file that contains
// everything in this section, then in the header of your page you could
// only set the values you want to change for that page
// @include_once('./thejohnnyoshow/config.php');

// set text styles
  $titleStyle='font-family: arial;font-size: 20px;text-align: center;line-height: 22px;color: #FFFF00;padding: 5px;';
  $descriptionStyle='height:250px;font-family: arial;font-size: 17px;text-align: justify;line-height: 19px;overflow: scroll;padding-right: 5px;padding-left: 5px;color: #FFFFFF;';
  $playlistStyle='height:150px; overflow: none; font-family: arial;font-size: 10px;text-align: justify;line-height: 12px;padding: 2px;color: #ffffff;';
  $urlStyle='height:40px; overflow: none; font-family: arial;font-size: 12px;text-align: center;text-decoration: none;font-weight: bold;line-height: 14px;color: #ffff00;padding: 2px;';

// Set your playlist and video IDs
  $playListID='PLfiklpBmJhxR95V7AkrOREDZ2D-MTNTuy';
  $defaultVideo='Cu5KD_UX6bc';
  $backupPlayListID='PLfiklpBmJhxR95V7AkrOREDZ2D-MTNTuy';

// Register with Google to get an API server key and put it here https://developers.google.com/youtube/registering_an_application allow 15 minutes for key to become active
  $googleAPIKey='PUT SERVER API KEY HERE';

// set iframe size and table sizes, set autoplay=0 to disable autoplay, set disableDescriptions=1 to turn off the
// descriptions on the playlist. -------NOTE: Views are NOT COUNTED if you use IFRAME OR AUTOPLAY... You must set autoplay=0 and OldEmbed=1 or OldEmbed=2
// if you wish views to be counted. OldEmbed=2 means it will use the old embed code Primary but if their browser is ISO (iPhone, iPod, iPad) it will use an iFrame so they can
// see the video. Setting autoplay=2 will cause autoplay to only happen if its the default video playing.
  $iframeWidth=980;
  $iframeHeight=551;
  $tableColumnWidth=200;
  $tableColumns=4;
  $items=$tableColumns*$tableColumns;
  $autoplay=1;
  $oldEmbed=2;
  $diableDescriptions=0;


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
