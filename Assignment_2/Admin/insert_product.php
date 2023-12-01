<?php
require_once 'connectDB.php';
$conn = connectDB();

if (isset($_POST['fid']) && 
    isset($_POST['fname'])&& 
    isset($_POST['fcateid'])&& 
    isset($_POST['fprice'])&& 
    isset($_POST['fquan'])&& 
    isset($_POST['fdes'])&& 
    isset($_POST['fsum'])
   && $_FILES){
        // get data from FORM
        $controlUpdate = $_POST['controlUpdate'];
        $id = $_POST['fid'];
        $fname = $_POST['fname'];
		$fcateid = $_POST['fcateid'];
		$fsum = $_POST['fsum'];
		$fprice = $_POST['fprice'];
		$fquan = $_POST['fquan'];
		$fdes = $_POST['fdes'];
		$fphname = basename($_FILES["ffile"]["name"]);
		move_uploaded_file($_FILES['ffile']['tmp_name'],'../Admin/assets/images/'.$fphname);
		$result1 = mysqli_query($conn, "select CatID from category"); 
		$table= mysqli_fetch_array($result1);
?>
<script>
	var arr= "<?php echo json_encode($table)?>";

	if (arr.indexOf("<?php echo $fcateid?>")==-1)
		{
			location.href="Adding_Category.php";
		}
</script>
<?php

        if ($controlUpdate == 1) {
            $sql = "UPDATE product SET prname='$fname', cateid='$fcateid', price='$fprice', summary='$fsum', quantity='$fquan', Description='$fdes', photo_name='$fphname' WHERE prid=$id";
        } else {
            $sql = "insert into product(prid, prname, cateid, summary, price, quantity, Description, photo_name) values($id, '$fname', $fcateid, '$fsum', $fprice, $fquan, '$fdes', '$fphname')";
        }
        
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            header("Location:select_product.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }

mysqli_close($conn);


?>
	