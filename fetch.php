<?php
    session_start();
    require 'dbcon.php';

    if(isset($_POST['request'])){
        $request = $_POST['request'];
        $query = "SELECT * FROM products WHERE category='$request'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
?>

<div class="container mt-4">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product Details
                        <a href="create.php" class="btn btn-primary float-end">Add Product</a>
                    </h4>
                </div>
                <div class="container my-4">
                    <select class="form-select" name="filter" id="filter">
                        <option selected>Tap to filter</option>
                        <option value="Clothing">Clothing</option>
                        <option value="Footwear">Footwear</option>
                        <option value="Electronic">Electronic</option>
                        <option value="Book">Book</option>
                    </select>
                </div>
                <table id="products" class="table table-bordered table-striped">
                    <?php 
if($count){
    ?>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Brand name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>RUD Operations</th>
                        </tr>
                        <?php }
        else{
        echo "<h5> No Products Found </h5>";
        }
        ?>
                    </thead>
                    <tbody>
                        <?php
    while($product= mysqli_fetch_assoc($result)){
        ?>
                        <tr>
                            <td><?= $product['title']; ?></td>
                            <td><?= $product['name']; ?></td>
                            <td><?= $product['category']; ?></td>
                            <td><?= $product['price']; ?></td>
                            <td><img src="<?= "upload/".$product['image']; ?>" width="175px"
                                    alt="<?= $product['title'];?>"></td>
                            <td>
                                <a href="view.php?id=<?= $product['id']; ?>" class="btn btn-info btn-sm">View</a>
                                <a href="edit.php?id=<?= $product['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <form action="code.php" method="POST" class="d-inline">
                                    <button type="submit" name="delete_product" value="<?=$product['id'];?>"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <?php 
        }
        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<?php 
    require 'partials/footer.php';
    ?>

<script type="text/javascript">
$(document).ready(function() {
    $("#filter").on('change', function() {
        var value = $(this).val();
        //alert(value);
        $.ajax({
            url: "fetch.php",
            type: "POST",
            data: 'request=' + value,
            beforeSend: function() {
                $(".container").html("<span>Working...</span>");
            },
            success: function(data) {
                $(".container").html(data);
            }
        })

    });
});
</script>
<?php
}?>