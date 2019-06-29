<?php

    $a=$_POST['postrow'];
    $b=$_POST['postcol'];
    $c=$_POST['postval'];
    $d=$_POST['postname'];
    mysql_connect("localhost","root",""); 
    mysql_select_db("bms"); 
    $f=-1
    for($i=1;$i<=$a;$i++)
    {
        for($j=1;$j<=$b;$j++)
        {
            $f+=1;
            echo $f."<br>";
            $q="UPDATE  $d set value='$c[$f]' where row='$i' and col='$j'";
            mysql_query($q);
        }
    }
?>