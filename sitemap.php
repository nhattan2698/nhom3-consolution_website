<?php 
@define(_SCHEME_, $_SERVER['REQUEST_SCHEME']); @define(_SITEURL_, $_SERVER["SERVER_NAME"]); $baseUrl = _SCHEME_.'://'._SITEURL_.'/upload/';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="author" content="Lam Anh Tran (leagentran@gmail.com)" />
	<meta name="copyright" content="Lam Anh Tran (leagentran@gmail.com)" />
	<title>CREATING SITEMAP</title>
</head>
<style>
#link { color: white; display: block; font: 22px "Helvetica Neue", Helvetica, Arial, sans-serif; text-align: center; text-decoration: none; text-transform: uppercase; }
#link:hover { color: #CCCCCC }
#link, #link:hover { -webkit-transition: color 0.5s ease-out; -moz-transition: color 0.5s ease-out; -ms-transition: color 0.5s ease-out; -o-transition: color 0.5s ease-out; transition: color 0.5s ease-out; }
/** BEGIN CSS **/
body { background: #333333; }
@keyframes rotate-loading {
	0% { transform: rotate(0deg); -ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg); }
	100% { transform: rotate(360deg); -ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg); }
}
@-moz-keyframes rotate-loading {
	0% { transform: rotate(0deg); -ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg); }
	100% { transform: rotate(360deg); -ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg); }
}
@-webkit-keyframes rotate-loading {
	0% { transform: rotate(0deg); -ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg); }
	100% { transform: rotate(360deg); -ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg); }
}
@-o-keyframes rotate-loading {
	0% { transform: rotate(0deg); -ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg); }
	100% { transform: rotate(360deg); -ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg); }
}
@keyframes rotate-loading {
	0% { transform: rotate(0deg); -ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg); }
	100% { transform: rotate(360deg); -ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg); }
}
@-moz-keyframes rotate-loading {
	0% { transform: rotate(0deg); -ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg); }
	100% { transform: rotate(360deg); -ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg); }
}
@-webkit-keyframes rotate-loading {
	0% { transform: rotate(0deg); -ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg); }
	100% { transform: rotate(360deg); -ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg); }
}
@-o-keyframes rotate-loading {
	0% { transform: rotate(0deg); -ms-transform: rotate(0deg); -webkit-transform: rotate(0deg); -o-transform: rotate(0deg); -moz-transform: rotate(0deg); }
	100% { transform: rotate(360deg); -ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); -o-transform: rotate(360deg); -moz-transform: rotate(360deg); }
}
@keyframes loading-text-opacity {
	0% { opacity: 0 }
	20% { opacity: 0 }
	50% { opacity: 1 }
	100% { opacity: 0 }
}
@-moz-keyframes loading-text-opacity {
	0% { opacity: 0 }
	20% { opacity: 0 }
	50% { opacity: 1 }
	100% { opacity: 0 }
}
@-webkit-keyframes loading-text-opacity {
	0% { opacity: 0 }
	20% { opacity: 0 }
	50% { opacity: 1 }
	100% { opacity: 0 }
}
@-o-keyframes loading-text-opacity {
	0% { opacity: 0 }
	20% { opacity: 0 }
	50% { opacity: 1 }
	100% { opacity: 0 }
}
.loading-container, .loading { height: 180px; position: relative; width: 180px; border-radius: 100%; }
.loading-container { margin: 40px auto; display: flex; align-items: center; justify-content: center; }
.loading { border: 2px solid transparent; border-color: transparent #fff transparent #FFF; -moz-animation: rotate-loading 1.5s linear 0s infinite normal; -moz-transform-origin: 50% 50%; -o-animation: rotate-loading 1.5s linear 0s infinite normal; -o-transform-origin: 50% 50%; -webkit-animation: rotate-loading 1.5s linear 0s infinite normal; -webkit-transform-origin: 50% 50%; animation: rotate-loading 1.5s linear 0s infinite normal; transform-origin: 50% 50%; }
.loading-container:hover .loading { border-color: transparent #E45635 transparent #E45635; }
.loading-container:hover .loading, .loading-container .loading { -webkit-transition: all 0.5s ease-in-out; -moz-transition: all 0.5s ease-in-out; -ms-transition: all 0.5s ease-in-out; -o-transition: all 0.5s ease-in-out; transition: all 0.5s ease-in-out; }
#loading-text { -moz-animation: loading-text-opacity 2s linear 0s infinite normal; -o-animation: loading-text-opacity 2s linear 0s infinite normal; -webkit-animation: loading-text-opacity 2s linear 0s infinite normal; animation: loading-text-opacity 2s linear 0s infinite normal; color: #ffffff; font-family: "Helvetica Neue, "Helvetica", ""arial"; font-size: 16px; font-weight: bold; opacity: 0; position: absolute; text-align: center; text-transform: uppercase; top: 50%; width: 100px; transform: translateY(-50%); }
.loadingpage { position: fixed; top: 0; left: 0; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; }
.mini{font-size: 15px; color: white; text-align: center;font-family: "Helvetica Neue, "Helvetica", ""arial";}
.smark{position: fixed; top: 0; left: 0; width: 100%; height: 100%; display: flex; z-index: 999; align-items: center;justify-content: center; background: rbga(0,0,0,0.25)}
.smark h1{font-size: 40px; color: white}
</style>
<body>
	<div class="loadingpage" id="loadding">
		<div class="loadingcontent">
			<div class="loading-container">
				<div class="loading"></div>
				<div id="loading-text">SITEMAP CREATING...</div>
			</div>
			<a href="<?=  $baseUrl ?>"title="<?=  _SITEURL_ ?>"id="link"><?=  _SITEURL_ ?></a>
			<p class="mini">Please wait a few moments!</p>
		</div>
	</div>
	<div class="sitemapresult"  id="sitemapresult" >
	</div>
</body>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
	function createSitemap(){	
		$.ajax({
			url: 'sitemapgenerator.php',
		})
		.done(function(string) {
			$('#sitemapresult').html(string);
			$('#loadding').css('display', 'none');
			setTimeout(function(){window.location.href = './sitemap.xml'; }, 1000);
		})
	}
	setTimeout(function(){ createSitemap(); }, 1000);
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127476457-1"></script>
<script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-127476457-1'); </script>
</html>