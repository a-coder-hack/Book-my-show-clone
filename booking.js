

var row=document.querySelector('.row').textContent;
var column=document.querySelector('.col').textContent;

var k="";
// for(var i=1;i<=row;i++)
// {
//     for(var j=1;j<=column;j++)
//     {
//        // k='<?php $a=$_GET["movie"]; mysql_connect("localhost","root",""); mysql_select_db("bms"); $query1="SELECT id from $a WHERE  row=\''+i+'\' AND col=\''+j+'\'"; $result1=mysql_query($query1); $b=mysql_fetch_array($result1); echo $b[0]; ?>';
//         document.querySelector('.row').innerHTML=k;
//         k=document.querySelector('.row').textcontent;
//         console.log(k);
//     }
// }
console.log(row+" "+column);
var a=document.getElementById('matrix');
var x=0;
var y=0;

var b=[];
we();
function we()
{
    console.log(row+" "+column);
    var k="";
    k+="<th>"
    for(var i=1;i<=column;i++)
    {
        k+="<td> "+i+"</td>" ;
    }
    for(var i=1;i<=row;i++)
    {
        b[i]=[];
        k+="<tr class='trow' ><td> "+i+"</td>";
        for(var j=1;j<=column;j++)
        {
            // var sum=j;
            var k1="";
            k1+="<td id='"+i+j+"'><div class='chair chair_back' onclick='getId(this)'></div></td> ";
            k+=k1;
            b[i][j]=0;
        }
    }
    k+="<div class='screen'>SCREEN THIS WAY</div>";
    // console.log(k);
    a.innerHTML=k;
}

// document.getElementById('w1').addEventListener('submit',yes);

// function yes(xz)
// {
//     xz.preventDefault();
//     row=document.getElementById('row').value;
//     column=document.getElementById('column').value;
//     console.log(row+" "+column);
//     var k="";
//     for(var i=1;i<=row;i++)
//     {
//         b[i]=[];
//         k+="<tr class='trow' > ";
//         for(var j=1;j<=column;j++)
//         {
//             // var sum=j;
//             var k1="";
//             k1+="<td id='"+i+j+"'><div class='chair chair_back' onclick='getId(this)'></td> ";
//             k+=k1;
//             b[i][j]=0;
//         }
//     }
//     console.log(k);
//     a.innerHTML=k;
// }
function  getId(element) {
    x=element.parentNode.parentNode.rowIndex;
    y=element.parentNode.cellIndex;
    console.log("row" + x + 
    " - column" + y);
    console.log(b[x][y]+" "+x+" "+y);
    if(b[x][y]==0)
    {
        b[x][y]=1;
        var s="";
        s=x+""+y;
        console.log(s);
        // document.getElementById(s).style.background="red";
        // console.log(element.classList);
        element.classList.remove("chair_back");
        element.classList.add("chair_back_color");
    }
    else
    {
        b[x][y]=0;
        // var p=(x+1)*10+(y+1);
        var s="";
        s=x+""+y;
        console.log(s);
        element.classList.remove("chair_back_color");
        element.classList.add("chair_back");
    }
    console.log("HELLO");
    for(var i=1;i<=row;i++)
    {
        console.log("  "+i+"  ");
        for(var j=1;j<=column;j++)
        {
            console.log(b[i][j]+" ");
        }
    }
}