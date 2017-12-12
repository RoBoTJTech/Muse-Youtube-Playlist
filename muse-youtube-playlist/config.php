<?php
// Example of external config to set defaults, this is not required settings can just be
// placed in the header on the muse page as explained in the video
// http://www.thejohnnyoshow.com/coding-corner.html?t=ep-176-html-to-php-in-adobe-muse-youtube-playlist&v=R_4KWAR8odc&p=
// set text styles
$titleStyle = 'font-family: arial;font-size: 20px;text-align: center;line-height: 22px;color: #FFFF00;padding: 5px;';
$descriptionStyle = 'height:250px;font-family: arial;font-size: 17px;text-align: justify;line-height: 19px;overflow: scroll;padding: 5px;color: #FFFFFF;';
$playlistStyle = 'height:150px; overflow: none; font-family: arial;font-size: 10px;text-align: justify;line-height: 12px;padding: 2px;color: #ffffff;';
$urlStyle = 'height:40px; overflow: none; font-family: arial;font-size: 12px;text-align: center;text-decoration: none;font-weight: bold;line-height: 14px;color: #ffff00;padding: 2px;';

// Set your playlist and video IDs
$playListID = 'PLfiklpBmJhxR95V7AkrOREDZ2D-MTNTuy';
$defaultVideo = 'Cu5KD_UX6bc';
$googleAPIKey='PUT API KEY HERE';
$backupPlayListID='PLfiklpBmJhxR95V7AkrOREDZ2D-MTNTuy';

// set iframe size and table sizes, set autoplay=0 to disable autoplay, set disableDescriptions=1 to turn off the 
// descriptions on the playlist. -------NOTE: Views are NOT COUNTED if you use IFRAME OR AUTOPLAY... You must set autoplay=0 and OldEmbed=1 
// if you wish views to be counted 
$iframeWidth = 980;
$iframeHeight = 551;
$tableColumnWidth = 200;
$tableColumns = 4;
$items = $tableColumns * $tableColumns;
$autoplay = 0;
$diableDescriptions = 0;
$oldEmbed=2;

// Stuff to help SEO
$youtube_image_path = "./youtube-images/";
$youtube_image_uri = "/youtube-images/";
$feed_path = "./feed-cache/";
$refresh = '86400';

// set the snippet info for sharing on Facebook, Twitter, Etc, must be 200px wide
$siteName = 'The Johnny O Show';
$twitterName = '@thejohnnyoshow';
?>