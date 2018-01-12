<?php
  $DELETE = true;
  if(isset($_REQUEST['database'])){
    $DATABASE = $_REQUEST['database'];
    include_once 'connectDatabase.php';
    $excute_drop_database = mysqli_query( $connect, "drop database $DATABASE" );
    if($excute_drop_database){
      echo "DATABASE <b><i><u>$DATABASE</u></i></b> deleted successfully";
    }
  }
  else{
    echo "No Database selected to delete.";
  }

?>
