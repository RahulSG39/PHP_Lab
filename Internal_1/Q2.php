<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Q2</title>
  </head>
  <body>
    <form method="POST">
      <input type="radio" name="rad" value="display" />Display<br />
      <input type="radio" name="rad" value="insert" />Insert<br />
      <input type="radio" name="rad" value="count" />Count<br />
      <input type="radio" name="rad" value="delete" />Delete<br />
      <input type="radio" name="rad" value="sort" />Sort<br />
      <input type="radio" name="rad" value="reverse" />Reverse<br />
      <input type="submit" name="submit" value="Check" />
    </form>
  </body>
</html>

<?php
    $arr = [
        "Name" => "Rahul",
        "USN" => "1MY19MCA11",
        "Sem" => 3, 
        "Age" => 23
    ];

    if (isset($_POST['submit'])) {
        
        if(!empty($_POST['rad'])){

            $opt = $_POST['rad'];

            switch($opt){

                case "display":
                    echo "The array is displayed below:</br>";
                    foreach($arr as $key=>$value){
                        echo $key." : ".$value."<br>";
                    }
                    break; 

                case "insert":
                    echo "After inserting an element:<br>";
                    $arr["College"] = "MSRIT";
                    foreach($arr as $key=>$value){
                        echo $key." : ".$value."<br>";
                    }
                    break;

                case "count":
                    $count = count($arr);
                    echo "The number of elements in the array are: $count";
                    break;

                case "delete":
                    echo "Array after deleting Name element key:<br>";
                    unset($arr['Name']);

                    foreach($arr as $key=>$value){
                        echo $key." : ".$value."<br>";
                    }
 
                    echo "Array after deleting value of 3:<br>";
                    foreach ($arr as $key => $value) {
                        if ($value == 3) {
                            unset($arr[$key]);
                        }
                    }
                    foreach($arr as $key=>$value){
                        echo $key." : ".$value."<br>";
                    }
                    break;

                case "sort":
                    echo "Array after sorting by keys:<br>";
                    ksort($arr);
                    foreach($arr as $key=>$value){
                        echo $key." : ".$value."<br>";
                    }
                    echo "Array after sorting by values:<br>";
                    asort($arr);
                    foreach($arr as $key=>$value){
                        echo $key." : ".$value."<br>";
                    }
                    break;

                case "reverse":
                    krsort($arr);
                    echo "The array after reversal is:</br>";
                    foreach($arr as $key=>$value){
                        echo $key." : ".$value."<br>";
                    }
                    break;
            }   
        }
    }
?>
