<?php
include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
	header('location:login.php');
}
require_once "database_functions.php";
// get pubid
if (isset($_GET['autid'])) {
	$autid = $_GET['autid'];
} else {
	echo "Wrong query! Check again!";
	exit;
}

// connect database
$conn = db_connect();
$AutName = getAutName($conn, $autid);

$query = "SELECT book_isbn, book_name, book_image FROM products WHERE author_id = '$autid'";
$result = mysqli_query($conn, $query);
if (!$result) {
	echo "Can't retrieve data " . mysqli_error($conn);
	exit;
}
if (mysqli_num_rows($result) == 0) {
	echo "Empty books ! Please wait until new books coming!";
	exit;
}

$title = "Books Per Author";


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

	<style>
		.author {
			max-width: 120px;
			margin: 0 auto;
			display: grid;
			grid-template-columns: repeat(auto-fit, 30rem);
			align-items: flex-start;
			gap: 1rem;
			justify-content: center;
		}

		.author .box {
			border-radius: .5rem;
			background-color: var(--white);
			box-shadow: var(--box-shadow);
			padding: 2rem;
			text-align: center;
			border: var(--border);
			position: relative;
		}

		.author .box .image {
			height: 30rem;
		}

		.author .box .name {
			padding: 1rem 0;
			font-size: 2rem;
			color: var(--black);
		}
	</style>
</head>

<body>
	<?php include 'header.php'; ?>
	<div class="head">
		<h3>Author</h3>
		<p> <a href="home.php">author</a> / <?php echo $AutName; ?></p>
	</div>
	<!-- <p class="lead"><a href="author_list.php">Authors</a> > <?php echo $AutName; ?></p>
	<?php while ($row = mysqli_fetch_assoc($result)) {
	?> -->
	<div class="author">
		<form action="" method="post" class="box">
			<img class="image" src="./uploaded_img/<?php echo $row['book_image']; ?>">
			<div class="name"><?php echo $row['book_name']; ?></div>
			<a href="book.php?bookisbn=<?php echo $row['book_isbn']; ?>" class="btn btn-primary">Get Details</a>
			<input type="submit" value="add to cart" name="add_to_cart" class="btn">
		</form>
	</div>
	<br>
</body>

</html>
<?php
	}
	if (isset($conn)) {
		mysqli_close($conn);
	}
	require "footer.php";
?>