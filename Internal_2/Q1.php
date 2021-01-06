<?php  
  
session_start(); 
   
if(!isset($_SESSION['count']))
{ 
    $_SESSION['count']= 1;
    $_SESSION['count'] = $_SESSION['count']+1; 
} 
else
    $_SESSION['count'] = 1;

      
echo"<h1>Using Session : </h1>  No of times visited = ".$_SESSION['count']; 
echo '<br>';
echo "<br>";

$cookie_count = 0;
if(!isset($_COOKIE['countVisit']))
{
    setcookie('countVisit', "yes",  time()+3600);
    $cookie_count++;
    echo $cookie_count;
}
echo "<h1>Using Cookie : </h1>  This is your visit number ".$cookie_count;
echo '<br>';


?>