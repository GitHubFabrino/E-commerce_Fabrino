<?php

// include('../includes/dbConnect.php');
include('includes/dbConnect.php');
include('includes/fonction.php');

// recuperer 6 produits
function getProducts()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "SELECT * FROM `products` order by rand() LIMIT 0,6 ";
            $resultat_select = mysqli_query($con, $select_query);

            while ($row_data = mysqli_fetch_assoc($resultat_select)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $description = $row_data['description'];
                $category_id = $row_data['category_id'];
                $brand_id = $row_data['brand_id'];
                $product_price = $row_data['product_price'];
                $product_image1 = $row_data['product_image1'];
?>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./admin/product_images/<?= $product_image1 ?>" class="card-img-top p-1" alt="<?= $product_title ?>">
                        <div class="card-body">
                            <h5 class="card-title p-1"><?= $product_title ?></h5>
                            <p class="card-text"><?= $description ?></p>
                            <p class="card-text">Price : <?= $product_price ?>/-</p>
                            <a href="index.php?add_to_cart=<?= $product_id ?>" class="btn btn-info">Add to card</a>
                            <a href="product_detail.php?product_id=<?= $product_id ?>" class="btn btn-secondary">View more</a>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    }
}

// recuperer tous les produits dans la BD
function getAllProducts()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "SELECT * FROM `products` order by rand()";
            $resultat_select = mysqli_query($con, $select_query);

            while ($row_data = mysqli_fetch_assoc($resultat_select)) {
                $product_id = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $description = $row_data['description'];
                $category_id = $row_data['category_id'];
                $brand_id = $row_data['brand_id'];
                $product_price = $row_data['product_price'];
                $product_image1 = $row_data['product_image1'];
            ?>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./admin/product_images/<?= $product_image1 ?>" class="card-img-top p-1" alt="<?= $product_title ?>">
                        <div class="card-body">
                            <h5 class="card-title p-1"><?= $product_title ?></h5>
                            <p class="card-text"><?= $description ?></p>
                            <p class="card-text">Price : <?= $product_price ?>/-</p>
                            <a href="index.php?add_to_cart=<?= $product_id ?>" class="btn btn-info">Add to card</a>
                            <a href="product_detail.php?product_id=<?= $product_id ?>" class="btn btn-secondary">View more</a>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    }
}

// recuperer un produit avec unique categorie
function get_unique_categories()
{
    global $con;
    if (isset($_GET['category'])) {
        $cat_id = $_GET['category'];
        $select_query = "SELECT * FROM `products` WHERE category_id=$cat_id";
        $resultat_select = mysqli_query($con, $select_query);

        $num_of_rows = mysqli_num_rows($resultat_select);
        if ($num_of_rows == 0) {
            echo '<h2 class="text-center text-danger">No stock for this category</h2>';
        }

        while ($row_data = mysqli_fetch_assoc($resultat_select)) {
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $description = $row_data['description'];
            $category_id = $row_data['category_id'];
            $brand_id = $row_data['brand_id'];
            $product_price = $row_data['product_price'];
            $product_image1 = $row_data['product_image1'];
            ?>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <img src="./admin/product_images/<?= $product_image1 ?>" class="card-img-top p-1" alt="<?= $product_title ?>">
                    <div class="card-body">
                        <h5 class="card-title p-1"><?= $product_title ?></h5>
                        <p class="card-text"><?= $description ?></p>
                        <p class="card-text">Price : <?= $product_price ?>/-</p>
                        <a href="index.php?add_to_cart=<?= $product_id ?>" class="btn btn-info">Add to card</a>
                        <a href="product_detail.php?product_id=<?= $product_id ?>" class="btn btn-secondary">View more</a>

                    </div>
                </div>
            </div>
        <?php
        }
    }
}

// recuperer un produit avec unique marque
function get_unique_brand()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "SELECT * FROM `products` WHERE brand_id=$brand_id";
        $resultat_select = mysqli_query($con, $select_query);

        $num_of_rows = mysqli_num_rows($resultat_select);
        if ($num_of_rows == 0) {
            echo '<h2 class="text-center text-danger">No brand available for service</h2>';
        }

        while ($row_data = mysqli_fetch_assoc($resultat_select)) {
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $description = $row_data['description'];
            $category_id = $row_data['category_id'];
            $brand_id = $row_data['brand_id'];
            $product_price = $row_data['product_price'];
            $product_image1 = $row_data['product_image1'];
        ?>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <img src="./admin/product_images/<?= $product_image1 ?>" class="card-img-top p-1" alt="<?= $product_title ?>">
                    <div class="card-body">
                        <h5 class="card-title p-1"><?= $product_title ?></h5>
                        <p class="card-text"><?= $description ?></p>
                        <p class="card-text">Price : <?= $product_price ?>/-</p>
                        <a href="index.php?add_to_cart=<?= $product_id ?>" class="btn btn-info">Add to card</a>
                        <a href="product_detail.php?product_id=<?= $product_id ?>" class="btn btn-secondary">View more</a>

                    </div>
                </div>
            </div>
        <?php
        }
    }
}

// recuperer tous les marques
function getBrands()
{
    global $con;
    $select_query = "SELECT * FROM `brands`";
    $resultat_select = mysqli_query($con, $select_query);

    // echo $row_data['brand_title'];
    while ($row_data = mysqli_fetch_assoc($resultat_select)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];

        ?>
        <li class="nav-item text-center">
            <a href="index.php?brand=<?= $brand_id ?>" class="nav-link text-light"><?= $brand_title ?></a>
        </li>

    <?php
    }
}

// recuperer tous les categorie
function getCategory()
{
    global $con;
    $select_query = "SELECT * FROM `categories`";
    $resultat_select = mysqli_query($con, $select_query);

    // echo $row_data['brand_title'];
    while ($row_data = mysqli_fetch_assoc($resultat_select)) {
        $categorie_title = $row_data['categorie_title'];
        $categorie_id = $row_data['categorie_id'];

    ?>
        <li class="nav-item text-center">
            <a href="index.php?category=<?= $categorie_id ?>" class="nav-link text-light"><?= $categorie_title ?></a>
        </li>

        <?php
    }
}

// searching products
function search_product()
{

    global $con;


    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $select_query = "SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";

        $resultat_select = mysqli_query($con, $select_query);


        $num_of_rows = mysqli_num_rows($resultat_select);
        if ($num_of_rows == 0) {
            echo '<h2 class="text-center text-danger">No results match.No products found on this category</h2>';
        }

        while ($row_data = mysqli_fetch_assoc($resultat_select)) {
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $description = $row_data['description'];
            $category_id = $row_data['category_id'];
            $brand_id = $row_data['brand_id'];
            $product_price = $row_data['product_price'];
            $product_image1 = $row_data['product_image1'];
        ?>
            <div class="col-md-4 mb-2">
                <div class="card">
                    <img src="./admin/product_images/<?= $product_image1 ?>" class="card-img-top p-1" alt="<?= $product_title ?>">
                    <div class="card-body">
                        <h5 class="card-title p-1"><?= $product_title ?></h5>
                        <p class="card-text"><?= $description ?></p>
                        <p class="card-text">Price : <?= $product_price ?>/-</p>
                        <a href="index.php?add_to_cart=<?= $product_id ?>" class="btn btn-info">Add to card</a>
                        <a href="product_detail.php?product_id=<?= $product_id ?>" class="btn btn-secondary">View more</a>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

// view details function
function view_details()
{
    global $con;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];

                $select_query = "SELECT * FROM `products` WHERE product_id=$product_id ";
                $resultat_select = mysqli_query($con, $select_query);


                $num_of_rows = mysqli_num_rows($resultat_select);
                if ($num_of_rows == 0) {
                    echo '<h2 class="text-center text-danger p-1">No results match.No products found on this category</h2>';
                }


                while ($row_data = mysqli_fetch_assoc($resultat_select)) {
                    $product_id = $row_data['product_id'];
                    $product_title = $row_data['product_title'];
                    $description = $row_data['description'];
                    $category_id = $row_data['category_id'];
                    $brand_id = $row_data['brand_id'];
                    $product_price = $row_data['product_price'];
                    $product_image1 = $row_data['product_image1'];
                    $product_image2 = $row_data['product_image2'];
                    $product_image3 = $row_data['product_image3'];
            ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="./admin/product_images/<?= $product_image1 ?>" class="card-img-top p-1" alt="<?= $product_title ?>">
                            <div class="card-body">
                                <h5 class="card-title p-1"><?= $product_title ?></h5>
                                <p class="card-text"><?= $description ?></p>
                                <p class="card-text">Price : <?= $product_price ?>/-</p>
                                <a href="index.php?add_to_cart=<?= $product_id ?>" class="btn btn-info">Add to card</a>
                                <a href="index.php" class="btn btn-secondary">Go Home</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center text-info mb-5 p-1">Related products</h4>
                            </div>
                            <div class="col-md-6">
                                <img src="./admin/product_images/<?= $product_image2 ?>" class="card-img-top p-1" alt="<?= $product_title ?>">
                            </div>
                            <div class="col-md-6">
                                <img src="./admin/product_images/<?= $product_image3 ?>" class="card-img-top p-1" alt="<?= $product_title ?>">

                            </div>
                        </div>

                    </div>
<?php
                }
            }
        }
    } else {
        echo '<h2 class="text-center text-danger p-1">No results match.No products found on this category</h2>';
    }
}

function getIpAddress()
{
    // Si l'adresse IP est stockée dans la variable d'environnement HTTP_X_FORWARDED_FOR
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    // Sinon, si l'adresse IP est stockée dans la variable d'environnement REMOTE_ADDR
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }


    return $ip;
}

// cart function

// Fonction avec un requette non preparer
// function cart()
// {
//     if (isset($_GET['add_to_cart'])) {
//         global $con;

//         $get_ip_add = securisation(getIpAddress());
//         $get_product_id = securisation($_GET['add_to_cart']);

//         $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add' and product_id = '$get_product_id'";
//         $resultat_select = mysqli_query($con, $select_query);

//         $num_of_rows = mysqli_num_rows($resultat_select);
//         echo $num_of_rows;
//         echo $get_product_id;
//         if ($num_of_rows > 0) {
//             echo "<script>alert('This item is already present inside cart')</script>";
//             echo "<script>window.open('index.php','_self')</script>";
//         } else {
//             $insert_query = "INSERT INTO `cart_details`(`product_id`, `ip_address`, `quantity`) 
//             VALUES ('$get_product_id','$get_ip_add','0')";
//             $resultat_query = mysqli_query($con, $insert_query);
//             echo "<script>window.open('index.php','_self')</script>";
//         }
//     }
// }
// // nijanona 6:35 vdeo 25

// fonction avec des requttes preparer 
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;

        $get_ip_add = securisation(getIpAddress()); // Sécurise l'adresse IP en utilisant la fonction securisation()
        $get_product_id = securisation($_GET['add_to_cart']); // Sécurise l'ID du produit en utilisant la fonction securisation()

        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = ? and product_id = ?";
        $stmt = mysqli_prepare($con, $select_query); // Prépare la requête SELECT avec un marqueur de position pour les valeurs
        mysqli_stmt_bind_param($stmt, "ss", $get_ip_add, $get_product_id); // Lie les valeurs sécurisées aux marqueurs de position dans la requête
        mysqli_stmt_execute($stmt); // Exécute la requête préparée
        $resultat_select = mysqli_stmt_get_result($stmt); // Récupère les résultats de la requête

        $num_of_rows = mysqli_num_rows($resultat_select); // Compte le nombre de lignes dans les résultats

        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `cart_details`(`product_id`, `ip_address`, `quantity`) 
            VALUES (?, ?, '0')";
            $stmt = mysqli_prepare($con, $insert_query); // Prépare la requête INSERT avec des marqueurs de position
            mysqli_stmt_bind_param($stmt, "ss", $get_product_id, $get_ip_add); // Lie les valeurs aux marqueurs de position
            mysqli_stmt_execute($stmt); // Exécute la requête préparée pour insérer les données
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

// function to get cart item numbers
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;

        $get_ip_add = securisation(getIpAddress());

        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
        $resultat_select = mysqli_query($con, $select_query);

        $count_cart_item = mysqli_num_rows($resultat_select);
    } else {
        global $con;

        $get_ip_add = securisation(getIpAddress());

        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
        $resultat_select = mysqli_query($con, $select_query);

        $count_cart_item = mysqli_num_rows($resultat_select);
    }
    echo $count_cart_item;
}

// video 28 00:04

?>