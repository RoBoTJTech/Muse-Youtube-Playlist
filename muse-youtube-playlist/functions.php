<?php
/*
  Copying and distribution of this file, with or without modification,
  are permitted in any medium without royalty provided the copyright
  notice and this notice are preserved including information about me
  and my site http://www.thejohnnyoshow.com :-)
  This file is offered as-is, without any warranty.

  This software is free to use and alter as you need, however please don't
  sell it, and please if possible direct others to my site if they want a
  copy (http://www.thejohnnyoshow.com) Please like and share my videos :-)

  How to use this script

  Note: This script was written to use with Muse but really can be put in any
  HTML or PHP file or any web design tool that lets you put html code

  Step 1 Paste this code in your .htaccess file, it will allow .html
  files to work just like .php files (watch the video tutorial on
  my site if you have questions http://www.thejohnnyoshow.com)

  # --------------START OF .htaccess CODE-------------
  AddType text/html .html .php
  AddHandler server-parsed .html .php
  # Uncomment the version of PHP you have on your server
  # Only one of the following can be uncommented
  AddHandler application/x-httpd-php5 .html .php
  #AddHandler application/x-httpd-php52 .html .php
  #AddHandler application/x-httpd-php54 .html .php
  #AddHandler application/x-httpd-php4 .html .php
  # -------------END OF .htaccess CODE----------------

  Step 2 Paste this code at the top of the page you want to use the youtube
  feed script on by pasting it in the HTML header code section in page
  properties in Muse. Again check out my videos for help

  //-------------------CUT AND PASTE THE CODE BELOW INTO YOUR MUSE PAGE PROPERTIES HTML HEADER SECTION-----------------------
  <?php
  // you can also include a default settings file. You would create a file that contains
  // everything in this section, then in the header of your page you could
  // only set the values you want to change for that page
  // @include_once('./thejohnnyoshow/config.php');

  // set text styles
  $titleStyle='font-family: arial;font-size: 20px;text-align: center;line-height: 22px;color: #FFFF00;padding: 5px;';
  $descriptionStyle='height:250px;font-family: arial;font-size: 17px;text-align: justify;line-height: 19px;overflow: scroll;padding-right: 5px;padding-left: 5px;color: #FFFFFF;';
  $ccStyle = 'height:500px;font-family: arial;font-size: 17px;text-align: justify;line-height: 19px;overflow: scroll;padding: 5px;color: #FFFFFF;';
  $playlistStyle='height:150px; overflow: none; font-family: arial;font-size: 10px;text-align: justify;line-height: 12px;padding: 2px;color: #ffffff;';
  $urlStyle='height:40px; overflow: none; font-family: arial;font-size: 12px;text-align: center;text-decoration: none;font-weight: bold;line-height: 14px;color: #ffff00;padding: 2px;';

  // Set your playlist and video IDs
  $playListID='PLfiklpBmJhxR95V7AkrOREDZ2D-MTNTuy';
  $defaultVideo='Cu5KD_UX6bc';
  $backupPlayListID='PLfiklpBmJhxR95V7AkrOREDZ2D-MTNTuy';

  // Register with Google to get an API server key and put it here https://developers.google.com/youtube/registering_an_application allow 15 minutes for key to become active
  $googleAPIKey='PUT SERVER API KEY HERE';

  // set iframe size and table sizes, set autoplay=0 to disable autoplay, set disableDescriptions=1 to turn off the
  // descriptions on the playlist.
  // Setting autoplay=1 autoplays all videos, Setting autoplay=2 will cause autoplay to
  // only happen if its the default video playing.
  // Setting playAd=1 turns on autoplay and will play listed ad video preroll
  // skipAdTimer sets in seconds how long before the skip button shows
  // adButtonText sets the text of the skip button
  // for playlists that update relative to the video being watched set relativePlaylist=1
  // Safe Search settings can be none,moderate,strict
  $iframeWidth=980;
  $iframeHeight=551;
  $tableColumnWidth=200;
  $tableColumns=4;
  $items=$tableColumns*$tableColumns;
  $autoplay=1;
  $playAd=1;
  $skipAdTimer=5;
  $adButtonText="Skip Ad&nbsp;&nbsp; &#x27a9;";
  $diableDescriptions=0;
  $relativePlaylist=0;
  $safeSearch='strict';

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
  
  // Other settings
  // What to say if no videos on the playlist or search
  $notFound='Sorry no more videos were found in this play list, but check out these cool videos!!!';
  // set videoPage if the playlist is to target a different page to load the video when clicked 
  $videoPage='';

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
// Do not alter anything below this line unless you know what you are doing

error_reporting ( 0 );

// Check to see if page was redirected and video ID was lost. example: auto-switching to mobile pages
// default page name, you should never change this unless your default page name is something other then
// index.html and if your using this with Muse it is index.html
$defaultPage="index.html";
$lastPage=parse_url($_SERVER['HTTP_REFERER']);
$lastPageBase=basename($lastPage['path']);
parse_str($lastPage["query"],$lastQuery);
if ($lastPageBase=='')
	$lastPageBase=$defaultPage;
if ($lastPageBase==basename($_SERVER["SCRIPT_NAME"]) && (($_GET["list"]=='' && $lastQuery["list"]) || ($_GET["v"]=='' && $lastQuery["v"]))){
        if ($_GET["v"]=='' && $lastQuery["v"])
	   $_GET["v"]=$lastQuery["v"];
        if ($_GET["list"]=='' && $lastQuery["list"])
           $_GET["list"]=$lastQuery["list"];
	echo '<SCRIPT LANGUAGE="JavaScript">document.cookie="redirected=true"</script>';
	$_COOKIE["redirected"]="true";
}

// end of page redirect test


if ($_GET ['error_page']) {
	list ( , $query ) = explode ( '?', $_SERVER ['REQUEST_URI'] );
	parse_str ( $query, $query_array );
	$_GET ['v'] = $query_array ['v'];
}

// Get video ID from url or set to default if no ID
$videoID = $defaultVideo;
if (isset ( $_GET ['v'] )) {
	$videoID = strip_tags ( $_GET ['v'] );
}
if (isset ( $_GET ['list'] )) {
        $playListID = strip_tags ( $_GET ['list'] );
}

if ($_GET ['longdesc'] == 'off') {
	echo '<SCRIPT LANGUAGE="JavaScript">document.cookie="longDesc=off"</script>';
} elseif ($_GET ['longdesc'] == 'on' || $_COOKIE ['longDesc'] == 'on') {
	$longDesc = 1;
	echo '<SCRIPT LANGUAGE="JavaScript">document.cookie="longDesc=on"</script>';
	$refresh = 0;
}

if (! $_GET ['v'] && isset ( $_GET ['p'] ) && isset ( $_COOKIE ['videoID'] )) {
	$videoID = $_COOKIE ['videoID'];
}

if ($_GET ['p']) {
	$pageToken = '&pageToken=' . $_GET ['p'];
	$page = $_GET ['p'];
}

// Skip Ad Timer
if(!$skipAdTimer) $skipAdTimer = 5;

// Skip Ad Button Text
if(!$skipButtonText) $skipButtonText = 'Skip Ad&nbsp;&nbsp; &#x27a9;';

// Play Button Text
if(!$playButtonText) $playButtonText = 'Play';

if ($adList) $adList = json_decode($adList, true);

// set feed URLs
$playlistURL = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=' . $playListID . '&maxResults=' . $items . $pageToken . '&key=' . $googleAPIKey;
$backupPlaylistURL = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=' . $backupPlayListID . '&maxResults=' . $items . '&key=' . $googleAPIKey;

$titleParam='t';
if ($relativePlaylist)
   $titleParam='q';

if (!$_GET['q'] && substr($playListID,0,6)=='QUERY:')
   $_GET['q'] = substr($playListID,6,strlen($playListID));

if ($relativePlaylist && !isset($_GET['q']) && !isset($_GET['list']) && isset($_GET['v'])){
   $_GET['q'] = seoTitle ( $videoTitle );
}

if (isset ($_GET['q'])){
   $playListID='QUERY:'.urlencode($_GET['q']);
   $playlistURL = 'https://www.googleapis.com/youtube/v3/search?type=video&safeSearch='.$safeSearch.'&key=' . $googleAPIKey .'&part=snippet&maxResults=' . $items . $pageToken . '&q='.urlencode($_GET['q']);
}


if (!$defaultVideo && !$videoID)
   firstPlaylistVideo(); 

$videoURL = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' . $videoID . '&key=' . $googleAPIKey;
$youtubeWatch = 'https://www.youtube.com/watch?v=' . $videoID;
$videoCC = 'http://video.google.com/timedtext?lang=en&v=' . $videoID;

getVideoInfo ();

function showVideo() {
	global $videoID;
	global $playListID;
	global $iframeWidth;
	global $iframeHeight;
	global $autoplay;
	global $playAd;
      global $skipAdTimer;
      global $skipButtonText;
      global $playButtonText;
      global $adLinkText;
      global $adList;
      global $videoTitle;
      global $videoThumbnail;
  if ($playAd && count($adList)) {
    $adNumber = rand(0, count($adList) -1);
    $adLinkURL = $adList[$adNumber]['advertiserURL'];
    $adVideoID = $adList[$adNumber]['videoID'];
  }

	echo '<SCRIPT LANGUAGE="JavaScript">document.cookie="videoID=' . $videoID . '"</script>';

	if ($autoplay == 1 || ($autoplay == 2 && ! $_GET ['v'] && ! $_GET ['p']))
		$playlist = '&listType=playlist&list=' . $playListID . '&autoplay=1';

	if ($playAd) {?>
<script>
	var timeoutID;



 // create youtube player
 var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var autostart = <?php echo $autoplay?>;
    var videocount=0;
    var player;
    function onYouTubePlayerAPIReady() {
        player = new YT.Player('player', {
          height: '<?php echo $iframeHeight;?>',
          width: '<?php echo $iframeWidth;?>',
          videoId: '<?php echo $adVideoID;?>',
          playerVars: {
            'controls': '1',
            'iv_load_policy': '3',
            'showinfo': '0',
            'origin': '<?php echo getCurrentURL(1)?>',
            'enablejsapi': '1'
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
    }

    // autoplay video
    function onPlayerReady(event) {
      if (autostart==1){
            skipButtonTimer();
            event.target.playVideo();
      }
    }

    function skipButtonTimer () {
      if (videocount < 1) {
        timeoutID = window.setTimeout(showskipButton, <?php echo $skipAdTimer*1000?>);
      }
    }

    // when video ends
    function onPlayerStateChange(event) {
      if(event.data === 0) {
            if (videocount<1){
                  nextVideo();
                  videocount++;
            } else {
                  player.cueVideoById('<?php echo $videoID;?>');
                  }

            }
      }
      function startVideos(){
            document.getElementById('videoThumb').style.display = 'none';
            document.getElementById('player').style.display = 'block';
            autostart=1;
            skipButtonTimer();
            player.playVideo();
      }
      function showskipButton() {
            if (videocount<1){
                  document.getElementById('skipButton').style.display = 'block';
                  document.getElementById('adLinkText').style.display = 'block';
            }
      }

      function nextVideo() {
            videocount++;
            document.getElementById('adLinkText').style.display = 'none';
            document.getElementById('skipButton').style.display = 'none';
            player.loadVideoById('<?php echo $videoID;?>');
      }
</script>
      <?php 
      if ($autoplay == 0) {
      $cachedIMG = showImage ( $videoTitle, $videoID, $videoThumbnail );
      ?>
      <div id="videoThumb" style="display: block;"><img style="width:<?php echo $iframeWidth ?>px; height: <?php echo $iframeHeight ?>px;" onclick="startVideos()" src="<?php echo $cachedIMG;?>"><div style="display: block; z-index: 200; position: relative; margin-top: -<?php echo $iframeHeight/2+25 ?>px; left: <?php echo $iframeWidth/2-88?>px; width: 175px; height: 50px; background-color: #242826; border: 1px solid #fff; text-align: center; border-radius: 4px; font-family: Arial;"><button style="text-align: center; background-color: #242826; line-height:50px; color: #fff; font-size: 24px; text-decoration: none;" onclick='startVideos()'><?php echo $playButtonText;?></button></div></div>
      <div id="player" style="display: none;"></div>
      <?php }  else { ?>
      <div id="player" style="display: block;"></div>
      <?php } ?>

       
       <noscript><?php
       echo '<iframe width="' . $iframeWidth . '" height="' . $iframeHeight . '" src="https://www.youtube.com/embed/' . $videoID . '?loop=0&showinfo=1&theme=dark&color=red&controls=1&modestbranding=1&start=0&fs=1&iv_load_policy=1&wmode=transparent&rel=0' . $playlist . '" frameborder="0" allowfullscreen></iframe>';
        ?></noscript>

<div id="skipButton" style="display: none; z-index: 200; position: relative; margin-top: -150px; left: <?php echo $iframeWidth -178?>px; width: 175px; height: 50px; background-color: #242826; border: 1px solid #fff; text-align: center; border-radius: 4px; font-family: Arial;">
<button style="text-align: center; background-color: #242826; line-height:50px; color: #fff; font-size: 24px; text-decoration: none;" onclick='nextVideo()'><?php echo $skipButtonText;?></button></div>
<div id="adLinkText" style="display: none; z-index: 250; position: relative; margin-top: -<?php echo $iframeHeight - 100?>px; right: -10px;"><a style="background-color: #000; color: #fff; padding: 2px;" href="<?php echo $adLinkURL?>" target="_blank"><?php echo $adLinkText?></a>
</div>
<?php
	} else {
		echo '<iframe width="' . $iframeWidth . '" height="' . $iframeHeight . '" src="https://www.youtube.com/embed/' . $videoID . '?loop=0&showinfo=1&theme=dark&color=red&controls=1&modestbranding=1&start=0&fs=1&iv_load_policy=1&wmode=transparent&rel=0' . $playlist . '" frameborder="0" allowfullscreen></iframe>';
	}
}
function showPlaylist() {
	global $playlistURL;
	global $titleStyle;
	global $playlistStyle;
	global $urlStyle;
	global $tableColumnWidth;
	global $tableColumns;
	global $page;
	global $videoID;
	global $items;
	global $col;
	global $itemcount;
	global $backupPlaylistURL;
	global $videoTitle;
	global $videoDescription;
	global $longDesc;
	global $playlistLongDesc;
        global $playListID;
        global $notFound;
	$col = 0;
	$itemcount = 0;
	// read feed
	$jsondata = @file_get_contents ( locateFeed ( $playlistURL ) );
	$json = json_decode ( $jsondata, TRUE );

	if ($json === false) {
		echo "Failed loading JSON\n";
	}
	$tableWidth = $tableColumnWidth * $tableColumns;
	echo '<table width="' . $tableWidth . '" border="0" cellpadding="0" callspacing="0">';

	// iterate over entries in feed
	foreach ( $json ['items'] as $entry ) {
		processJSON ( $entry );
	}
	if ($itemcount < $items && $itemcount > 0) {
		$jsondata = @file_get_contents ( locateFeed ( $backupPlaylistURL ) );
		$backupjson = json_decode ( $jsondata, TRUE );
		if ($backupjson === false) {
			echo "Failed loading JSON\n";
		}
		foreach ( $backupjson ['items'] as $entry ) {
			processJSON ( $entry );
			if ($itemcount >= $items)
				break;
		}
	}

	if ($itemcount < $items && $itemcount > 0)
		echo '</tr>';

	echo '<tr><td colspan="' . $tableColumns . '">';
	if (! $itemcount) {
		echo '<div style="' . $titleStyle . '">'.$notFound.'</div></td></tr>';
		$jsondata = @file_get_contents ( locateFeed ( $backupPlaylistURL ) );
		$backupjson = json_decode ( $jsondata, TRUE );
		if ($backupjson === false) {
			echo "Failed loading JSON\n";
		}
		foreach ( $backupjson ['items'] as $entry ) {
			processJSON ( $entry );
			if ($itemcount >= $items)
				break;
		}
		if ($col > 0)
			echo '</tr>';

		$itemcount = 0;
		echo '<tr><td colspan="' . $tableColumns . '">';
	}

	echo '<div style="' . $urlStyle . '">';
	if ($json ['prevPageToken']) {
		echo '<a href=' . getCurrentURL () . '?list='.$playListID.'&p=' . $json ['prevPageToken'] . ' style="' . $urlStyle . '">&lt; Previous</a> ';
	}

	if ($json ['nextPageToken']) {
		echo ' <a href=' . getCurrentURL () . '?list='.$playListID.'&p=' . $json ['nextPageToken'] . ' style="' . $urlStyle . '">Next &gt;</a>';
	}
	echo '</div></td></tr></table>';
	if ($longDesc) {
		if ($videoDescription)
			$playlistLongDesc = $videoDescription . "\r\n\r\n" . $playlistLongDesc;
		echo "<div style='" . $urlStyle . "' align=center>Page Description (No Links)<br><textarea rows=5 cols=40>" . $playlistLongDesc . "</textarea><br>Page Description (Links)<br><textarea rows=5 cols=40>" . plain_url_to_link ( $playlistLongDesc ) . "</textarea></div>";
	}
}
function getVideoInfo() {
	global $videoDescription;
	global $simpleDescription;
	global $videoTitle;
	global $videoURL;
	global $videoThumbnail;
	global $youtubeWatch;
	global $youtubeMeta;
	global $videoID;
	global $longDesc;
	global $longDescInfo;
        global $titleParam;
      global $videoCC;
      global $closedCaption;
	$youtubeMeta = get_meta_tags ( locateFeed ( $youtubeWatch ) );
	if ($youtubeMeta ['keywords']) {
		$keywords = explode ( ',', preg_replace ( "/[^A-Za-z0-9,]/", "", preg_replace ( "/\([^)]+\)/", "", $youtubeMeta ['keywords'] ) ) );
		$hashtags = '';
		for($i = 0; $i < count ( $keywords ); $i ++) {
			if ($keywords [$i])
				$hashtags .= '#' . $keywords [$i] . ' ';
		}
	}

	if (! $videoDescription) {

		$jsondata = @file_get_contents ( locateFeed ( $videoURL ) );
		$json = json_decode ( $jsondata, TRUE );
		$videoDescription = $json ['items'] [0] ['snippet'] ['description'];
		$videoTitle = $json ['items'] [0] ['snippet'] ['title'];
		// echo "<pre>".print_r($json['items'][0]['snippet']).'</pre>';
		$videoThumbnail = $json ['items'] [0] ['snippet'] ['thumbnails'] ['medium'] ['url'];
	}

	if ($longDesc) {
		$simpleDescription = "$videoTitle\r\n" . getCurrentURL () . '?'.$titleParam.'=' . seoTitle ( $videoTitle ) . '&v=' . $videoID . "\r\n" . $hashtags;
		$videoDescription = "$videoTitle\r\n\r\n" . getCurrentURL () . '?'.$titleParam.'=' . seoTitle ( $videoTitle ) . '&v=' . $videoID . "\r\n\r\n" . $videoDescription . "\r\n\r\n" . $hashtags;
		$longDescInfo = "Title:\r\n" . $videoTitle . "\r\n\r\nKeywords:\r\n" . $youtubeMeta ['keywords'] . "\r\n\r\nURL:\r\n" . getCurrentURL () . '?'.$titleParam.'=' . seoTitle ( $videoTitle ) . '&v=' . $videoID;
	}

  $closedCaption = @file_get_contents ( locateFeed ( $videoCC ) );

	return;
}

function showCC ( $nodiv ) {
      global $closedCaption;
      global $ccStyle;

      if (!$nodiv)
         echo '<div style="' . $ccStyle . '">';
      $xml = @simplexml_load_string ($closedCaption);
      for ($i=0;$i<count($xml->text);$i++) {
            echo str_replace("*","<br>",$xml->text[$i]);
            if (substr($xml->text[$i], -1)=='?' || substr($xml->text[$i], -1)=='.' || substr($xml->text[$i], -1)=='!') {
                  echo "<br><br>\n\n";
            }
      }
      if (!$nodiv)
         echo '</div>';
}

function showMetatags() {
	global $videoDescription;
	global $videoTitle;
	global $siteName;
	global $twitterName;
	global $videoThumbnail;
	global $videoID;
	global $youtube_image_path;
	global $youtube_image_url;
	global $youtubeMeta;
        global $playListID;
        global $titleParam;
	$metaDescription = htmlentities ( tokenTruncate ( plain_url_to_link ( $videoDescription, 1 ), 300 ) );
	$metaTitle = htmlentities ( tokenTruncate ( plain_url_to_link ( $videoTitle, 1 ), 175 ) );
	$currentURL = getCurrentURL () . '?'.$titleParam.'=' . seoTitle ( $videoTitle ) . '&list='.$playListID.'&v=' . $videoID;
	$cachedIMG = showImage ( $videoTitle, $videoID, $videoThumbnail );

	if ($youtubeMeta ['keywords']) {
		echo '<meta name="keywords" content="' . $youtubeMeta ['keywords'] . '" />';
	}

	echo '
<link rel="canonical" href="' . $currentURL . '" />
<link rel="image_src" href="' . $cachedIMG . '" />
<meta name="description" content="' . $metaDescription . '" />
<meta property="og:title" content="' . $metaTitle . '"/>
<meta property="og:description" content="' . $metaDescription . '" />
<meta property="og:url" content="' . $currentURL . '"/>
<meta property="og:site_name" content="' . $siteName . '"/>
<meta property="og:image" content="' . $cachedIMG . '" />
<meta property="og:image:width" content="360" />
<meta property="og:image:height" content="180" />
<meta property="og:type" content="article"/>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="' . $twitterName . '">
<meta name="twitter:creator" content="' . $twitterName . '">
<meta name="twitter:title" content="' . $videoTitle . '">
<meta name="twitter:description" content="' . $metaDescription . '">
<meta name="twitter:image:src" content="' . $cachedIMG . '">
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Article",
  "name" : "' . $metaTitle . '",
  "author" : {
    "@type" : "Person",
    "name" : "' . $siteName . '"
  },
  "image" : "' . $cachedIMG . '",
  "thumbnailURL" : "' . $cachedIMG . '",
  "articleBody" : "' . htmlentities ( $videoDescription ) . '",
  "description" : "' . $metaDescription . '",
  "url" : "' . $currentURL . '",
  "publisher" : {
    "@type" : "Organization",
    "name" : "' . $siteName . '"
  }
}
</script>
';
}

function showDescCC() {
        global $descriptionStyle;
        global $postHTML;
        global $preHTML;
        global $midHTML;
        echo '<div style="' . $descriptionStyle . '">';
        echo $preHTML;
        showDescription( 1 );
        echo $midHTML;
        showCC( 1 );
        echo $postHTML;
        echo '</div>';
}

function showDescription($nodiv) {
	global $videoDescription;
	global $simpleDescription;
	global $titleStyle;
	global $descriptionStyle;
	global $urlStyle;
	global $longDesc;
	global $longDescInfo;
        if (!$nodiv)
	   echo '<div style="' . $descriptionStyle . '">';
	// If you set longdesc=1 as a parameter in the url, then this will display a
	// description that includes the title, URL, description WITH hashtags in a textarea
	// for easy cutting and pasting on your social network accounts.
	if ($longDesc)
		echo "<div align=center>Video Info<br><textarea rows=5 cols=40>" . $longDescInfo . "</textarea><br>Simple Description<br><textarea rows=5 cols=40>".$simpleDescription."</textarea><br>Video Description (No Links)<br><textarea rows=5 cols=40>" . $videoDescription . "</textarea><br>Video Description (Links)<br><textarea rows=5 cols=40>" . plain_url_to_link ( $videoDescription ) . "</textarea><br><a href=?longdesc=off>Disable Long Descriptions</a></div>";
	else
		echo str_replace ( "\n", "<br>", plain_url_to_link ( $videoDescription ) );
        if (!$nodiv)
	   echo '</div>';
}
function showTitle() {
	global $videoTitle;
	global $titleStyle;

	echo '<h1 style="' . $titleStyle . '">' . str_replace ( "\n", "<br>", htmlentities ( $videoTitle ) ) . '</h1>';
}
function plain_url_to_link($string, $remove = 0) {
	global $longDesc;
	if ($remove)
		return preg_replace ( '%(https?|ftp)://([-A-Z0-9./_*?&;=#]+)%i', 'http://...', $string );
	if (! $longDesc)
		$args = 'target="blank" rel="nofollow" ';

	return preg_replace ( '%(https?|ftp)://([-A-Z0-9./_*?&;=#]+)%i', '<a ' . $args . 'href="$0">$0</a>', $string );
}
function tokenTruncate($string, $your_desired_width) {
	$parts = preg_split ( '/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE );
	$parts_count = count ( $parts );

	$length = 0;
	$last_part = 0;
	for(; $last_part < $parts_count; ++ $last_part) {
		$length += strlen ( $parts [$last_part] );
		if ($length > $your_desired_width) {
			break;
		}
	}

	return implode ( array_slice ( $parts, 0, $last_part ) );
}
function firstPlaylistVideo() {
	global $playlistURL;
        global $videoID;
	$jsondata = @file_get_contents ( locateFeed ( $playlistURL ) );
                $backupjson = json_decode ( $jsondata, TRUE );
                if ($backupjson === false) {
                        echo "Failed loading JSON\n";
                }
                foreach ( $backupjson ['items'] as $entry ) {
                 $videoID = processJSON ( $entry,1  );
                                break;
                }
}

function processJSON($entry,$return=0) {
	global $col;
	global $itemcount;
	global $playlistURL;
	global $titleStyle;
	global $playlistStyle;
	global $urlStyle;
	global $tableColumnWidth;
	global $tableColumns;
	global $page;
	global $videoID;
	global $items;
	global $disableDescriptions;
	global $longDesc;
	global $playlistLongDesc;
        global $playListID;
        global $titleParam;
	$imageWidth = $tableColumnWidth -5;
	$imageHeight169 = floor ( $imageWidth * .5625 );
	$imageHeight43 = floor ( $imageWidth * .75 );
	$imageCrop = floor ( ($imageHeight169 - $imageHeight43) / 2 ) + 1;

	// get video thumbnail
	$thumbnail = $entry ['snippet'] ['thumbnails'] ['medium'] ['url'];
        
           $v = $entry ['snippet'] ['resourceId'] ['videoId'];

        if (!$v)
           $v = $entry ['id'] ['videoId'];

	$list = $playListID;
        if (!$v)
           $list = $entry ['id'] ['playlistId'] ;

	$urlTitle = seoTitle ( $entry ['snippet'] ['title'] );
	if ($col == 0)
		echo '<tr valign=top>';
	$col ++;
	$itemcount ++;
        if ($return)
           return $v;

        // to crop 4x3 thumbnails to 16x9 add:  top: ' . $imageCrop . 'px;
	echo '<td><article itemscope itemtype="http://schema.org/Article"><div style="width:' . $tableColumnWidth . 'px; padding-left: 10px;align=center"><center>
        <a href="' . getCurrentURL ( 2 ) . '?'.$titleParam.'=' . $urlTitle . '&list='.$list.'&v=' . $v . '&p=' . $page . '"><div style="position: relative; width: ' . $imageWidth . 'px; height: ' . $imageHeight169 . 'px; overflow: hidden;"><img alt="' . htmlentities ( tokenTruncate ( plain_url_to_link ( $entry->snippet->title, 1 ), 150 ) ) . '" style="position: absolute; left: 0" itemprop="image" src="' . showImage ( $entry ['snippet'] ['title'], $v, $thumbnail ) . '" width="' . $imageWidth . '"></div></a></center>
        <div style="'.$urlStyle.'"><a itemprop="url" href="' . getCurrentURL ( 2 ) . '?'.$titleParam.'=' . $urlTitle . '&list='.$list.'&v=' . $v . '&p=' . $page . '" style="' . $urlStyle . '"><span itemprop="name">' . $entry ['snippet'] ['title'] . '</span></a></div>';

	if (! $disableDescriptions) {
		echo '<div itemprop="description" style="' . $playlistStyle . '">' . tokenTruncate ( plain_url_to_link ( $entry ['snippet'] ['description'], 1 ), $tableColumnWidth * 2 ) . '</div>';
	}
	if ($longDesc) {
		$playlistLongDesc.= $entry ['snippet'] ['title'] . "\r\n\r\n" . getCurrentURL ( 2 ) . '?'.$titleParam.'=' . $urlTitle . '&v=' . $v . "\r\n\r\n" . $entry ['snippet'] ['description'] . "\r\n\r\n";
	}
	echo '</div></article></td>';
	if ($col >= $tableColumns) {
		$col = 0;
		echo '</tr>';
	}
}
function locateFeed($feedURL) {
	global $feed_path;
	global $disableCache;
	global $refresh;
	$filename = hash ( 'sha256', $feedURL );
	$returnPath = $feedURL;
	if (! $disableCache) {
		$returnPath = $feed_path . $filename;
		if (@filemtime ( $returnPath ) < time () - $refresh) {
		$feed = file_get_contents ( $feedURL );
			if (! @file_put_contents ( $returnPath, $feed )) {
				$returnPath = $feedURL;
				$disableCache = 1;
			}
		}
	}

	return $returnPath;
}
function showImage($vTitle, $vID, $imgURL) {
	global $youtube_image_uri;
	global $youtube_image_path;
	global $disableCache;
	global $refresh;

	$imagename = seoTitle ( $vTitle ) . '-' . $vID . '.jpg';
	$returnURL = $imgURL;
	if (! $disableCache) {
		$returnURL = getCurrentURL ( 1 ) . $youtube_image_uri . $imagename;
		if (@filemtime ( $youtube_image_path . $imagename ) < time () - $refresh) {
			$image = @file_get_contents ( $imgURL );
			if (! @file_put_contents ( $youtube_image_path . $imagename, $image )) {
                                $returnURL = $imgURL;
				$disableCache = 1;
			}
		}
	}

	return $returnURL;
}
function seoTitle($title) {
	return strtolower ( preg_replace ( '/\s+/', '-', preg_replace ( '/[^a-z\d ]+/i', '', str_replace ( '-', ' ', $title ) ) ) );
}
function getCurrentURL($base = 0) {
        global $disable_port;
	global $videoPage;
	$currentURL = (@$_SERVER ["HTTPS"] == "on") ? "https://" : "http://";
	$currentURL .= $_SERVER ["HTTP_HOST"];

	if ($_SERVER ["SERVER_PORT"] != "80" && $_SERVER ["SERVER_PORT"] != "443" && $disable_port!=1) {
		$currentURL .= ":" . $_SERVER ["SERVER_PORT"];
	}
	if (! $base)
		$currentURL .= $_SERVER ["SCRIPT_NAME"];
        if ($base==2 && $videoPage)
                $currentURL .= $videoPage;

	return $currentURL;
}
?>
