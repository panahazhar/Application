
 
 <?php 

if (isset($_POST['submit']) ) {


	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

$ProductName = $_POST['productName'];
$type = $_POST['items'];
$disc = $_POST['disc'];

$price = (is_numeric($_POST['Price']) ? (int)$_POST['Price'] : 0);


	$conn =  mysqli_connect('localhost','root','','store');
	
				if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
				}

	if ($error === 0) {
		if ($img_size > 12500000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

		
				$sql = "INSERT INTO products (my_img,ProductName,disc,Price,productType) 
				        VALUES('$new_img_name','$ProductName','$disc','$price','$type')";
				mysqli_query($conn, $sql);
				echo "tHanks";
				header("Location: pndex.php");
			}else {
				 echo "there is errror";
		        header("Location: pndex.php");
			}
		}
	}else {
		
		header("Location: form.html");
	}

}else {
	header("Location: show.php");
}
?>