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

	// Set Styles in jos-styles.css

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
  // $skipButtonText sets the text of the skip button
  // for playlists that update relative to the video being watched set relativePlaylist=1
  // Safe Search settings can be none,moderate,strict
  $iframeWidth=980;
  $iframeHeight=551;
  $playListDescLen=150;
  $items=6;
  $autoplay=1;
  $playAd=1;
  $skipAdTimer=5;
  $$skipButtonText="Skip Ad&nbsp;&nbsp; &#x27a9;";
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
error_reporting( E_ERROR );

if (!class_exists( 'RBTJ_YT_Plugin')) {
	class RBTJ_YT_Plugin {
		public $adList;
		public $adLinkText;
		public $autoplay;
		public $backupPlayListID;
		public $backupPlaylistURL;
		public $closedCaption;
		public $defaultPage;
		public $defaultVideo;
		public $disableCache;
		public $disableDescriptions;
		public $disable_port;
		public $feed_path;
		public $googleAPIKey;
		public $iframeHeight;
		public $iframeWidth;
		public $itemcount;
		public $items;
		public $keywords;
		public $lastPage;
		public $lastPageBase;
		public $longDesc;
		public $longDescInfo;
		public $midHTML;
		public $notFound;
		public $page;
		public $pageToken;
		public $playAd;
		public $playButtonText;
		public $playListDescLen;
		public $playListID;
		public $playlistLongDesc;
		public $playListType;
		public $playlistURL;
		public $postHTML;
		public $preHTML;
		public $refresh;
		public $relativePlaylist;
		public $safeSearch;
		public $siteName;
		public $simpleDescription;
		public $skipAdTimer;
		public $skipButtonText;
		public $titleParam;
		public $twitterName;
		public $videoPage;
		public $videoID;
		public $videoTitle;
		public $videoThumbnail;
		public $videoDescription;
		public $videoCC;
		public $videoURL;
		public $videoImage;
		public $youtubeWatch;
		public $youtubeMeta;
		public $youtube_image_path;
		public $youtube_image_uri;

		function getConfigs() {

		  include_once 'config.php';

		}

		function showVideo() {
			$shortcodeOutput = '';

			$videoWidth = '';
			$videoHeight = '';

			if ( $this->iframeWidth > 0 )
			 	$videoWidth = ' width="' . $this->iframeWidth . '"';

			if ( $this->iframeHeight > 0 )
			 	$videoHeight = ' height="' . $this->iframeHeight . '"';

		  if ($this->playAd && count($this->adList)) {
		    $adNumber = rand(0, count($this->adList) -1);
		    $adLinkURL = $this->adList[$adNumber]['advertiserURL'];
		    $adVideoID = $this->adList[$adNumber]['videoID'];
		  }

			$shortcodeOutput .= '<SCRIPT LANGUAGE="JavaScript">document.cookie="videoID=' . $this->videoID . '"</script>';

			if ($this->autoplay == 1 || ($this->autoplay == 2 && ! $_GET ['v'] && ! $_GET ['p']))
				$playlist = '&listType=playlist&list=' . $this->playListID . '&autoplay=1&mute=1';

			if ($this->playAd) {

				$getURL = $this->getCurrentURL();
				$skipTimer = $this->skipAdTimer*1000;

				$shortcodeOutput .= <<<js
			  <script>
					var timeoutID;

				  // create youtube player
				  var tag = document.createElement('script');

		      tag.src = "https://www.youtube.com/iframe_api";
		      var firstScriptTag = document.getElementsByTagName('script')[0];
		      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			    var autostart = $this->autoplay;
			    var videocount=0;
			    var player;
			    function onYouTubePlayerAPIReady() {
			        player = new YT.Player('player', {
			          height: '$this->iframeHeight',
			          width: '$this->iframeWidth',
			          videoId: '$adVideoID',
			          playerVars: {
			            'controls': '1',
			            'iv_load_policy': '3',
			            'showinfo': '0',
			            'origin': '$getURL',
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
			        timeoutID = window.setTimeout(showskipButton, $skipTimer);
			      }
			    }

			    // when video ends
			    function onPlayerStateChange(event) {
			      if(event.data === 0) {
	            if (videocount<1){
	              nextVideo();
	              videocount++;
	            } else {
	              player.cueVideoById('$this->videoID');
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
		            player.loadVideoById('$this->videoID');
		      }
				</script>
js;

	      if ($this->autoplay == 0) {

					$playMarginTop = $this->iframeHeight / 2 + 25 . 'px';
					$playLeft = $this->iframeWidth / 2 - 88 . 'px';
					$width = $this->iframeWidth . 'px';
					$height = $this->iframeHeight . 'px';

	      	$cachedIMG = $this->showImage ( $this->videoTitle.'-thumbnail', $this->videoID, $this->videoThumbnail );

					$shortcodeOutput .= <<<html
					<div class="rbtj_yt_video_container" style="width:100%; height:auto;">
			      <div id="videoThumb">
							<img onclick="startVideos()" src="$cachedIMG" >
							<div
								style="
									display: block;
									z-index: 200;
									position: relative;
									margin-top: -$playMarginTop;
									left: $playLeft;
									width: 175px;
									height: 50px;
									background-color: #242826;
									border: 1px solid #fff;
									text-align: center;
									border-radius: 4px;
									font-family: Arial;
								"
							>
								<button
									style="
										text-align: center;
										background-color: #242826;
										line-height:50px;
										color: #fff;
										font-size: 24px;
										text-decoration: none;
									"
									onclick='startVideos()'
								>
									$this->playButtonText
								</button>
							</div>
						</div>
			      <div id="player" style="display: none;"></div>
html;
		  	}  else {
		      $shortcodeOutput .= '<div id="player" style="display: block;"></div>';
		    }

				$skipLeft = $this->iframeWidth - 178 . 'px';
				$skipMarginTop = $this->iframeHeight - 100 . 'px';
				$shortcodeOutput .= <<<html
	      <noscript>
	      	'<iframe'. $videoWidth . $videoHeight .' allow="autoplay" src="https://www.youtube.com/embed/' . $this->videoID . '?loop=0&showinfo=1&theme=dark&color=red&controls=1&modestbranding=1&start=0&fs=1&iv_load_policy=1&wmode=transparent&rel=0' . $playlist . '" frameborder="0" allowfullscreen></iframe>';
				</noscript>

				<div
					id="skipButton"
					style="
						display: none;
						z-index: 200;
						position: relative;
						margin-top: -150px;
						left: $skipLeft;
						width: 175px; height: 50px;
						background-color: #242826;
						border: 1px solid #fff;
						text-align: center;
						border-radius: 4px;
						font-family: Arial;
					"
				>
					<button
						style="
							text-align: center;
							background-color: #242826;
							line-height:50px;
							color: #fff;
							font-size: 24px;
							text-decoration: none;
						"
						onclick='nextVideo()'
					>
						$this->skipButtonText;
					</button>
				</div>
				<div
					id="adLinkText"
					style="
						display: none;
						z-index: 250;
						position: relative;
						margin-top: -$skipMarginTop;
						right: -10px;
					"
				>
					<a
						style="
							background-color: #000;
							color: #fff;
							padding: 2px;
						"
						href="$adLinkURL"
						target="_blank"
					>
						$this->adLinkText
					</a>
				</div>
			</div>
html;
			} else {
				if ( $this->videoID == "playlist" )
					$dstURL = 'https://www.youtube.com/embed/videoseries?list=' . $this->playListID . '&';
				else
					$dstURL = 'https://www.youtube.com/embed/' . $this->videoID . '?';

				$shortcodeOutput .= '<iframe'. $videoWidth . $videoHeight .' allow="autoplay" src="' . $dstURL . 'loop=0&showinfo=1&theme=dark&color=red&controls=1&modestbranding=1&start=0&fs=1&iv_load_policy=1&wmode=transparent&rel=0' . $playlist . '" frameborder="0" allowfullscreen></iframe>';
			}
			return $shortcodeOutput;
		}

		function showPlaylist($attr=0) {

			$this->setArgs($attr);

			$shortcodeOutput = '';
			$this->itemcount = 0;
			// read feed

			$jsondata = @file_get_contents ( $this->locateFeed ( $this->playlistURL ) );
			$json = json_decode ( $jsondata, TRUE );
			if ($json === false) {
				$shortcodeOutput .= "Failed loading JSON\n";
			}

			$shortcodeOutput .= '<div class="rbtj_yt_pl_container" >
														<div class="rbtj_yt_pl_row">';


			// iterate over entries in feed
			foreach ( $json ['items'] as $entry ) {
				$shortcodeOutput .= $this->processJSON ( $entry );
			}

			if ($this->itemcount < $this->items && $this->itemcount > 0) {
				$jsondata = @file_get_contents ( $this->locateFeed ( $this->backupPlaylistURL ) );
				$backupjson = json_decode ( $jsondata, TRUE );
				if ($backupjson === false) {
					$shortcodeOutput .= "Failed loading JSON\n";
				}
				foreach ( $backupjson ['items'] as $entry ) {
					$shortcodeOutput .= $this->processJSON ( $entry );
					if ($this->itemcount >= $this->items) {
						break;
					}
				}
			}

			if ($this->itemcount < $this->items && $this->itemcount > 0)
				$shortcodeOutput .= '</div>';

			if (! $this->itemcount) {
				$shortcodeOutput .= '<div>'.$this->notFound.'</div>';
				$jsondata = @file_get_contents ( $this->locateFeed ( $this->backupPlaylistURL ) );
				$backupjson = json_decode ( $jsondata, TRUE );
				if ($backupjson === false) {
					$shortcodeOutput .= "Failed loading JSON\n";
				}
				foreach ( $backupjson ['items'] as $entry ) {
					$shortcodeOutput .= $this->processJSON ( $entry );
					if ($this->itemcount >= $this->items)
						break;
				}

				$this->itemcount = 0;
			}

			$shortcodeOutput .= '	</div> <!-- end pl-row -->
														<div class="rbtj_yt_pl_buttons">';
			if ($json ['prevPageToken']) {
				$shortcodeOutput .= '<a class="rbtj_yt_pl_btn" href=' . $this->getCurrentURL ( ) . '?list='.$this->playListID.'&p=' . $json ['prevPageToken'] . '>&lt; Previous</a> ';
			}

			if ($json ['nextPageToken']) {
				$shortcodeOutput .= ' <a class="rbtj_yt_pl_btn" href=' . $this->getCurrentURL ( 1 ) . '?list='.$this->playListID.'&p=' . $json ['nextPageToken'] . '>Next &gt;</a>';
			}
			$shortcodeOutput .= '		</div> <!-- end pl-buttons -->
														</div> <!-- end pl-container -->';

			if ($this->longDesc) {
				if ($this->videoDescription)
					$this->playlistLongDesc = $this->videoDescription . "\r\n\r\n" . $this->playlistLongDesc;
				$shortcodeOutput .= "<div>Page Description (No Links)
															<br>
															<textarea id='page-desc-nolinks' onclick='copyText(this.id)' rows=5 cols=40 >" . $this->playlistLongDesc . "</textarea>
															<br>Page Description (Links)
														 	<br>
														 	<textarea id='page-desc-links' onclick='copyText(this.id)' rows=5 cols=40 >" . $this->plain_url_to_link ( $this->playlistLongDesc ) . "</textarea>
														 </div>";
			}

			return $shortcodeOutput;
		}

		function setPlayListURL($playListID, $items) {
			$this->playlistURL = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=' . $playListID . '&maxResults=' . $items . $this->pageToken . '&key=' . $this->googleAPIKey;
		}

		function setArgs($attr) {
			if ( $attr != 0 ) {
				$args = shortcode_atts( array(
					'play_list_id' => '',
					'items' => '',
					'default_video' => '',
					'video_page' => '',
					'autoplay' => '',
					'iframe_width' => '',
					'iframe_height' => '',
					'disable_descriptions' => '',
					'refresh' => ''
				), $attr );

			  // Set your playlist and video IDs
				if ( $args['play_list_id'] != '' ) {
					$this->playListID = $args['play_list_id'];
					$this->setPlayListURL($this->playListID, $this->items);
				}
				if ( $args['default_video'] != '' )
					$this->defaultVideo = $args['default_video'];

				if ( $args['iframe_width'] != '' )
					$this->iframeWidth = $args['iframe_width'];

				if ( $args['iframe_height'] != '' )
					$this->iframeHeight = $args['iframe_height'];

				if ( $args['disable_descriptions'] != '' )
					$this->disableDescriptions = $args['disable_descriptions'];

				if ( $args['items'] != '' ) {
					$this->items = $args['items'];
					$this->setPlayListURL($this->playListID, $this->items);
				}

				if ( $args['video_page'] != '' )
					$this->videoPage = $args['video_page'];

				if ( $args['autoplay'] != '' )
					$this->autoplay = $args['autoplay'];

				if ( $args['refresh'] != '' )
					$this->refresh = intval($args['refresh']);
			}
		}

		function getVideoInfo($attr=0) {
			$shortcodeOutput = '';

      if ($attr == 'startup') {
			} else
			$this->setArgs($attr);

		  // Check to see if page was redirected and video ID was lost. example: auto-switching to mobile pages
		  // default page name, you should never change this unless your default page name is something other then
		  // index.html and if your using this with Muse it is index.html
		  $this->defaultPage="index.html";
		  $this->lastPage=parse_url($_SERVER['HTTP_REFERER']);
		  $this->lastPageBase=basename($this->lastPage['path']);
		  parse_str($this->lastPage["query"],$lastQuery);
		  if ($this->lastPageBase=='')
		  	$this->lastPageBase=$this->defaultPage;
		  if ($this->lastPageBase==basename($_SERVER["SCRIPT_NAME"]) && (($_GET["list"]=='' && $lastQuery["list"]) || ($_GET["v"]=='' && $lastQuery["v"]))){
		          if ($_GET["v"]=='' && $lastQuery["v"])
		  	   $_GET["v"]=$lastQuery["v"];
		          if ($_GET["list"]=='' && $lastQuery["list"])
		             $_GET["list"]=$lastQuery["list"];
		  	$shortcodeOutput .= '<SCRIPT LANGUAGE="JavaScript">document.cookie="redirected=true"</script>';
		  	$_COOKIE["redirected"]="true";
		  } // end of page redirect test


		  if ($_GET ['error_page']) {
		  	list ( , $query ) = explode ( '?', $_SERVER ['REQUEST_URI'] );
		  	parse_str ( $query, $query_array );
		  	$_GET ['v'] = $query_array ['v'];
		  }

		  // Get video ID from url or set to default if no ID
		  $this->videoID = $this->defaultVideo;
		  if (isset ( $_GET ['v'] )) {
		  	$this->videoID = strip_tags ( $_GET ['v'] );
		  }
		  if (isset ( $_GET ['list'] )) {
		    $this->playListID = strip_tags ( $_GET ['list'] );
		  }

		  if ($_GET ['longdesc'] == 'on') {
		  	$this->longDesc = 1;
		  }

		  if (! $_GET ['v'] && isset ( $_GET ['p'] ) && isset ( $_COOKIE ['videoID'] )) {
		  	$this->videoID = $_COOKIE ['videoID'];
		  }

		  if ($_GET ['p']) {
		  	$this->pageToken = '&pageToken=' . $_GET ['p'];
		  	$this->page = $_GET ['p'];
		  }

		  // Skip Ad Timer
		  if(!$this->skipAdTimer) $this->skipAdTimer = 5;

		  // Skip Ad Button Text
		  if(!$this->skipButtonText) $this->skipButtonText = 'Skip Ad&nbsp;&nbsp; &#x27a9;';

		  // Play Button Text
		  if(!$this->playButtonText) $this->playButtonText = 'Play';

		  if ($this->adList) $this->adList = json_decode($this->adList, true);

		  // set feed URLs

			$this->setPlayListURL($this->playListID, $this->items);

		  $this->backupPlaylistURL = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=' . $this->backupPlayListID . '&maxResults=' . $this->items . '&key=' . $this->googleAPIKey;

		  $this->titleParam='t';
		  if ($this->relativePlaylist)
		     $this->titleParam='q';

		  if (!$_GET['q'] && substr($this->playListID,0,6)=='QUERY:')
		     $_GET['q'] = substr($this->playListID,6,strlen($this->playListID));

		  if ($this->relativePlaylist && !isset($_GET['q']) && !isset($_GET['list']) && isset($_GET['v'])){
		     $_GET['q'] = $this->seoTitle ( $this->videoTitle );
		  }

		  if (isset ($_GET['q'])){
		     $this->playListID='QUERY:'.urlencode($_GET['q']);
		     $this->playlistURL = 'https://www.googleapis.com/youtube/v3/search?type=video&safeSearch='.$this->safeSearch.'&key=' . $this->googleAPIKey .'&part=snippet&maxResults=' . $this->items . $this->pageToken . '&q='.urlencode($_GET['q']);
		  }


		  if ($this->videoID == 'playlist' || (!$this->defaultVideo && !$this->videoID))
		     $this->firstPlaylistVideo();

		  $this->videoURL = 'https://www.googleapis.com/youtube/v3/videos?part=snippet&id=' . $this->videoID . '&key=' . $this->googleAPIKey;
		  $this->youtubeWatch = 'https://www.youtube.com/watch?v=' . $this->videoID;
		  $this->videoCC = 'http://video.google.com/timedtext?lang=en&v=' . $this->videoID;

			$this->youtubeMeta = get_meta_tags ( $this->locateFeed ( $this->youtubeWatch ) );
			if ($this->youtubeMeta ['keywords']) {
				$this->keywords = explode ( ',', preg_replace ( "/[^A-Za-z0-9,]/", "", preg_replace ( "/\([^)]+\)/", "", $this->youtubeMeta ['keywords'] ) ) );
				$hashtags = '';
				for($i = 0; $i < count ( $this->keywords ); $i ++) {
					if ($this->keywords [$i])
						$hashtags .= '#' . $this->keywords [$i] . ' ';
				}
			}

			//if (! $this->videoDescription) {

				$jsondata = @file_get_contents ( $this->locateFeed ( $this->videoURL ) );
				$json = json_decode ( $jsondata, TRUE );
				$this->videoDescription = $json ['items'] [0] ['snippet'] ['description'];
				$this->videoTitle = $json ['items'] [0] ['snippet'] ['title'];
				// $shortcodeOutput .= "<pre>".print_r($json['items'][0]['snippet']).'</pre>';
				$this->videoThumbnail = $json ['items'] [0] ['snippet'] ['thumbnails'] ['medium'] ['url'];
				$this->videoImage = $json ['items'] [0] ['snippet'] ['thumbnails'] ['maxres'] ['url'];
			//}

			if ($this->longDesc) {
				$this->simpleDescription = "$this->videoTitle\r\n" . $this->getCurrentURL () . '?'.$this->titleParam.'=' . $this->seoTitle ( $this->videoTitle ) . '&v=' . $this->videoID . "\r\n" . $hashtags;
				$this->videoDescription = "$this->videoTitle\r\n\r\n" . $this->getCurrentURL () . '?'.$this->titleParam.'=' . $this->seoTitle ( $this->videoTitle ) . '&v=' . $this->videoID . "\r\n\r\n" . $this->videoDescription . "\r\n\r\n" . $hashtags;
				$this->longDescInfo = "Title:\r\n" . $this->videoTitle . "\r\n\r\nKeywords:\r\n" . $this->youtubeMeta ['keywords'] . "\r\n\r\nURL:\r\n" . $this->getCurrentURL () . '?'.$this->titleParam.'=' . $this->seoTitle ( $this->videoTitle ) . '&v=' . $this->videoID;
			}

		  $this->closedCaption = @file_get_contents ( $this->locateFeed ( $this->videoCC ) );

			return $shortcodeOutput;
		}

		function showCC ( $nodiv ) {
			$functionOutput = '';

      if (!$nodiv)
        $functionOutput .= '<div>';
      $xml = @simplexml_load_string ($this->closedCaption);
      for ($i=0;$i<count($xml->text);$i++) {
        $functionOutput .= str_replace("*","<br>",$xml->text[$i]);
        if (substr($xml->text[$i], -1)=='?' || substr($xml->text[$i], -1)=='.' || substr($xml->text[$i], -1)=='!') {
          $functionOutput .= "<br><br>\n\n";
        }
      }
      if (!$nodiv)
      	$functionOutput .= '</div>';

			return $functionOutput;
		}

		function showMetatags() {
			$shortcodeOutput = '';
		  $metaDescription = htmlspecialchars ( $this->tokenTruncate ( $this->plain_url_to_link ( $this->videoDescription, 1 ), 300 ), ENT_QUOTES);

		  $metaTitle = htmlspecialchars ( $this->tokenTruncate ( $this->plain_url_to_link ( $this->videoTitle, 1 ), 175 ), ENT_QUOTES);

			$currentURL = $this->getCurrentURL () . '?'.$this->titleParam.'=' . $this->seoTitle ( $this->videoTitle ) . '&list='.$this->playListID.'&v=' . $this->videoID;

			$cachedIMG = $this->showImage ( $this->videoTitle.'-thumbnail', $this->videoID, $this->videoThumbnail );
			$largeCachedIMG = $this->showImage ( $this->videoTitle.'-large', $this->videoID, $this->videoImage );
			if ($this->youtubeMeta ['keywords']) {
				$shortcodeOutput .= '<meta name="keywords" content="' . $this->youtubeMeta ['keywords'] . '" />';
			}

			$shortcodeOutput .= '
				<script src="yt-integration/resources/js/yt-integration.js"></script>
				<link rel="canonical" href="' . $currentURL . '" />
				<link rel="image_src" href="' . $cachedIMG . '" />
				<meta name="description" content="' . $metaDescription . '" />
				<meta property="og:title" content="' . $metaTitle . '"/>
				<meta property="og:description" content="' . $metaDescription . '" />
				<meta property="og:url" content="' . $currentURL . '"/>
				<meta property="og:site_name" content="' . $this->siteName . '"/>
				<meta property="og:image" content="' . $largeCachedIMG . '" />
				<meta property="og:image:width" content="1280" />
				<meta property="og:image:height" content="720" />
				<meta property="og:type" content="article"/>
				<meta name="twitter:card" content="summary_large_image">
				<meta name="twitter:site" content="' . $this->twitterName . '">
				<meta name="twitter:creator" content="' . $this->twitterName . '">
				<meta name="twitter:title" content="' . $this->videoTitle . '">
				<meta name="twitter:description" content="' . $metaDescription . '">
				<meta name="twitter:image:src" content="' . $cachedIMG . '">
				<script type="application/ld+json">
					{
					  "@context" : "http://schema.org",
					  "@type" : "Article",
					  "name" : "' . $metaTitle . '",
					  "author" : {
					    "@type" : "Person",
					    "name" : "' . $this->siteName . '"
					  },
					  "image" : "' . $cachedIMG . '",
					  "thumbnailURL" : "' . $cachedIMG . '",
					  "articleBody" : "' . htmlspecialchars ( $this->videoDescription ) . '",
					  "description" : "' . $metaDescription . '",
					  "url" : "' . $currentURL . '",
					  "publisher" : {
					    "@type" : "Organization",
					    "name" : "' . $this->siteName . '"
					  }
					}
				</script>
				';
			return $shortcodeOutput;
		}

		function showDescCC() { //mory is not sure if this will be a shortcode or is called by other function
			$functionOutput = '';

		  $functionOutput .= '<div>';
		  $functionOutput .= $this->preHTML;
		  $this->showDescription( 1 );
		  $functionOutput .= $this->midHTML;
		  $this->showCC( 1 );
		  $functionOutput .= $this->postHTML;
		  $functionOutput .= '</div>';

			return $functionOutput;
		}

		function showDescription($nodiv=0) {
			$shortcodeOutput = '';

			if (!$nodiv)
			   $shortcodeOutput .= '<div class="rbtj_yt_video_desc">';
			// If you set longdesc=1 as a parameter in the url, then this will display a
			// description that includes the title, URL, description WITH hashtags in a textarea
			// for easy cutting and pasting on your social network accounts.
			if ($this->longDesc)
				$shortcodeOutput .= "
					<div>
						<img src=".$this->showImage ( $this->videoTitle.'-large', $this->videoID, $this->videoImage ).">
						<p>
							<br>Video Info
							<br><textarea id='vid-info' onclick='copyText(this.id)' rows=5 cols=40 >" . $this->longDescInfo . "</textarea>

							<br>Simple Description
							<br><textarea id='vid-desc-simp' onclick='copyText(this.id)' rows=5 cols=40 >" . $this->simpleDescription . "</textarea>

							<br>Video Description (No Links)
							<br><textarea id='vid-des-nolinks' onclick='copyText(this.id)' rows=5 cols=40 >" . $this->videoDescription . "</textarea>

							<br>Video Description (Links)
							<br><textarea id='vid-des-links' onclick='copyText(this.id)' rows=5 cols=40 >" . $this->plain_url_to_link ( $this->videoDescription ) . "</textarea>
						</p>
					</div>";
			else {
				$shortcodeOutput .= '<p>' . str_replace ( "\n", "<br>", $this->plain_url_to_link ( $this->videoDescription ) ) . '</p>';

				$currentURL = $this->getCurrentURL () . '?'.$this->titleParam.'=' . $this->seoTitle ( $this->videoTitle ) . '&list='.$this->playListID.'&v=' . $this->videoID .'&longdesc=on';
				$shortcodeOutput .= '<a href="'. $currentURL .'" rel="nofollow" style="display: block;width: 20px;height: 20px;"></a>';
			}

			if (!$nodiv)
			  $shortcodeOutput .= '</div>';

			return $shortcodeOutput;
		}

		function showTitle() {
			$shortcodeOutput = '';
			$shortcodeOutput .= '<h1>' . str_replace ( "\n", "<br>", htmlspecialchars ( $this->videoTitle ) ) . '</h1>';
			return $shortcodeOutput;
		}

		function plain_url_to_link($string, $remove = 0) {

			if ($remove)
				return preg_replace ( '%(https?|ftp)://([-A-Z0-9./_*?&;=#\%]+)%i', "$1".'//...', $string );
			if (! $this->longDesc)
				$args = 'target="blank" rel="nofollow" ';
			$string=preg_replace ( '%(https?|ftp)://([-A-Z0-9./_*?&;=#\%+]+)%i',"$0".' ',$string);
      preg_match_all ('%(https?|ftp)://([-A-Z0-9./_*?&;=#\%+]+)%i', $string, $matches);
			foreach ($matches[0] as $longword){
			        $linkName=$longword;
				if (strlen($longword)>10)
					$linkName=substr($longword,0,50).'...';
				$string = str_replace ($longword.' ',  '<a ' . $args . 'href="'.$longword.'">'.$linkName.'</a>' , $string);
			}

                        return $string;
			//return preg_replace ( '%(https?|ftp)://([-A-Z0-9./_*?&;=#\%]+)%i', '<a ' . $args . 'href="$0">'.substr("$0",0,20).'...</a>', $string );
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
			$functionOutput = '';

			$jsondata = @file_get_contents ( $this->locateFeed ( $this->playlistURL ) );
      $backupjson = json_decode ( $jsondata, TRUE );
      if ($backupjson === false) {
        $functionOutput .= "Failed loading JSON\n";
				return $functionOutput;
      }
      foreach ( $backupjson ['items'] as $entry ) {
      	$this->videoID = $this->processJSON ( $entry,1  );
        break;
      }
		}

		function processJSON($entry,$return=0) {

			$functionOutput = '';

			// get video thumbnail
			$thumbnail = $entry ['snippet'] ['thumbnails'] ['medium'] ['url'];

		           $v = $entry ['snippet'] ['resourceId'] ['videoId'];

		        if (!$v)
		           $v = $entry ['id'] ['videoId'];

			$list = $this->playListID;
		        if (!$v)
		           $list = $entry ['id'] ['playlistId'] ;

			$urlTitle = $this->seoTitle ( $entry ['snippet'] ['title'] );

			$this->itemcount ++;

      if ($return)
         return $v;

			$functionOutput .= '
					<article class="rbtj_yt_pl_item" itemscope itemtype="http://schema.org/Article">
	        		<a class="rbtj_yt_pl_item_img" href="' . $this->getCurrentURL ( 1 ) . '?'.$this->titleParam.'=' . $urlTitle . '&list='.$list.'&v=' . $v . '&p=' . $this->page . '">
								<img
									alt="' . htmlspecialchars ( $this->tokenTruncate ( $this->plain_url_to_link ( $entry ['snippet'] ['title'], 1 ), 150 ) ) . '"
									itemprop="image"
									src="' . $this->showImage ( $entry ['snippet'] ['title'].'-thumbnail', $v, $thumbnail ) . '"
								>
							</a>

								<a
									class="rbtj_yt_pl_item_title"
									itemprop="url"
									href="' . $this->getCurrentURL ( 1 ) . '?'.$this->titleParam.'=' . $urlTitle . '&list='.$list.'&v=' . $v . '&p=' . $this->page . '"
								>
									<span itemprop="name">' . $entry ['snippet'] ['title'] . '</span>
								</a>
							';

			if (! $this->disableDescriptions) {
				$functionOutput .= '
					<div itemprop="description" class="rbtj_yt_pl_item_desc">
						<p>'
							. $this->tokenTruncate ( $this->plain_url_to_link ( $entry ['snippet'] ['description'], 1 ), $this->playListDescLen ) .
						'</p>
					</div>';
			}
			if ($this->longDesc) {
				$this->playlistLongDesc.= $entry ['snippet'] ['title'] . "\r\n\r\n" . $this->getCurrentURL ( 1 ) . '?'.$this->titleParam.'=' . $urlTitle . '&v=' . $v . "\r\n\r\n" . $entry ['snippet'] ['description'] . "\r\n\r\n";
			}
			$functionOutput .= '
					</article>
			';

			return $functionOutput;
		}

		function locateFeed($feedURL) {
			$filename = hash ( 'sha256', $feedURL );
			$returnPath = $feedURL;
			if (! $this->disableCache) {
				$returnPath = $this->feed_path . $filename;
				$filetime = 0;
				$filesize = 0;
				if (file_exists ( $returnPath )){
        	$filetime = filemtime ( $returnPath );
					$filesize = filesize ( $returnPath );
				}

        if ($filetime < time () - $this->refresh || ($filesize < 1 && $filetime < time () - 3600 )) {
					$feed = file_get_contents ( $feedURL );
					if (strlen($feed)<1){
						touch ($returnPath, time () + ($this->refresh * 2));
						return  $returnPath;
					}
					if (! @file_put_contents ( $returnPath, $feed )) {
						$returnPath = $feedURL;
						$this->disableCache = 1;
					}
				}

			}

			return $returnPath;
		}

		function showImage($vTitle, $vID, $imgURL) {

			$imagename = $this->seoTitle ( $vTitle ) . '-' . $vID . '.jpg';
			$returnURL = $imgURL;
			if (! $this->disableCache) {
				$returnURL = $this->getCurrentURL ( 2 ) . $this->youtube_image_uri . $imagename;
				if (@filemtime ( $this->youtube_image_path . $imagename ) < time () - $this->refresh) {
					$image = @file_get_contents ( $imgURL );
					if (! @file_put_contents ( $this->youtube_image_path . $imagename, $image )) {
		                                $returnURL = $imgURL;
						$this->disableCache = 1;
					}
				}
			}

			return $returnURL;
		}

		function seoTitle($title) {
			return strtolower ( preg_replace ( '/\s+/', '-', preg_replace ( '/[^a-z\d ]+/i', '', str_replace ( '-', ' ', $title ) ) ) );
		}

		function getCurrentURL($base = 0) {

			$currentURL = (@$_SERVER ["HTTPS"] == "on") ? "https://" : "http://";

			$currentURL .= $_SERVER ["HTTP_HOST"];

			if ($_SERVER ["SERVER_PORT"] != "80" && $_SERVER ["SERVER_PORT"] != "443" && $this->disable_port!=1) {
				$currentURL .= ":" . $_SERVER ["SERVER_PORT"];
			}

      $url = $currentURL . $_SERVER ["REQUEST_URI"];

      $urlParts = parse_url($url);

			if ( $base == 2 ) {
				return $currentURL;
			} else {
				if ($base==1 && strlen($this->videoPage) > 0 ) {
		    $currentURL .= $this->videoPage;
			} else{
	      $currentURL .= $urlParts['path'];
	    }
		}

			return $currentURL;
		}
	}
}
?>
