<?php
	error_reporting('E_ALL');
	$HOST='localhost';
	$USER="root";
	$PASSWORD='';
	if( !isset($DATABASE)){
		$DATABASE="college";
	}
	if( !$connect = mysqli_connect( $HOST, $USER, $PASSWORD))
	{
		echo "<br />MYSQL server could not connect";
	}
	if( !mysqli_select_db($connect, $DATABASE ) && ( ! isset( $DELETE )))
	{
		$create_db="CREATE DATABASE $DATABASE";
		if( !$exec_create_db = mysqli_query( $connect, $create_db ))
		{
			echo "MYSQL could not create database.";
		}
		else{
			echo "Database <b><i><u>$DATABASE</u></i></b> created successfully.";
		}
	}
?>
