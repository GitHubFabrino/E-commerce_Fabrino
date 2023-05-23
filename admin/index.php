<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <!-- Lien bootstrap CSS -->
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }
        .footer{
            position: absolute;
            bottom: 0px;
        }
    </style>
</head>

<body>
    <!-- nav bar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../image/Logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcom Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- Second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- Third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary d-flex align-items-center">
                <div class="p-3">
                    <a href="">
                        <img src="../image/pulle3.jpg" alt="" class="admin_image">
                    </a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_product.php" class="nav-link text-light bg-info my-1 p-2">Insert Produits</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1  p-2">View Produitcs</a></button>
                    <button><a href="index.php?insert_categories " class="nav-link text-light bg-info my-1  p-2">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1  p-2">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1  p-2">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1  p-2">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1  p-2">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1  p-2">All Payements</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1  p-2">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1  p-2">Logout</a></button>
                </div>
            </div>
        </div>
        <!-- Fourth child -->

        <div class="container my-2">
            <?php
                if (isset($_GET['insert_categories'])) {
                    include('insert_categories.php');
                }
                if (isset($_GET['insert_brands'])) {
                    include('insert_brands.php');
                }
            
            ?>
        </div>
        <!-- Dernier enfant -->
        <div class="bg-info p-3 text-center footer">
            <p>All right reserved @ - Designed by Fabrino-2023</p>
        </div>
    </div>



    <!-- Lien bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>
<!-- video 9 0:0 -->