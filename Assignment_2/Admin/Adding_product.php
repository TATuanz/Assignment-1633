<?php
require_once 'connectDB.php';

$conn = connectDB();
?>
<!DOCTYPE html>
<html>
<head>
<script src="inspect.js"></script>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
<?php

$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} 
$prid= "";
$prname="";
$cateid="";
$sum = "";
$price="";
$quan="";
$des="";
$phname="";
$isUpdated = 0;
if ($id !="") {
    $sql = "select prid, prname, cateid, summary, price, quantity, Description, photo_name from product where prid = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $prid = $row['prid'];
        $prname = $row['prname'];
        $cateid = $row['cateid'];
		$sum = $row['summary'];
        $price = $row['price'];
		$quan = $row['quantity'];
        $des = $row['Description'];
		$phname =$row['photo_name'];
    }
    $isUpdated = 1;
}
?>
<h2>Product FORM</h2>
<p>This is function of adminstrator to insert, edit, delete one Product.</p>
<p><a href="select_product.php">Back to Product page</a></p>
<div class="container">
  <form action="insert_product.php" enctype="multipart/form-data" method="POST"">
  <input type="hidden" id="controlUpdate" name="controlUpdate" value="<?php echo $isUpdated?>" />
  <div class="row">
    <div class="col-25">
      <label for="fname">Product Id</label>
    </div>
    <div class="col-75">
      <input type="text" id="fid" name="fid" value="<?php echo $prid?>" <?php if($isUpdated==1) echo "readonly";?> placeholder="Product id..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Product Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="fname" value="<?php echo $prname?>" placeholder="Product name..">
    </div>
  </div>
	  <div class="row">
    <div class="col-25">
      <label for="fname">Category ID</label>
    </div>
    <div class="col-75">
      <input type="text" id="fcateid" name="fcateid" value="<?php echo $cateid?>" placeholder="Category ID..">
    </div>
  </div>
	<div class="row">
    <div class="col-25">
      <label for="fname">Product Summary</label>
    </div>
    <div class="col-75">
      <input type="text" id="fsum" name="fsum" value="<?php echo $sum?>" placeholder="Product summary..">
    </div>
  </div>
	<div class="row">
    <div class="col-25">
      <label for="fname">Product Price</label>
    </div>
    <div class="col-75">
      <input type="text" id="fprice" name="fprice" value="<?php echo $price?>" placeholder="Product price..">
    </div>
  </div>
	  <div class="row">
    <div class="col-25">
      <label for="fname">Product Quantity</label>
    </div>
    <div class="col-75">
      <input type="text" id="fquan" name="fquan" value="<?php echo $quan?>" placeholder="Product quantity..">
    </div>
  </div>
	  <div class="row">
    <div class="col-25">
      <label for="fname">Product Description</label>
    </div>
    <div class="col-75">
      <input type="text" id="fdes" name="fdes" value="<?php echo $des?>" placeholder="Product description..">
    </div>
  </div>
  	  <div class="row">
    <div class="col-25">
      <label for="fname">Name of photo file</label>
    </div>
    <div class="col-75">
      <input type="file" name="ffile">
    </div>
  </div>
  <div class="row">
    <input type="submit" value="Submit" />
  </div>
  </form>
</div>

</body>
</html>

<?php
    mysqli_close($conn);
?>
