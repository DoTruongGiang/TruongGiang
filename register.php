<html>
	<head>
		<title>sigin - Form đăng ký thành viên</title>
		<link rel="stylesheet" href="css/style-3.css">
	</head>
	<body>
		<?php
		require_once("connection.php");
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
 			$name = $_POST["name"];
  			$email = $_POST["email"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" || $name == "" || $email == "") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="SELECT * FROM users where username='$username'";
					$kt = mysqli_query($connect, $sql);
 
					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO users(
	    					username,
	    					password,
	    					name,
						    email
	    					) VALUES (
	    					'$username',
	    					'$password',
						    '$name',
	    					'$email'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($connect,$sql);
				   		echo "chúc mừng bạn đã đăng ký thành công";
					}
									    
					
			  }
	}
	?>
	<form action="register.php" method="post">
		<table>
			<b><h1>CREATE AN ACCOUT</h1></b>
			<hr>
			<tr>
				<td> <b> Username : </b> </td>
				<td><input type="text" id="username" placeholder="enter username" name="username" size="40" ></td>
			</tr>
			<tr>
				<td> <b> Password : </b> </td>
				<td><input type="password" id="pass" placeholder="enter password" name="pass" size="40"></td>
			</tr>
			<tr>
				<td> <b> Full name : </b> </td>
				<td><input type="text" id="name" placeholder="enter fullname" name="name" size="40"></td>
			</tr>
			<tr>
				<td> <b> Email : </b> </td>
				<td><input type="text" id="email" placeholder="enter your email" name="email" size="40"></td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2" tealign="center"><input type="submit" name="btn_submit" value="Dang ky" size="40"></td>

 
		</table>
 
	</form>
	</body>
	</html>