<?php
include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
	require_once "database_functions.php";
	$conn = db_connect();

	$query = "SELECT * FROM authors ORDER BY author_id";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty Author ! Something wrong! check again";
		exit;
	}

	$title = "List Of Authors";
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link rel="stylesheet" href="./css/style.css">


<!-------- font awesome cdn link --------->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />


<!------- swipper cdn link ------------>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
<style>
	li{
display: flex;
flex-wrap: wrap;
align-items: center;
justify-content: center;
	}
	 .a{
		border-radius: .5rem;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   padding:2rem 2rem;
   margin: 10px 10px 10px;
   text-align: center;
   border:var(--border);
   width: 800px;
   height: auto;
   font-size: 20px;
	}
</style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="head">
   <h3>our shop</h3>
   <p> <a href="home.php">home</a> / authors</p>
</div>
	<!-- <p class="lead">List of Author</p> -->
	<ul>
	<?php 
		while($row = mysqli_fetch_assoc($result)){
			$count = 0; 
			$query = "SELECT author_id FROM products";
			$result2 = mysqli_query($conn, $query);
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($autInBook = mysqli_fetch_assoc($result2)){
				if($autInBook['author_id'] == $row['author_id']){
					$count++;
				}
			}
	?>
		<li>
			<!-- <span class="badge"><?php echo $count; ?></span> -->
		    <a href="bookPeraut.php?autid=<?php echo $row['author_id']; ?>" class="a">  <b> <h3><?php echo $count; ?></h3><h2><?php echo $row['author_name']; ?></h2></b></a>
		</li>
	<?php } ?>
		<li>
			<a href="books.php">List full of books</a>
		</li>
	</ul>
	</body>
</html>
<?php
	mysqli_close($conn);
	require "footer.php";
?>