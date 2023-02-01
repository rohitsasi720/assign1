<div class="container my-3">
    <div class="row my-4">
        <?php
                $id = $product['id'];
                $price = mysqli_real_escape_string($con,$product['price']);
                if(isset($idd)) {
                    $sql = "SELECT * FROM products WHERE price BETWEEN 0.7*('$price') AND ('$price') AND id != '$id' AND id != '$idd'";  
                }
                  else{
                    $sql = "SELECT * FROM products WHERE price BETWEEN 0.7*('$price') AND ('$price') AND id != '$id'"; 
                  }
                  $result = mysqli_query($con,$sql);
                  if(mysqli_num_rows($result) > 0)
                  {
                    echo '<div class="container my-3">
                    <p class="text-center fw-normal display-5" style="font-family: Serif;  text-shadow: 0 0 1px #000000;">
                        Related Products
                    </p>
                </div>';
                  while($row=mysqli_fetch_assoc($result)){
                  $image = $row['image'];
                  $brand = $row['name'];
                  $title = $row['title'];
                  $price = $row['price'];
                  $id= $row['id'];
                  echo '<div class=" col-md-3 my-2">
                            <div class="card" style="width: 18rem; border: none; outline: none; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.75);">
                                <img src="upload/'.$image.'" width="125px" style="display: block; margin-left: auto; margin-right: auto;" alt="<?= $title;?>
        <div class="card-body">
            <h5 class="card-title fw-bold" style="display: block; margin-left: auto; margin-right: auto;">
                '.$brand.'</h5>
            <p class="card-text fw-semibold" style="display: block; margin-left: auto; margin-right: auto;">
                Price $'.$price.'</p>
            <a href="view.php?id='.$id.'" class="btn btn-secondary btn-sm">Explore</a>
        </div>
    </div>
</div>';
}
}
?>
</div>
</div>
</div>