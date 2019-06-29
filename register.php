

<?php
	
	
	
	
	<?php $a=$_GET["movie"];
	mysql_connect("localhost","root",""); 
	mysql_select_db("bms");
	$query1="SELECT value from $a WHERE  row='+i+' AND col='+j+'";
	$result1=mysql_query($query1);
	$b=mysql_fetch_array($result1);
	echo "$b[0]"
	
	
	
	
	
	
	
	
	mysql_connect("localhost","root","");
		mysql_select_db("bms");
		$r=mysql_query("SELECT row,col FROM movies where name='Endgame'");
		$g=mysql_fetch_array($r);
		mysql_query("CREATE TABLE endgame(row varchar(100),col varchar(100),id varchar(100))");
		for($i=1;$i<=$g[0];$i++)
		{
		for($j=1;$j<=$g[1];$j++)
		{
			mysql_query("INSERT INTO endgame VALUES('$i','$j','0')");
		}
		}
		
		
		
		
		
		
    mysql_connect("localhost","root","");
    mysql_select_db("bms");
$m=$_POST['username_signup'];
$n=$_POST['password__signup'];
$o=$_POST['email_signup'];
$p=$_POST['phone_signup'];

if($m=="" || $n=="" || $o=="" || $p=="" )
{
    echo "Fill required";
}

else
{
    $query="SELECT * from user WHERE username='$m' AND password='$n'";
    $result=mysql_query($query);
    $row=mysql_num_rows($result);
    if($row==0)
    {
        $query1="INSERT INTO student(username,password,email,phone) VALUES('$m','$n','$o','$p')";
        mysql_query($query1);
        header('Location:movie.php');
    }
    else
    {
        echo "User already exits";
    }
}

?>