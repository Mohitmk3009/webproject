<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "database_functions.php";
  $conn = db_connect();

  $query = "SELECT book_isbn, book_image FROM products";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Full Catalogs of Books";
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<!-------- customer style link ----------->
<link rel="stylesheet" href="./css/style.css">


<!-------- font awesome cdn link --------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />


<!------- swipper cdn link ------------>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>
<body>
    <?php include 'header.php'; ?>
  

  <p class="lead text-center text-muted">Full Catalogs of Books</p>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="col-md-3">
            <a href="book.php?bookisbn=<?php echo $query_row['book_isbn']; ?>">
              <img class="img-responsive img-thumbnail" src="./uploaded_img/<?php echo $query_row['book_image']; ?>">
            </a>
          </div>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
      </body>
</html>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "footer.php";
?>