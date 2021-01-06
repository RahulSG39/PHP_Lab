<?php
    if(isset($_POST['submit'])){
        $numbers  = explode(',', $_POST['numbers']);
        echo "The Entered Numbers: ";

        foreach($numbers as $key=>$value){
            echo $value." ";
        }

        echo "<br>";

        function count_numbers($numbers){
            echo "The Count: ".count($numbers)."<br>";
        }
        count_numbers($numbers);

        function prime_numbers($value){
            for($i = 2; $i <= $value/2; $i++){
                if($value%$i == 0){
                    return 0;
                }
            }
            return 1;
        }
        
        $prime = 0;
        foreach($numbers as $key=>$value){
            if(prime_numbers($value)){
                $prime++;
            }
        }
        echo "The Number Of Prime Numbers: ".$prime."<br>";

        function even_odd($numbers){
            $even = 0;
            $odd = 0;
            foreach($numbers as $key=>$value){
                if($value % 2 == 0){
                    $even++;
                }else{
                    $odd++;
                }
            }
            echo "The Number Of Even Numbers: ".$even."<br>";
            echo "The Number Of Odd Numbers: ".$odd."<br>";
        }
        even_odd($numbers);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q5</title>
</head>
<body>
    <form method="post">
        Enter the numbers:<input type="text" name="numbers"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>