
<?php
require_once './connectDB.php';

$conn = connectDB();

$sql = "select CatID, CatName from category";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h2>CATEGORY FORM </h2>
<p>This is function of adminstrator to insert, edit, delete one category.</p>
<p><a href="Adding_Category.php"> New Category</a></p>
<table width="46%" border = "1" style="width:50%">
  <tr>
    <th width="152">Catgory Id</th>
    <th width="1492">Category Name</th> 
    <th width="39"></th>
    <th width="39"></th>
  </tr>

<?php if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr> 
            <td><?php echo $row['CatID']?> </td> 
            <td><?php echo $row['CatName']?></td>
            <td><a href="delete_category.php?id=<?php echo $row['CatID']?>">Delete</a></td>
            <td><a href="Adding_Category.php?id=<?php echo $row['CatID']?>">Edit</a></td>
        </tr>
    <?php }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</table>
<p ><a href="Home.php">Back to home</a></p>
</body>
</html>