<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="jquery-3.4.1.min.js" async defer></script>
        <link href="https://fonts.googleapis.com/css?family=Archivo&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="booking.css">
    </head>
    <body>
    <script>var a=[]; var b=0; var p=0; var movie="";var k=4;</script>
        <!-- <form id="w1">
            Row:<br>
            <input type="number" name="ro" id="row"><br>
            Column:<br>
            <input type="number" name="col" id="column"><br>
            <input type="submit" value="submit"><br>
        </form>
        <center> -->
        <div class="header">Price - <span class="price"></span></div>
            <div class="store">
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
                echo "<div class='row'>".$b[0]."</div><div class='col'>".$b[1]."</div><br>";
            ?>
            </div>
            <center>
        <table  id="matrix">
            
        </table>
        <div class="confirm common_submit" onclick='redirect()'>CONFIRM SEAT</div>
        <!-- <div class="common_submit payment" onclick='redirect()'>PAYMENT </div> -->
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
        <?php
                        $a=$_GET["movie"];
                        mysql_connect("localhost","root",""); 
                        mysql_select_db("bms"); 
                    
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
        <script>
                var row=document.querySelector('.row').textContent;
                var column=document.querySelector('.col').textContent;
                console.log(movie);        
                console.log(b);
                we();
            function we()
            {
                console.log(row+" "+column);
                var x=document.getElementById('matrix');
                var k="";
                k+="<th>"
                for(var i=1;i<=column;i++)
                {
                    k+="<td> "+i+"</td>" ;
                }
                var f=-1;
                for(var i=0;i<row;i++)
                {
                    var ro=i;
                    ro+=1;
                    k+="<tr class='trow' ><td> "+ro+"</td>";
                    for(var j=0;j<column;j++)
                    {
                        f+=1;
                        // var sum=j;
                        var k1="";
                        if(a[f]!=-1)
                        {
                            if(a[f]!=0)
                            {
                                var temp_row=row+1;
                                var temp_col=column+1;
                                var r_ide=f/row;
                                var c_ide=f%column;
                                r_ide++;
                                c_ide++;
                                a[f]=0;
                                r_ide=parseInt(r_ide);
                                $.post('change.php',{postname:movie,postrow:r_ide,postcol:c_ide,postval:a[f]},function(data)
                                {
                                    console.log(data);
                                })
                            }
                            k1+="<td><div  id='"+f+"' class='chair chair_back' onclick='getId(this)'></div></td> ";
                        }
                        else
                        k1+="<td><div  id='"+f+"' class='chair chair_black'></div></td> ";
                        k+=k1;
                    }
                }
                k+="<div class='screen'>SCREEN THIS WAY</div>";
                // console.log(k);
                x.innerHTML=k;
            }
            var seat=0;
            console.log(p);
            var price=0;
            function  getId(element) 
            {
                var ide=element.id;
                console.log(ide);
                if(a[ide]==0)
                {
                    seat+=1;
                    a[ide]=1;
                    var temp_row=row+1;
                    var temp_col=column+1;
                    var r_ide=ide/row;
                    var c_ide=ide%column;
                    r_ide++;
                    c_ide++;
                    r_ide=parseInt(r_ide);
                    console.log(r_ide+" "+c_ide);
                    // document.getElementById(s).style.background="red";
                    console.log(element.classList);
                    element.classList.remove("chair_back");
                    element.classList.add("chair_back_color");
                    $.post('change.php',{postname:movie,postrow:r_ide,postcol:c_ide,postval:a[ide]},function(data)
                        {
                            console.log(data);
                        })
                }
                else
                {
                    seat-=1;
                    a[ide]=0;
                    // var p=(x+1)*10+(y+1);
                    element.classList.remove("chair_back_color");
                    element.classList.add("chair_back");
                }
                price=seat*p;
                document.querySelector('.price').innerHTML="Rs."+price;
            }
            function redirect()
            {
                location.href="payment.php?movie="+movie+"&price="+price;
            }
            </script>
    </body>
</html>