<?php
require_once 'connectDB.php';

$conn = connectDB();
if (isset($_POST['fid']) && 
    isset($_POST['fname'])) {
        // get data from FORM
        $controlUpdate = $_POST['controlUpdate'];
        $id = $_POST['fid'];
        $fname = $_POST['fname'];
        if ($controlUpdate == 1) {
            $sql = "UPDATE category SET CatName='$fname' WHERE CatID=$id";
        } else {
            $sql = "insert into category(CatID, CatName) values($id, '$fname')";
        }			
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            header("Location:select_category.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }

mysqli_close($conn);


?>