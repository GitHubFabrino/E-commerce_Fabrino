<?php
include('../includes/dbConnect.php');
if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_categories = $_POST['product_categories'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    // accessing image
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // cheking empty condition
    if (
        $product_title == '' or
        $description == '' or
        $product_keywords == '' or
        $product_categories == '' or
        $product_brands == '' or
        $product_price == '' or
        $product_image1 == '' or
        $product_image2 == '' or
        $product_image3 == '' or
        $temp_image1 == '' or
        $temp_image2 == '' or
        $temp_image3 == ''

    ) {
        echo "<script>alert('Please fill all the available fields')</script> ";
        exit();
    } else {
        move_uploaded_file($temp_image1, "/opt/lampp/htdocs/dev_web/FabCommerce/admin/product_images/$product_image1");
        move_uploaded_file($temp_image2, "/opt/lampp/htdocs/dev_web/FabCommerce/admin/product_images/$product_image2");
        move_uploaded_file($temp_image3, "/opt/lampp/htdocs/dev_web/FabCommerce/admin/product_images/$product_image3");

        // if (!move_uploaded_file($temp_image1, "/opt/lampp/htdocs/dev_web/FabCommerce/admin/product_images/$product_image1")) {
        //     $error = error_get_last();
        //     echo "Erreur lors du transfert de l'image 1 : " . $error['message'] . "<br>";
        // }
        // if (file_exists("/opt/lampp/htdocs/dev_web/FabCommerce/admin/product_images/$product_image1")) {
        //     echo "Le fichier $product_image1 existe dans le répertoire product_images<br>";
        // } else {
        //     echo "Erreur : le fichier $product_image1 n'a pas été créé dans le répertoire product_images<br>";
        // }


        // insert query

        $insert_products = "INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) 
        VALUES (NULL, '$product_title', '$description', '$product_keywords', '$product_categories', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price',NOW(), '$product_status')";
        $resultat_query = mysqli_query($con, $insert_products);

        if ($resultat_query) {
            echo "<script>alert('Successfully inserted the products')</script> ";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <!-- Lien bootstrap CSS -->
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="bg-light">
    <div class="container mt-3">
        <h3 class="text-center p-1">Insert Products</h3>

        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Entrer product title" autocomplete="off" required>
            </div>
            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Entrer description" autocomplete="off" required>
            </div>
            <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" class="form-control" id="product_keywords" name="product_keywords" placeholder="Entrer keywords" autocomplete="off" required>
            </div>
            <!-- Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="" selected>Select a category</option>
                    <?php
                    $select_query = "SELECT * FROM `categories`";
                    $resultat_select = mysqli_query($con, $select_query);

                    // echo $row_data['brand_title'];
                    while ($row_data = mysqli_fetch_assoc($resultat_select)) {
                        $categorie_title = $row_data['categorie_title'];
                        $categorie_id = $row_data['categorie_id'];
                        echo '<option value="' . $categorie_id . '">' . $categorie_title . '</option>';
                    }

                    ?>

                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="" selected>Select a brands</option>
                    <?php
                    $select_query = "SELECT * FROM `brands`";
                    $resultat_select = mysqli_query($con, $select_query);

                    // echo $row_data['brand_title'];
                    while ($row_data = mysqli_fetch_assoc($resultat_select)) {
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];

                    ?>
                        <option value="<?= $brand_id ?>"><?= $brand_title ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" class="form-control" id="product_image1" name="product_image1" required>
            </div>
            <!-- Image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" class="form-control" id="product_image2" name="product_image2" required>
            </div>
            <!-- Image 3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" class="form-control" id="product_image3" name="product_image3" required>
            </div>
            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Entrer Price" autocomplete="off" required>
            </div>
            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" class="btn btn-info mb-3 px-3" value="Inseret product" name="insert_product">
            </div>






        </form>
    </div>






    <!-- Lien bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>

</html>
<!-- video 9 0:0 -->