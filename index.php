<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bookmyshow</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    </head>

    <?php
    if(isset($_POST['form'])){

    if($_POST['form']=="A")
	{
		session_start();
		$m=$_POST['username_login'];
		$n=$_POST['password_login'];
		if($m=="" || $n=="")
		{
			echo<<<_END
			<script language='javascript'>
			alert('Fill required');
			</script>
_END;
		}

		else
		{
			mysql_connect("localhost","root","");
			mysql_select_db("bms");
			$query1="SELECT * from admin WHERE username='$m' AND password='$n'";
			$result1=mysql_query($query1);
			$row1=mysql_num_rows($result1);
			if($row1!=0)
            {
            header("Location:admin.php");
			}
			else
			{
				$query="SELECT * from user WHERE username='$m' AND password='$n'";
				$result=mysql_query($query);
				$row=mysql_num_rows($result);
				if($row==0)
				{
					echo<<<_END
				<script language='javascript'>
				alert('Invalid username or password');
				</script>
_END;
				}
				else
				{
					$_SESSION['name']=$m;
					echo<<<_END
				<script language='javascript'>
				alert('Welcome $m ');
				</script>
_END;
				header("Location:movie.php");
				}
			}
		}
	}
	else if($_POST['form']=="B")
	{

		$m=$_POST['username_signup'];
		$n=$_POST['password_signup'];
		$o=$_POST['email_signup'];
		$p=$_POST['phone_signup'];
		if($m=="" || $n=="" || $o=="" || $p=="" )
		{
			echo<<<_END
			<script language='javascript'>
			alert('Fill required');
			</script>
_END;
		}

		else
		{
			mysql_connect("localhost","root","");
            mysql_select_db("bms");
            $query1="SELECT * from admin WHERE username='$m' AND password='$n'";
			$result1=mysql_query($query1);
            $row1=mysql_num_rows($result1);
            $query="SELECT * from user WHERE username='$m' AND password='$n'";
			$result=mysql_query($query);
			$row=mysql_num_rows($result);
            if($row1!=0)
			{
				echo<<<_END
			<script language='javascript'>
			alert('User already exits');
			</script>
_END;
			}
			else if($row==0)
			{
				$query1="INSERT INTO user(username,password,email,phone) VALUES('$m','$n','$o','$p')";
				mysql_query($query1);
				echo<<<_END
			<script language='javascript'>
			alert('Successfuly Registered');
			</script>
_END;
			}
			else
			{
				echo<<<_END
			<script language='javascript'>
			alert('User already exits');
			</script>
_END;
			}
		}
	}
}
?>
    <body>
        <div class="header">
        </div>
        <center>
        <div class="content">
                <a name="transfer"></a>
                <a href="#transfer">
        <div class="nav">
            
            <div id="change_login" class="login_nav common_nav">Login</div>
            <div id="change_signup" class="signup_nav common_nav">Signup</div>
        </div></a>
        <div class="forms">
        <form class="login common" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h2 class="login_header"> Login </h2>
                <input type="hidden" name="form" value="A">
                <input type="text" placeholder="USERNAME" name="username_login" class="username_login"><br>
                <input type="password" placeholder="PASSWORD" name="password_login" class="password_login"><br>
                <input type="submit" value="Login" class="submit">
            </form>
        <form class="signup common"  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h2> Signup </h2>
            <input type="hidden" name="form" value="B">
            <input type="text" placeholder="USERNAME" name="username_signup" class="username_signup "><br>
            <input type="password" placeholder="PASSWORD" name="password_signup" class="password_signup "><br>
            <input type="text" placeholder="EMAIL" name="email_signup" class="email_signup"><br>
            <input type="number" placeholder="PHONE NO." name="phone_signup" class="phone_signup"><br>
            <input type="submit" value="Sign Up" class="submit">
        </form>
        </div>
    </div>
        </center>
    
        <div class="footer">
            <div class=logo>
                    <div class="bsm"><img class="bms-footer" src="bookmyshow_vector.jpg"></div>
            <div class="copyright">
                
                BookMyShow © 2019-2020
            </div>
        </div>
        <div class="contact">
            <div class="con">Contact Us</div>
            <div class="detail">
                Phone: 66023234<br>
                Email: bookmyshow@gmail.com<br>
                Address: Delhi, India<br>
            </div>
        </div>
            </div>
        <script src="app.js" async defer></script>
    </body>
</html>