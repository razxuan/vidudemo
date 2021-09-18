<?php
include 'config.php';

if( isset($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != '' && $_POST["repassword"] != ''){
	// thực hiện xử lý khi người dùng ấn nút submit và điền đầy đủ thông tin
	$username = $_POST["username"];
	$password = $_POST["password"];
	$repassword = $_POST["repassword"];
	$level = 0;
	if( $password != $repassword){
		header("location:login.php");
	}
	$sql ="SELECT * FROM dk WHERE username='$username'";
	$old = mysqli_query($conn,$sql);
	$password = md5($password);
	if( mysqli_num_rows($old) > 0 ) {
		header("location:login.php");
	}
	$sql = "INSERT INTO dk (username,password,level) VALUES ('$username','$password','$level') ";
	mysqli_query($conn,$sql);
	echo " Đã đăng ký thành công";
}else {
	//header("location:login.php");
}

?>