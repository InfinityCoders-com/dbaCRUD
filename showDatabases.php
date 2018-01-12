
  <?php
		include_once 'connectDatabase.php';
    include_once 'index.php';
    $sql="SHOW DATABASES";
    if ( !( $result = mysqli_query( $connect, $sql ) ) ){
      printf("Error: ", mysqli_error($connect));
    }
		echo "<div class='col-xs-8'>";
    echo "<table class='table table-bordered'>";
    echo "\n\t\t<tr>";
    echo "\n\t\t\t<th> </th>";
    echo "\n\t\t\t<th>Database Name</th>";
    echo "\n\t\t\t<th>View Tables</th>";
    echo "\n\t\t\t<th>Drop database</th>";
    echo "\n\t\t</tr>";
    $i = 0;
    $javascriptStartlink = "javascript:confirmDelete('deleteDatabase.php?database=";
    $javascriptFinishlink = "')";
    while( $row = mysqli_fetch_row( $result ) ){
      if( ( $row[0] === 'information_schema' ) || ( $row[0] === 'mysql' ) || ( $row[0] === 'sys' ) ){
        echo "\n\t\t<tr>";
        echo "\n\t\t\t<td>".++$i."</td>";
        echo "\n\t\t\t<td>".$row[0]."</td>";
        echo "\n\t\t\t<td><a>Operation Not Allowed</a></td>";
        echo "\n\t\t\t<td><a>Operation Not Allowed</a></td>";
        echo "\n\t\t</tr>";
      }
      else{
        echo "\n\t\t<tr>";
        echo "\n\t\t\t<td>".++$i."</td>";
        echo "\n\t\t\t<td>".$row[0]."</td>";
        echo "\n\t\t\t<td><a href='showTables.php?database=".$row[0]."'>View Table</a></td>\n\t\t\t";
        echo '<td><a href="'.$javascriptStartlink.$row[0].$javascriptFinishlink.'" >Delete Database</a></td>';
        echo "\n\t\t</tr>";
      }
    }
    echo "\n\t</table>\n</div>";
		include_once 'footer.php';
  ?>
<script>
  function confirmDelete(delUrl) {
    if (confirm("Are you sure you want to delete " + delUrl)) {
      document.location = delUrl;
    }
  }
</script>
