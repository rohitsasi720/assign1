<?php

if(isset($_POST['update_product']))
{
$product_id = mysqli_real_escape_string($con, $_POST['id']);

$title = mysqli_real_escape_string($con, $_POST['title']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$category = mysqli_real_escape_string($con, $_POST['category']);
$price = mysqli_real_escape_string($con, $_POST['price']);
$new_image = mysqli_real_escape_string($con, $_FILES['image']['name']);
$old_image = mysqli_real_escape_string($con, $_POST['oldimage']);

if($new_image != '')
{
    $update_filename = $_FILES['image']['name'];
}
else
{
    $update_filename = $_POST['oldimage'];
}

if(file_exists("upload/".$_FILES['image']['name'] ))
        {
            $filename = $_FILES['image']['name'];
            $_SESSION['message'] = 'Image already exist '.$filename;


            $query = "UPDATE products SET title='$title', name='$name', category='$category', price='$price', image='$update_filename' WHERE id='$product_id' ";
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
        
        else{
            $query = "UPDATE products SET title='$title', name='$name', category='$category', price='$price', image='$update_filename' WHERE id='$product_id' ";
            $query_run = mysqli_query($con, $query);
            
            if($query_run)
            {

            if($_FILES['image']['name']!= '' ){
                move_uploaded_file($_FILES['image']['tmp_name'], "upload/".$_FILES['image']['name'] );
                unlink("upload/".$old_image);
            }
                
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
}
?>