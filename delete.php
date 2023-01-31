<?php

if(isset($_POST['delete_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['delete_product']);
$product_image = mysqli_real_escape_string($con, $_POST['del_image']);
    $query = "DELETE FROM products WHERE id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        unlink("upload/".$product_image);
        $_SESSION['message'] = "Product Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Product Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}
?>