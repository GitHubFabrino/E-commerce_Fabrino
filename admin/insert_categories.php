<?php
include("../includes/dbConnect.php");
include('../includes/fonction.php');

if (isset($_POST['insert_cat'])) {
    $category_title = securisation($_POST['cat_title']);

    // Select data from data base

    $select_query = "SELECT * FROM `categories` WHERE categorie_title = '$category_title'";
    $resultat_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($resultat_select);

    if ($number > 0) {
        echo "<script>alert('" . $category_title . "  is present inside the database')</script>";
    } else {
        $insert_query = "INSERT INTO `categories` (`categorie_id`, `categorie_title`)
        VALUES (NULL, '$category_title')";
        $resultat = mysqli_query($con, $insert_query);

        if ($resultat) {
            echo "<script>alert('Category " . $category_title . " has been insered successufully')</script>";
        }
    }
}


?>
<h2 class="text-center p-1">Insert Categorie</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
        <span class="input-group-text" id="basic-addon1 bg-info"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Inseret categories" aria-label="Username" aria-describedby="basic-addon1" 
        name="cat_title" required>
    </div>
    <div class="input-group mb-2 w-10 m-auto">
        <input type="submit" class="border-0 p-2 my-3 bg-info" value="Inseret categories" 
        name="insert_cat">

    </div>
</form>