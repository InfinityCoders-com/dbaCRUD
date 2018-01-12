<?php
	include_once 'connectDatabase.php';
	require_once('index.php');
	if (isset($_REQUEST['database']) && $_REQUEST['database'] !== ''){
		$DATABASE = $_REQUEST['database'];
	} else {
		header('Location:showDatabases.php');
	}
	$execshow = mysqli_query($connect, "show tables from $DATABASE");
	echo "<table>";
	echo "\n\t\t<tr>";
	echo "\n\t\t\t<th> </th>";
	echo "\n\t\t\t<th>Table Name</th>";
	echo "\n\t\t\t<th>View Entries</th>";
	echo "\n\t\t\t<th>Table Structure</th>";
	echo "\n\t\t\t<th>Drop Table</th>";
	echo "\n\t\t</tr>";
	$count++;
	$javascriptStartlink = "javascript:confirmDelete('deleteTable.php?table=";
  $javascriptFinishlink = "')";
  while ( $row = mysqli_fetch_row( $execshow ) ) {
		echo "\n\t\t<tr>";
		echo "\n\t\t\t<td>".++$i."</td>";
		echo "\n\t\t\t<td>".$row[0]."</td>";
		echo "\n\t\t\t<td><a href='showEntries.php?table=".$row[0]."' >View Entries</a></td>\n\t\t\t";
		echo "\n\t\t\t<td><a href='describeTable.php?table=".$row[0]."' >View</a></td>\n\t\t\t";
		echo '<td><a href="'.$javascriptStartlink.$row[0].$javascriptFinishlink.'" >Delete Table</a></td>';
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
