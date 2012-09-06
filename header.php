<?php
include_once("settings.php");
function get_header() {
  return "
 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 
Transitional//EN\">
	<html lang='en'>

	<head>
	    <link href='http://fonts.googleapis.com/css?family=Skranji' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Life+Savers' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700' rel='stylesheet' type='text/css'>
	
	    <title>".site_name()."</title>
		<link rel='icon' 
		      type='image/png' 
		      href='imgs/favicon.ico'>
	    <link rel='stylesheet' type='text/css' href='lip.css'>
	    <link rel='stylesheet' type='text/css' href='flags.css'>	    
	    <script type='text/javascript' src='http://code.jquery.com/jquery-1.7.2.js'></script>
	    <meta http-equiv='Content-Language' content='en_US' /> 
		<script type='text/javascript'>

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-34517669-1']);
		  _gaq.push(['_setDomainName','".$_SERVER['SERVER_NAME']."']);
		  _gaq.push(['_setAllowLinker', true]);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	</head>

	<body>



	</body>

    <div class='center_column'>

    <div class='header'>
		  <div class='header_link'><a class='header_link' href='about.php'>What?</a></div>
    </div><a class='logo_text'href='/'>".site_name()."</a>".
    "<div class=tagline>Crowd-funded projects that are built and available in stores</div>";
}
?>
