<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sigin - Form dang nhap</title>
    <link rel="stylesheet" href="css/style-2.css">
</head>

<body>
    <?php
        require_once("connection.php");
		if (isset($_POST["btn_submit"])) {
            //lấy thông tin từ các form bằng phương thức POST
            $username = $_POST["username"];
            $password = $_POST["password"];
            //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
            if ($username == "" || $password == "") {
                echo "bạn vui lòng điền đầy đủ thông tin";
			}else{
  					// Kiểm tra tài khoản đã đăng ký chưa
                    $sql="SELECT * FROM users where username='$username'";
					$kt = mysqli_query($connect, $sql);//truy van
 					if(mysqli_num_rows($kt) <=0){// tra ve soluong ketqua kiemtra
						echo "Tài khoản này chưa được đăng ký";
					}else{ 
                        $sql1="SELECT password FROM users where username='$username'";
                        $kt1 =  mysqli_query($connect, $sql1);
                        if ( mysqli_num_rows($kt1) <=0 ){
                            echo " password sai mời bạn nhập lại";
                        }else{                           
                            header("Location:http://localhost:81/html/project/giaodien.html");
                        }
                    }

                 }   
            }
    ?>




    <div class="containerlogin">
        <!-- Button đăng nhập để mở form đăng nhập -->
        <button id="myBtn">LOGIN</button>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Nội dung form đăng nhập -->
            <div class="modal-content">
                <form action="dangnhap.php" method="POST">
                    <span class="close">&times;</span>
                    <b>
                        <h2>ENJOYS FOOD </h2>
                    </b>
                    <div class="fomrgroup">
                        <b>UserName:</b>
                        <input type="text" placeholder="Enter Username" name="username" required>
                    </div>
                    <div class="fomrgroup">
                        <b>PassWord:</b>
                        <input type="password" placeholder="Enter Password" name="password" required>
                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                    <div class="fomrgroup">
                        <br><button name="btn_submit">LOGIN</button><br>
                    </div>
                    <div class="container" style="background-color:#f1f1f1">
                        <span class="psw">Forgot <a href="#">password?</a> <a href="register.php">Signup</a></span>
                        <button type="button" onclick="document.getElementById('myModal').style.display='none'" class="cancelbtn">Cancel</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // lấy phần Modal
        var modal = document.getElementById('myModal');

        // Lấy phần button mở Modal
        var btn = document.getElementById("myBtn");

        // Lấy phần span đóng Modal
        var span = document.getElementsByClassName("close")[0];

        // Khi button được click thì mở Modal
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // Khi span được click thì đóng Modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // Khi click ngoài Modal thì đóng Modal
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>