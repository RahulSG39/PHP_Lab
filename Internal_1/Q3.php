<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q3</title>
</head>
<body>
    <form method="POST">
        <h1>Square</h1>
            <input type="text" name="side" placeholder="Enter side...">
        <h1>Rectangle</h1>
            <input type="text" name="length" placeholder="Enter length..."><br>
            <input type="text" name="breadth" placeholder="Enter breadth...">
        <h1>Circle</h1>
            <input type="text" name="radius" placeholder="Enter radius..."><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])){

        $side=$_POST['side'];
        $length=$_POST['length'];
        $breadth=$_POST['breadth'];
        $radius=$_POST['radius'];

        interface Shape{
            public function area();
        }
    
        class Square implements Shape{
            
            private $s;

            public function __construct($side){
                $this->s = $side;
            }

            public function area(){
                $area = $this->s * $this->s;
                echo "<h3>Area of Square: ".$area."<h3>";
            }
        }

        class Rectangle implements Shape{
            
            private $l, $b;

            public function __construct($length, $breadth){
                $this->l = $length;
                $this->b = $breadth;
            }

            public function area(){
                $area = $this->l * $this->b;
                echo "<h3>Area of Rectangle: ".$area."</h3>";
            }
        }

        class Circle implements Shape{
            
            private $r;

            public function __construct($radius){
                $this->r = $radius;
            }

            public function area(){
                $area = 3.14 * $this->r * $this->r;
                echo "<h3>Area of Circle: ".$area."</h3>";
            }
        }

        $Square = new Square($side);
        $Square->area();
        
        $Rectangle = new Rectangle($length,$breadth);
        $Rectangle->area();
       
        $Circle = new Circle($radius);
        $Circle->area();
    }
?>