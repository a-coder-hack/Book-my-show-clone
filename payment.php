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
        <link rel="stylesheet" href="payment.css">
        
        <script src="jquery-3.4.1.min.js" async defer></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
    </head>
    <script>var a=[]; var row;var column;var b=0; var p=0; var movie="";var k=4;</script>
    <?php
                session_start();
                $a=$_GET['movie'];
                echo<<<_END
                            <script>
                                movie="$a";
                            </script>
_END;
                mysql_connect("localhost","root","");
			    mysql_select_db("bms");
                $query1="SELECT row,col from movies WHERE  id='$a'";
                $result1=mysql_query($query1);
                $b=mysql_fetch_array($result1);
                echo<<<_END
                            <script>
                                row=$b[0];
                                column=$b[1];
                            </script>
_END;
                $query1="SELECT value from $a";
                $result1=mysql_query($query1); 
                while($b=mysql_fetch_array($result1))
                {
                    echo<<<_END
                    <script>
                        b++;
                        a.push($b[0]);
                    </script>
_END;
                }
                $query1="SELECT price from movies where id='$a'";
                $result1=mysql_query($query1); 
                $b=mysql_fetch_array($result1);
                echo<<<_END
                    <script>
                        p=$b[0];
                    </script>
_END;
            ?>
    <body>
        <div class="header">
        </div>
       <center>
         <div class="content">
            <div class="key">
        <img  class ="pay" src="browser.png" alt="">
                <div>
                    <div class="t1">Movie : 
                    <?php
                            mysql_connect("localhost","root",""); 
                            mysql_select_db("bms"); 
                            $a=$_GET['movie'];
                            // echo $a;

                            $query="SELECT name from movies WHERE  id='$a'";
                            $r=mysql_query($query);
                            $ans=mysql_fetch_array($r);
                            echo $ans[0];
                        ?>
                    </div>
                    <div class="t1">Price : Rs.
                        <?php
                            echo $_GET['price'];
                        ?></div>
                </div>
            </div>
            
           <div class="payment">
               <img class = "pp paytm"   src="paytm-logo.png" onclick="done()" alt="">
               <img class = "pp pal"  src="paypal.png" onclick="done()" alt="">
               <img class = "pp amazon"  src="amazon-logo.png" onclick="done()" alt="">
           </div>
           <button class="btn" onclick="location.href='movie.php'">Cancel<br> Booking</button>
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
        <script>
        function done()
        {
            var f=-1;
            for(var i=1;i<=row;i++)
            {
                for(var j=1;j<=column;j++)
                {
                    f+=1;
                    if(a[f]==1)
                    {
                        a[f]=-1;
                    }
                    $.post('change.php',{postname:movie,postrow:i,postcol:j,postval:a[f]},function(data)
                                {
                                    console.log(data);
                                })
                }
            }

        document.querySelector('.content').innerHTML="<div class='key'><div class='home'>TICKET CONFIRMED<div class='confirm common_submit' onclick='home()'>HOME</div></div></div>";

        }
        function home()
        {
            location.href="movie.php";
        }
        </script>
    </body>
</html>