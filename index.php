<!DOCTYPE html>
<html>
  <head>
    <title>
    </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/archive/html_css/tableDisplay.css" />
    <link rel="stylesheet" type="text/css" href="/archive/html_css/form.css" />
    <link rel="stylesheet" type="text/css" href="./css/index.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script>
			$(document).ready(function(){
				var height = $(window).innerHeight();
				$('#sidenav').css('height', height);
				$(window).resize(function(){
					var height = $(window).innerHeight();
					$('#sidenav').css('height', height);
				});
			});
		</script>
  </head>
  <body>
<?php
	$dir = getcwd();
	echo "\t<iframe frameborder='1' id='sidenav' src='./showDatabases.php'>\n\t\t<table class='table table-hover'>\n\t\t\t<tr>\n\t\t\t\t<th>Files/Folder</th>\n\t\t\t</tr>";
	if (is_dir($dir)){
	  if ($dirHandle = opendir($dir)){
			while (($file = readdir($dirHandle)) !== false){
				$fileParts = explode('.', $file);
				$lengthFile = count($fileParts);
				echo "\n\t\t\t<tr>\n\t\t\t\t<td>";
				if ($lengthFile == 1) {
					echo "<a href='".$file."' target='_blank'> <span class='glyphicon glyphicon-folder-close'></span> &nbsp;<b class='lead'>".$fileParts[0]."</b></a>";
				} elseif ($lengthFile === 2 && $fileParts[0] === '' && $fileParts[1] === '') {
					echo "<a href='".$file."' target='_blank'> <span class='glyphicon glyphicon-folder-close'></span> . </a>";
				} else if($lengthFile === 3 && $fileParts[0] === '' && $fileParts[1] === '' && $fileParts[2] === '') {
					echo "<a href='".$file."' target='_blank'> <span class='glyphicon glyphicon-folder-close'></span> .. </a>";
				} else {
					echo "<a href='".$file."' target='_blank'> <span class='glyphicon glyphicon-file'></span> $fileParts[0] </a>";
				}
	      echo "</td>\n\t\t\t</tr>";
	    }
	    closedir($dirHandle);
	  }
	}
	echo "\n\t\t</table>\n\t</iframe>";
?>
