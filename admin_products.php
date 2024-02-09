<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];



if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = $_POST['price'];
   $isbn = $_POST['isbn'];
   $desc = mysqli_real_escape_string($conn,$_POST['desc']);
		// $publisher = mysqli_real_escape_string($conn, $publisher);
		$author = trim($_POST['author']);
      // $author = mysqli_real_escape_string($conn,$_POST['author']);
		$author = mysqli_real_escape_string($conn, $author);
   $category = trim($_POST['category']);
		$category = mysqli_real_escape_string($conn, $category);
   $page = $_POST['page'];
      

      $findAut = "SELECT * FROM authors WHERE author_name = '$author'";
		$findResult = mysqli_query($conn, $findAut);
		if(!$findResult){
			// insert into publisher table and return id
			$insertAut = "INSERT INTO authors(author_name) VALUES ('$author')";
			$insertResult = mysqli_query($conn, $insertAut);
			if(!$insertResult){
				echo "Can't add new Author " . mysqli_error($conn);
				exit;
			}
			$authorid = mysqli_insert_id($conn);
		} 
      else {
			$row = mysqli_fetch_assoc($findResult);
			$authorid = $row['author_id'];

		}

      
      $findCat = "SELECT * FROM categories WHERE category_name = '$category'";
		$findResult = mysqli_query($conn, $findCat);
		if(!$findResult){
			// insert into publisher table and return id
			$insertCat = "INSERT INTO categories(category_name) VALUES ('$category')";
			$insertResult = mysqli_query($conn, $insertCat);
			if(!$insertResult){
				echo "Can't add new publisher " . mysqli_error($conn);
				exit;
			}
			$categoryid = mysqli_insert_id($conn);
		}
       else {
			$row = mysqli_fetch_assoc($findResult);
			$categoryid = $row['category_id']??null;
		}

   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT * FROM `products` WHERE book_name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'product name already added';
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(book_name, book_price, book_isbn , book_desc, book_author, book_category, book_image,book_page) VALUES('$name', '$price', '$isbn','$desc','$author','$category','$image','$page')") or die('query failed');

      if($add_product_query){
         if($image_size > 2000000){
            $message[] = 'image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'product added successfully!';
         }
      }else{
         $message[] = 'product could not be added!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}

if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $update_name = $_POST['update_name'];
   $update_price = $_POST['update_price'];

   mysqli_query($conn, "UPDATE `products` SET book_name = '$update_name', book_price = '$update_price' WHERE id = '$update_p_id'") or die('query failed');

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = 'uploaded_img/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('uploaded_img/'.$update_old_image);
      }
   }

   header('location:admin_products.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> -->

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- product CRUD section starts  -->

<section class="add-products">

   <h1 class="title">Add products</h1>
   
   <form action="" method="post" enctype="multipart/form-data">
   

      <h3>Add product</h3>
      <input type="text" name="name" class="box" placeholder="Enter product name" required>
      <input type="text" name="isbn" class="box" placeholder="Enter product ISBN" required>
      <input type="text" name="desc" class="box" placeholder="Enter product description" required>
      <input type="text" name="author" class="box" placeholder="Enter author name" required>
      <input type="text" name="category" class="box" placeholder="Enter category" required>
      <input type="number" name="pages" class="box" placeholder="Enter pages" required>
      <input type="number" min="0" name="price" class="box" placeholder="Enter product price" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add product" name="add_product" class="btn">
   </form> 

</section>

<!-- product CRUD section ends -->

<!-- show products  -->

<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_products['book_image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['book_name']; ?></div>
         <!-- <div class="name"><?php echo $fetch_products['author_name']; ?></div> -->
         <div class="name"><?php echo $fetch_products['book_isbn']; ?></div>
         <div class="price">&#8377;<?php echo $fetch_products['book_price']; ?>/-</div>
         <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['book_image']; ?>">
      <img src="uploaded_img/<?php echo $fetch_update['book_image']; ?>" alt="">
      <input type="text" name="update_name" value="<?php echo $fetch_update['book_name']; ?>" class="box" required placeholder="Enter product name">
      <input type="number" name="update_price" value="<?php echo $fetch_update['book_price']; ?>" min="0" class="box" required placeholder="Enter product price">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>







<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>