<?php
    $xmldoc = simplexml_load_file('Q6.xml');    
    echo "<h1>Book Details for books under Category of Programming:</h1>";
    for($i = 0; $i < 4; $i++){
        if($xmldoc->book[$i]->category == "Programming"){
            echo $xmldoc->book[$i]->author."<br>";
            echo $xmldoc->book[$i]->price."<br>";
            echo $xmldoc->book[$i]->ISBN."<br>";
            echo $xmldoc->book[$i]->category."<br>"."<br>"."<br>";
        }
    }

?>