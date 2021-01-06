<?php   
    if(isset($_POST['submit'])){
        $string = strtoupper($_POST['string']);
        if(!empty($string)){
                $vowel_count = 0;
                $consonant_count = 0;
                $palindrome = FALSE;
                if($string == strrev($string)){
                    $palindrome = TRUE;
                }
                for($i = 0; $i < strlen($string); $i++){
                    if($string[$i] == 'A' || $string[$i] == 'E' || $string[$i] == 'I' || $string[$i] == 'O' || $string[$i] == 'U' ){
                        $vowel_count++;
                    }
                    else
                        $consonant_count++;
                }
        }else{
            echo "Please enter a non empty string";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q1</title>
</head>
<body>  
    <form method="post">
        <input type="text" name="string" placeholder="Enter a string: "><br>
        <input type="submit" name="submit" value="Find">
    </form>
    <h1>
    <?php
        if(isset($_POST['submit'])){
            if(!empty($string)){
                if($palindrome == TRUE){
                    echo "<h1>The given string '$string' is a Palindrome.</h1>";
                }else{
                    echo "<h1>The given string '$string' is not a Palindrome.</h1>";
                }
                echo "<h1>Number of Vowels: $vowel_count</h1>";
                echo "<h1>Number of Consonant: $consonant_count</h1>";
                echo "<h1>The occurance of 'a'/'A': ".preg_match_all("/[a]/i",$string); 
                echo "<h1>The occurance of 'e'/'E': ".preg_match_all("/[e]/i",$string); 
                echo "<h1>The occurance of 'i'/'I': ".preg_match_all("/[i]/i",$string); 
                echo "<h1>The occurance of 'o'/'O': ".preg_match_all("/[o]/i",$string); 
                echo "<h1>The occurance of 'u'/'U': ".preg_match_all("/[u]/i",$string); 
        }
    }
    ?>
</body>
</html>