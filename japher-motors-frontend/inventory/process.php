<?php
$mysqli=new mysqli('localhost','root','','japhermotorsdb') or die(mysqli_error($mysqli));
$conn= new mysqli('localhost','root','','japhermotorsdb') or die(mysqli_error($mysqli));
$sparePartName='';
$carType='';
$quantity='';
$price='';





if(isset($_POST['save'])){
    $sparePartName=$_POST['sparePartName'];
    $carType=$_POST['carType'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    foreach ($sparePartName as $key => $value){
        $save="INSERT INTO inventory(sparePartName,carType,quantity,price) VALUES ('".$value."', '".$carType[$key]."', '".$quantity[$key]."', '".$price[$key]."') ";
        $query= mysqli_query($conn, $save);
    }
    header("location:inventory.php");
}
if(isset($_POST['update'])){

    
    $sparePartId=$_POST['sparePartId'];



    $sparePartName=$_POST['sparePartName'];
    $carType=$_POST['carType'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];

    $query="UPDATE inventory SET sparePartName='$sparePartName', carType='$carType', quantity='$quantity', price='$price' where sparePartId='$sparePartId' ";
    $query_run= mysqli_query($conn, $query);
    if($query_run){
    
    header("location:inventory.php");
    }
}
                                        
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM inventory WHERE sparePartId=$id")or die($mysqli->error);
    header("location:inventory.php");
}





?>