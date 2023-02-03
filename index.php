<?php
    session_start();
    require 'dbcon.php';
    require 'partials/header.php';
    require 'partials/nav.php';
?>

<body>

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
                    <div class="card-body">

                        <table id="products" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>RUD Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM products";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $product)
                                        {
                                            ?>
                                <tr>
                                    <td><?= $product['title']; ?></td>
                                    <td><?= $product['name']; ?></td>
                                    <td><?= $product['category']; ?></td>
                                    <td><?= $product['price']; ?></td>
                                    <td><img src="<?= "upload/".$product['image']; ?>" width="175px"
                                            alt="<?= $product['title'];?>"></td>
                                    <td>

                                        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){?>
                                        <a href="view.php?id=<?= $product['id']; ?>"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="edit.php?id=<?= $product['id']; ?>"
                                            class="btn btn-success btn-sm">Edit</a>
                                        <form action="code.php" method="POST" class="d-inline">
                                            <input type="hidden" name="del_image" value="<?=$product['image'];?>">
                                            <button type="submit" name="delete_product" value="<?=$product['id'];?>"
                                                class="btn btn-danger btn-sm">Delete</button>

                                        </form>
                                        <?php }
                                        else {?>
                                        <a href="view.php?id=<?= $product['id']; ?>" class="btn btn-info btn-sm my-2"
                                            style="margin: 0 auto; display: block;padding: 6px 1px;">View</a>
                                        <div class="d-inline-block" tabindex="0" data-toggle="tooltip"
                                            data-placement="bottom" title="Login / Signup to Edit">
                                            <button type="button" class="btn btn-success" style="pointer-events: none;"
                                                disabled>
                                                Edit
                                            </button>
                                        </div>
                                        <div class="d-inline-block mx-2" tabindex="0" data-toggle="tooltip"
                                            data-placement="bottom" title="Login / Signup to Delete">
                                            <button type="button" class="btn btn-danger" style="pointer-events: none;"
                                                disabled>
                                                Delete
                                            </button>
                                        </div>
                                        <?php }?>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Products Found </h5>";
                                    }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
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

</body>

</html>