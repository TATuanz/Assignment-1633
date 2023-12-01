
<?php
require_once './connectDB.php';

$conn = connectDB();

$sql = "select prid, prname, summary, price, quantity, Description, photo_name from product";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h2>PRODUCT FORM </h2>
<p>This is function of adminstrator to insert, edit, delete one product.</p>
<p><a href="Adding_product.php"> New Product</a></p>
<table width="100%" border = "1" style="width:50%">
  <tr>
    <th width="152">Product Id</th>
    <th width="1492">Product Name</th>
	<th width="1492">Product Summary</th>
	<th width="1492">Product Price</th>
	<th width="1492">Product Quantity</th> 
	<th width="1492">Product Description</th>
	<th width="1492">Name of photo file</th>
	<th width="39"></th>
    <th width="39"></th>
  </tr>

<?php if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr> 
            <td><?php echo $row['prid']?> </td> 
            <td><?php echo $row['prname']?></td>
			<td><?php echo $row['summary']?></td>
			<td><?php echo $row['price']?></td>
			<td><?php echo $row['quantity']?></td>
			<td><?php echo $row['Description']?></td>
			<td><img src="../Admin/assets/images/<?php echo $row['photo_name']?>" style="width: 300px; height: auto"></td>
            <td><a href="delete_product.php?id=<?php echo $row['prid']?>">Delete</a></td>
            <td><a href="Adding_product.php?id=<?php echo $row['prid']?>">Edit</a></td>
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