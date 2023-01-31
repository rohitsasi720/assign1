<?php

if(isset($_POST['update_product']))
{
$product_id = mysqli_real_escape_string($con, $_POST['id']);

$name = mysqli_real_escape_string($con, $_POST['name']);
$category = mysqli_real_escape_string($con, $_POST['category']);

$query = "UPDATE products SET name='$name', category='$category' WHERE id='$product_id' ";
$query_run = mysqli_query($con, $query);

if($query_run)
{
$_SESSION['message'] = "Product Updated Successfully";
header("Location: index.php");
exit(0);
}
else
{
$_SESSION['message'] = "Product Not Updated";
header("Location: index.php");
exit(0);
}

}

?>