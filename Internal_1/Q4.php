<?php 
    $nameErr = $emailErr = $genErr = $dobErr = $usnErr = "";

    if(isset($_POST['submit'])){
        $semester = $_POST['semester'];
        
        if(!empty($_POST['name'])){
            if(!preg_match("/^[a-zA-Z]*$/", $_POST['name'])){
                $nameErr = "Name should contain only letters and whitespaces<br>";    
            }else{
                if(strlen($_POST['name'])>30){
                    $nameErr = "Error! Name should be under 30 characters!<br>";
                } 
                $name = $_POST['name']; 
            }
        }else{
            $nameErr = "Name empty<br>";
        }
        
        if(empty($_POST['gen'])){
            $genErr = "Must select one gender<br>";
        }else{
            $gender = $_POST['gen'];
        }

        if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
        } else {  
                $email = $_POST["email"];  
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                    $emailErr = "Invalid email format";  
                }  
        } 

        if(empty($_POST['usn'])){
            $usnErr = "USN is required";
        }else{
            $usn = $_POST['usn'];
            if(!preg_match("/^1M[YS]19MCA[0-9]{2}$/", $usn)){
                $usnErr = "Invalid USN format";
            }
        }
            
        if(!empty($_POST['dob'])){
            $dob = $_POST['dob'];
            $birthdate = date_create($dob);
            $today = date_create(date("Y-m-d"));
            $diff =  date_diff($birthdate, $today);
            $age = $diff->format('%Y');
        }
        else{
            $dobErr = "Date Of Birth cannot be empty";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q4</title>
</head>
<body>
    <form method="post">

        Name:<input type="text" name="name"><?php echo $nameErr;?><br><br>
        USN:<input type="text" name="usn" ><?php echo $usnErr;?><br><br>
        E-Mail:<input type="email" name="email"><?php echo $emailErr;?><br><br>
        DOB:<input type="date" name="dob"><br><br>
        Present Age:<input type="digit" name="age" disabled value="<?php if(!empty($dob)){echo $age;} ?>"><br><br>
        Gender: <input type="radio" name="gen" value="male" >Male
                <input type="radio" name="gen" value="female">Female<br><br>
        Subjects Known: <br>
        <input type="checkbox" name="c">C<br>
        <input type="checkbox" name="c++">C++<br>
        <input type="checkbox" name="java">Java<br>
        <input type="checkbox" name="php">PHP<br><br>
        Semester:
        <select name="semester">
            <option value="1">I</option>
            <option value="2">II</option>
            <option value="3">III</option>
            <option value="4">IV</option>
            <option value="5">V</option>
            <option value="6">VI</option>
        </select><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>

