<?php
	require_once('index.php');
	include_once 'index.php';
  if(( isset( $_REQUEST['submit_db_name'] )) || ( isset($_REQUEST['database'] )) ){
    $DATABASE = $_REQUEST['database'];
    include_once 'connectDatabase.php';
  }
  else{
		echo "<div class='col-xs-8'>";
    echo "<form method='POST' action=".$_SERVER['PHP_SELF'].">";
    echo "\n\t<table>\n\t\t<tr>\n\t\t\t<th colspan='2'>Create Database</th>\n\t\t</tr>";
    echo "\n\t\t<tr>\n\t\t\t<td><input type='text' name='database' placeholder='New Database Name' /></td>";
    echo "\n\t\t\t<td><button type='submit' name='submit_db_name'>Submit</button></td>";
    echo "\n\t\t</tr>\n\t</table>\n</form>";
  }
	include_once 'footer.php';
?>
