<?php

    $a=$_POST['postrow'];
    $b=$_POST['postcol'];
    $c=$_POST['postval'];
    $d=$_POST['postname'];
    mysql_connect("localhost","root",""); 
    mysql_select_db("bms"); 
    $q="UPDATE  $d set value='$c' where row='$a' and col='$b'";
    mysql_query($q);
    echo $a." ".$b." ".$c." ".$d;
?>