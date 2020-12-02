<?php
// Step #1 - YouTube Data API goes here
$this->googleAPIKey = 'AIzaSyDjft4td4QPwOImeT1iLdEKAWJW7vSUPfQ'; //'AIzaSyC6Z0Qwe64mEo3KxJQAMxBURrQGAXXAxjs';


// Step #2 - Set the file and URI paths for your local install, either relative or full
$basePath = '/var/www/html/rbtj-yt';
$baseURI = '/rbtj-yt';


// Step #3 - Set your playlist and video IDs
$this->playListID = 'PLfiklpBmJhxR95V7AkrOREDZ2D-MTNTuy'; // This is the playlist ID from YouTube
$this->defaultVideo = 'playlist'; // Set your defaultVideo to either a Youtube video ID or to 'playlist'


//Playlist settings
$this->playListType = 'user_uploads'; // Set your playListType to one of the following: playlist, search, or user_uploads
$this->backupPlayListID = 'PLfiklpBmJhxR95V7AkrOREDZ2D-MTNTuy'; // Incase the default is unaccesable for any reason
$this->items = 6; // Set how many videos to display in your playlists
$this->relativePlaylist = 0; //
$this->playListDescLen = 150; // Set the character length of the descriptions
$this->disableDescriptions = 0; // Set $this->disableDescriptions = 1 to turn off the playlist descriptions


//Video Seetings
$this->autoplay = 0; // Set $this->autoplay = 1 to enable autoplay ----NOTE: Views are NOT COUNTED if you use AUTOPLAY
$this->iframeWidth = 640;
$this->iframeHeight = 360;

// set videoPage if the playlist is to target a different page to load the video when clicked
$this->videoPage = ''; // Example $this->videoPage = '/recent-videos'; This will result in videos being redirected to www.yoursite.com/recent-videos

// -------NOTE: Views are NOT COUNTED if you use IFRAME OR AUTOPLAY... You must set $this->autoplay=0 and $this->OldEmbed=1
// if you wish views to be counted

// Set a custom Not Found message, maybe add a link to another page or more videos.
$this->notFound = 'Sorry no more videos were found in this playlist. ';


//AD settings
$this->playAd = 0;
$this->skipAdTimer = 5;
$this->skipButtonText = "Skip Ad&nbsp;&nbsp; &#x27a9;";
$this->playButtonText = "Play";
$this->adLinkText = "<font color=white>Visit Advertiser...</font>";
$this->adList = '[{
	"videoID": "hPwf8YDPwkk",
	"advertiserURL": "https://youtube.com/thejohnnyoshow"
}, {
	"videoID": "5EcxrPJmS5M",
	"advertiserURL": "https://facebook.com/thejohnnyoshow"
}]';


// Stuff to help SEO
$this->youtube_image_uri = $baseURI."/yt-integration/resources/youtube-images/";

$this->youtube_image_path = $basePath."/yt-integration/resources/youtube-images/";
$this->feed_path = $basePath."/yt-integration/resources/feed-cache/";

$this->refresh = '86400';
$this->disable_port = 1;


// set the snippet info for sharing on Facebook, Twitter, Etc, must be 200px wide
$this->siteName = ''; // 'Your Site Name'
$this->twitterName = ''; // '@twitterHandle'

$this->preHTML = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- RoBoT J Tech YouTube Integration -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5803288609382182"
     data-ad-slot="2113358156"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><br>';
$this->postHTML = "<script>
  (function() {
    var cx = 'partner-pub-5803288609382182:8025780955';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only></gcse:searchresults-only>";
$this->midHTML = '<br><scriptsrc="//z-na.amazon-adsystem.com/widgets/onejsMarketPlace=USadInstanceId=d06fdd30-9f2d-4942-b0a4-9eeda481235cstoreId=thjoosh09-20"></script>';
?>
