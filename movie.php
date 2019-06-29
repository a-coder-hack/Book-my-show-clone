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
        <link rel="stylesheet" href="movie.css">
        <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="user">
        <?php
        session_start();
        if(isset($_SESSION['name']))
        {
            $name=$_SESSION['name'];
            $n=strtoupper($name);
//             echo<<<_END
// 			<script language='javascript'>
// 			alert('Welcome $n');
//             </script>
// _END;
            echo "Welcome <center>".$n."</center>";   
        }
    ?>
        </div>
        <div class="header">
        </div>
        <center>
        <div class="content">
                <a name="transfer"></a>
                <a href="#transfer">
        <div class="nav">
            
            <div class="movie_nav common_nav">Movies</div>
        </div></a>
        <div id="container">
            <!-- <div class="kabirsingh mov">
                <img class="poster" src="kabirsingh.jpg" alt="Kabir Singh" >
                <div class="kabirsingh_des des">This is awesome movie<br></div>
                <img class="heart" src="heart.png">
                <input type="button" id="gameover_book" class="book" value="BOOK">
                <span class="per">92%</span>
                <span class="name">Kabir Singh</span>
            </div> -->
            <?php
            mysql_connect("localhost","root","");
            mysql_select_db("bms");
            $query="SELECT * from movies";
            $result=mysql_query($query);
            while($row=mysql_fetch_array($result)){
           //echo $row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5]." ".$row[6]." ".$row[7];
            echo "<div class='mov'><img class='poster' src=' ".$row[2]." ' alt='".$row[0]."'><div class='des'>".$row[3]."<br></div><img class='heart' src='heart.png'><input type='button' id='".$row[6]."' class='book' value='BOOK' onclick='getId(this)'><span class='per'>".$row[1]."%</span><span class='name'>".$row[0]."</span></div>";}
            ?>
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
        <script src="movie.js" async defer></script>
    </body>
</html>