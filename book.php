<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
$book_isbn = $_GET['bookisbn'];
// connecto database
  $query = "SELECT * FROM products WHERE book_isbn = '$book_isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $name = $row['book_name'];

?>
  <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Books</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="./css/style.css">
   <style>
/* p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}*/
    body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;

} 
* {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
} 
.col-md-6{
  margin-left: 20px;
  justify-content: center;
}
.col-md-3, .col-md-6 {
    position: relative;
    min-height: 1px;
    padding-right: 45px;
    padding-left: 55px;
}
h4 {
    font-size: 20px;
    margin-top: 10px;
    margin-bottom: 10px;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}
img{
  height: 350px;
}
.text-center{
    text-align: center;
    padding: 2rem;
    border-radius: 0.5rem;
    border: var(--border);
    box-shadow: var(--box-shadow);
    background-color: var(--white);
}
.row{
  display: flex;
  margin-right: 225px;
  margin-left: 225px;
  margin-top: 35px;
  margin-bottom: 35px;
  
}
.col-md-6{
display: flex;
flex-direction: column;
}


 </style> 
</head>
<body>
<?php include 'header.php'; ?>


      <!-- Example row of columns -->
      <p class="lead" style="margin: 15px  20px;font-size: 15px"><a href="shop.php">Books</a> > <?php echo $row['book_name']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./uploaded_img/<?php echo $row['book_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>Book Description</h4>
          <p><?php echo $row['book_desc']; ?></p>
          <h4>Book Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "book_desc" || $key == "book_image" || $key == "book_name"){
                continue;
              }
              switch($key){
                case "book_isbn":
                  $key = "ISBN";
                  break;
                case "book_name":
                  $key = "Name";
                  break;
                case "book_author":
                  $key = "Author";
                  break;
                case "book_price":
                  $key = "Price";
                  break;
                case "book_category":
                  $key = "Category";
                  break;
                case "book_page":
                  $key = "Page";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="bookisbn" value="<?php echo $book_isbn;?>">
            <input type="submit" value="add to cart" name="add to cart" class="btn">
          </form>
       	</div>
      </div>
      <?php include "footer.php";?>
      <script src="js/admin_script.js"></script>

</body>
</html>