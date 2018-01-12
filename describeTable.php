<?php
	include_once 'connectDatabase.php';
	require_once('index.php');
	if (isset($_REQUEST['table']) && $_REQUEST['table'] !== ''){
		$TABLE = $_REQUEST['table'];
	} else {
		header('Location:showTables.php');
	}
	$execDescribe = mysqli_query($connect, "DESCRIBE $TABLE");
	$count = 0;
	$javascriptStartlink = "javascript:confirmDelete('deleteTable.php?table=";
	$javascriptFinishlink = "')";
	echo "<table>";
	while ( $row = mysqli_fetch_assoc( $execDescribe ) ) {
		echo "\n\t\t<tr>";
		if ( $count === 0 ) {
			echo "\n\t\t\t<th> </th>";
			foreach ( $row as $key => $value) {
				echo "\n\t\t\t<th>$key</th>";
			}
			echo "\n\t\t\t<th>Edit</th>";
			echo "\n\t\t\t<th>Delete</th>";
		} else {
			echo "\n\t\t\t<td>".$count."</td>";
			foreach ( $row as $key => $value) {
				if( $value === '' ) {
					echo "\n\t\t\t<td> - </td>";
				} else if( $value === null) {
					echo "\n\t\t\t<td><i>null</i></td>";
				} else {
					echo "\n\t\t\t<td><i>$value</i></td>";
				}
			}
			echo "\n\t\t\t<td><a href='showEntries.php?database=".$row[0]."' >View Table</a></td>\n\t\t\t";
			echo '<td><a href="'.$javascriptStartlink.$row[0].$javascriptFinishlink.'" >Delete Table</a></td>';
		}
		$count++;
		echo "\n\t\t</tr>";
	}
	echo '</table>';
?>
<script>
  function confirmDelete(delUrl) {
    if (confirm("Are you sure you want to delete " + delUrl)) {
      document.location = delUrl;
    }
  }
</script>
<?php require_once('footer.php'); ?>
