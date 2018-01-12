<?php
	error_reporting('E_ALL');
	require_once('index.php');
	include 'connectDatabase.php';
	$check_table="show tables from $DATABASE";
	$execshow=mysql_query($check_table);
	$flag_table='false';
	while ($row = mysql_fetch_row($execshow)){	$data=$row[0];	if($data=='blog_data'){		$flag_table='true';		}	}
		if($flag_table=='false')
		{
			$create_table="create table blog_data(`s_no` int(5) NOT NULL PRIMARY KEY, `date` varchar(10) NOT NULL, `head` varchar(100) NOT NULL, `content` varchar(500), `auth` varchar(10) NOT NULL, `category` varchar(30), `img1` varchar(10), `img2` varchar(10), `img3` varchar(10), `img4` varchar(10), `img5` varchar(10))";
			$exec_create=mysql_query($create_table);
		}
?>
<?php require_once('footer.php'); ?>
