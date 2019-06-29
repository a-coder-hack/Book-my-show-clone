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
        <link rel="stylesheet" href="admin.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    </head>
  
    <body>
    <?php
    // echo "php<br>";
    if(isset($_POST['form'])){
        // echo "INSIDE<br>";
        $name=$_POST['name'];
        $like=$_POST['like'];
        $imgsrc=$_POST['imgsrc'];
        $row=$_POST['row'];
        $col=$_POST['col'];
        $id=$_POST['id'];
        $price=$_POST['price'];
        $des=$_POST['des'];
        // echo $name;
        // echo "<br>";
        // echo $like;
        // echo "<br>";
        // echo $imgsrc;
        // echo "<br>";
        // echo $row;
        // echo "<br>";
        // echo $col;
        // echo "<br>";
        // echo $id;
        // echo "<br>";
        // echo $price;
        // echo "<br>";
        // echo $des;
        // echo "<br>";
        mysql_connect("localhost","root","");
            mysql_select_db("bms");
		if($name=="" || $like=="" || $imgsrc=="" || $row=="" || $col=="" || $id=="" || $price=="" || $des=="")
		{
			echo<<<_END
			<script language='javascript'>
			alert('Fill required');
			</script>
_END;
        }
		else
		{
            $q="SELECT * from movies where id='$id'";
            $r=mysql_query($q);
            $no=mysql_num_rows($r);
            if($no!=0)
            {
                echo<<<_END
                <script language='javascript'>
                alert('Movie Already Exists');
                </script>
_END;
            }
            else
            {
                $query="INSERT INTO movies VALUES('$name','$like','$imgsrc','$des','$row','$col','$id','$price')";
                mysql_query($query);
                mysql_query("CREATE TABLE $id(row varchar(100),col varchar(100),value varchar(100))");
                for($i=1;$i<=$row;$i++)
                {
                for($j=1;$j<=$col;$j++)
                {
                    mysql_query("INSERT INTO $id VALUES('$i','$j','0')");
                }
                }
                echo<<<_END
                <script language='javascript'>
                alert('Movie Added');
                </script>
_END;

        }
    }
    }
    ?>  
        <div class="header">
        <center>
        <div class="user">Welcome ADMIN</div><input type='button' class='logout' onclick='location.href="index.php"' value='Logout'></center>
        </div>
        <center>
        <div class="content">
                <a name="transfer"></a>
                <a href="#transfer">
        <div class="nav">
            
            <div id="ADD" class="ADD common_nav">ADD</div>
        </div></a>
        <div class="forms">
        <form class="add common"  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h2> ADD MOVIE </h2>
            <input type="hidden" name="form" value="A">
            <input type="text" placeholder="MOVIE NAME" name="name" class="movie_name"><br>
            <input type="number" placeholder="LIKES" name="like" class="likes"><br>
            <input type="text" placeholder="IMAGE SRC" name="imgsrc"><br>
            <input type="number" placeholder="ROW" name="row"><br>
            <input type="number" placeholder="COLUMN" name="col"><br>
            <input type="text" placeholder="ID" name="id"><br>
            <input type="number" placeholder="COST/SEAT" name="price"><br>
            <textarea rows="4" cols="50" name="des" placeholder="DESCRIPTION"></textarea>
            <input type="submit" value="SUBMIT" class="submit">
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
        <script src="" async defer></script>
    </body>
</html>