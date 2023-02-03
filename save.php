<?php

if(isset($_POST['save_product']))
{
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $image = mysqli_real_escape_string($con, $_FILES['image']['name']);

    $allowed_extension = array('gif','png','jpg','jpeg');
    $filename = $_FILES['image']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($file_extension, $allowed_extension))
    {
        $_SESSION['message'] = "You are allowed with only jpg,jpeg,gif and png";
        header("Location: create.php");  
        exit(0);
    }

    else
    {

        if(file_exists("upload/".$_FILES['image']['name'] ))
        {
            $filename = $_FILES['image']['name'];
            $_SESSION['message'] = 'Image already exist '.$filename;
            header("Location: create.php");
            exit(0);
        }
        
        else
        {
            $query = "INSERT INTO products (title,name,category,price,image) VALUES ('$title','$name','$category','$price','$image')";
            $query_run = mysqli_query($con, $query);
            
            if($query_run)
            {
                move_uploaded_file($_FILES['image']['tmp_name'], "upload/".$_FILES['image']['name'] );
                $_SESSION['message'] = "Product Created Successfully";
                header("Location: create.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Product Not Added";
                header("Location: create.php");
                exit(0);
            }   
        }
    }
}

?>