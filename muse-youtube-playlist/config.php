<?php
// set text styles
$titleStyle = 'font-family: arial;font-size: 24px;text-align: center;line-height: 22px;color: #FFFF00;padding: 5px;';
$descriptionStyle = 'height:1081px;font-family: arial;font-size: 17px;text-align: left;line-height: 19px;overflow: auto;padding: 5px;color: #FFFFFF;';
$ccStyle = 'height:500px;font-family: arial;font-size: 17px;text-align: justify;line-height: 19px;overflow: auto;padding: 5px;color: #FFFFFF;';
$playlistStyle = 'height:200px; overflow: hidden; font-family: arial;font-size: 12px;text-align: left;line-height: 14px;padding: 2x;color: #ffffff;';
$urlStyle = 'height:40px; overflow: hidden; font-family: arial;font-size: 12px;text-align: center;text-decoration: none;font-weight: bold;line-height: 14px;color: #ffff00;padding-top: 2px;padding-bottom: 2px';

// Set your playlist and video IDs
$playListID = 'PLrEnWoR732-BHrPp_Pm8_VleD68f9s14-';
// Set your playListType to one of the following: playlist, search, or user_uploads
$playListType = 'user_uploads';
//$defaultVideo = 'Cu5KD_UX6bc';
$googleAPIKey=‘PUT GOOGLE API KEY HERE’;
$backupPlayListID='PLfiklpBmJhxR95V7AkrOREDZ2D-MTNTuy';

// set iframe size and table sizes, set autoplay=0 to disable autoplay, set disableDescriptions=1 to turn off the
// descriptions on the playlist. -------NOTE: Views are NOT COUNTED if you use IFRAME OR AUTOPLAY... You must set autoplay=0 and OldEmbed=1
// if you wish views to be counted
 $notFound='Sorry no more videos were found in this play list, but check out these cool videos!!!';
$preHTML=‘<br>PUT CUSTOM HTML HERE LIKE AD CODE’;

$postHTML=‘<br>PUT CUSTOM HTML HERE LIKE AD CODE’;

$midHTML=‘<br>PUT CUSTOM HTML HERE LIKE AD CODE’;
$safeSearch='strict';
$relativePlaylist=1;
$iframeWidth = 980;
$iframeHeight = 551;
$tableColumnWidth = 200;
$tableColumns = 4;
$items = $tableColumns * $tableColumns;
$autoplay = 0;
$diableDescriptions = 0;
$playAd = 1;
$skipAdTimer = 5;
$skipButtonText = "Skip Ad&nbsp;&nbsp; &#x27a9;";
$playButtonText = "Play";
$adLinkText="<font color=white>Visit Advertiser...</font>";
$adList = '[{
	"videoID": "hPwf8YDPwkk",
	"advertiserURL": "http://youtube.com/thejohnnyoshow"
}, {
	"videoID": "5EcxrPJmS5M",
	"advertiserURL": "http://facebook.com/thejohnnyoshow"
}]';
$videoPage='/watch-page.html';
// Stuff to help SEO
$youtube_image_path = "/home/robotjtech/public_html/robotjmedia.com/youtube-images/";
$youtube_image_uri = "/youtube-images/";
$feed_path = "/home/robotjtech/public_html/robotjmedia.com/feed-cache/";
$refresh = '86400';
$disable_port=1;
// set the snippet info for sharing on Facebook, Twitter, Etc, must be 200px wide
$siteName = 'The Johnny O Show';
$twitterName = '@thejohnnyoshow';
?>
