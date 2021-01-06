<?php 
//------------------ Insertion || Department ----------------------//

    if(isset($_POST['submit_dept'])){

        if(!empty($_POST['dept_id'] && $_POST['dept_name_2'])){
            $dept_id = $_POST['dept_id'];
            $dept_name = $_POST['dept_name_2'];
            
            $dept_con = mysqli_connect('localhost','root','','emp_dept');
            if(!$dept_con){
                echo "Connection Error". mysqli_connect_error();
            }

            $dept_insert_query = "INSERT INTO Department(Dept_id,Dept_Name) VALUES('$dept_id','$dept_name')";

            if(!mysqli_query($dept_con, $dept_insert_query)){
                echo "Data could not be inserted". mysqli_error($dept_con);
            }else
                echo "Data inserted successfully<br>";
        }else
            echo "Name and ID cannot be empty";
    }

//------------------ Insertion || Employee ----------------------//

    if(isset($_POST['submit_emp'])){

        if(!empty($_POST['emp_id'] && $_POST['emp_name'] && $_POST['dept_name'] && $_POST['salary'])){
            $emp_id = $_POST['emp_id'];
            $emp_name = $_POST['emp_name'];
            $dept_name = $_POST['dept_name'];
            $salary = $_POST['salary'];
            
            $emp_con = mysqli_connect('localhost','root','','emp_dept');
            if(!$emp_con){
                echo "Connection Error". mysqli_connect_error();
            }

            $emp_insert_query = "INSERT INTO Employee(Emp_id,Emp_Name,Dept_Name,Salary) VALUES('$emp_id','$emp_name', '$dept_name', '$salary')";

            if(!mysqli_query($emp_con, $emp_insert_query)){
                echo "Data could not be inserted". mysqli_error($emp_con);
            }else
                echo "Data inserted successfully<br>";
        }else
            echo "Name and ID cannot be empty";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q3</title>
</head>
<body>
    <form method="POST">
        <table>
            <th>Department Details</th>
            <tr>
                <td>Department ID:</td>
                <td><input type="text" name="dept_id"></td>
            </tr>
            <tr>
                <td>Department Name:</td>
                <td><input type="text" name="dept_name_2"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit_dept" value="Insert"></td>
                <td><input type="reset" value="Clear"></td>
            </tr>
        </table>
        <br><br>
        <table>
            <th>Employee Details</th>
            <tr>
                <td>Employee ID:</td>
                <td><input type="text" name="emp_id"></td>
            </tr>
            <tr>
                <td>Employee Name:</td>
                <td><input type="text" name="emp_name"></td>
            </tr>
            <tr>
                <td>Department Name:</td>
                <td><input type="text" name="dept_name"></td>
            </tr>
            <tr>
                <td>Salary:</td>
                <td><input type="text" name="salary"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit_emp" value="Insert"></td>
                <td><input type="reset" value="Clear"></td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php

    //-------- Department Wise Emp Names ------------//

    $emp_con = mysqli_connect('localhost','root','','emp_dept');
    if(!$emp_con){
        echo "Connection Error". mysqli_connect_error();
    }

    $dept_wise_names = "SELECT Emp_Name,Dept_Name,Salary FROM Employee ORDER BY Dept_Name";

    $emp_names_query = mysqli_query($emp_con, $dept_wise_names);

    if(!$emp_names_query){
        echo "Wrong Query". mysqli_error($emp_con);
    }

    $emp_name_list = mysqli_fetch_all($emp_names_query, MYSQLI_ASSOC);

    echo "<h1>Department Wise Employee Names:</h1>";
    echo "<table border='1px solid black' width='200px'>";
    
    foreach($emp_name_list as $key=>$value){
        echo "<tr><td>".$value["Emp_Name"]."</td><td>".$value["Dept_Name"]."</td></tr>";
    }
    echo "</table>";

    //--------------- Salary----------------//

    $total = 0;
    $count =0;    
    foreach($emp_name_list as $key=>$value){
        $total += $value["Salary"];
        $count++;
    }
    $avg_salary = $total /$count;
    echo "<h1>Employees Having Salary Greater Than Average Salary:</h1>";
    foreach($emp_name_list as $key=>$value){
        if($value["Salary"] > $avg_salary){
            echo "<h3>".$value["Emp_Name"]."</h3>"; 
        }
    }

    //------------ Deleting Department With Less Than 2 Employees --------------//

    $delete_dept = "DELETE FROM Employee WHERE Dept_Name IN (SELECT Dept_Name FROM Employee GROUP BY Dept_Name having COUNT(Emp_Name) < 2)";
    $delete_dept_2 = "DELETE FROM Department WHERE Dept_Name NOT IN (SELECT Dept_Name FROM Employee GROUP BY Dept_Name)";

    $delete_query = mysqli_query($emp_con, $delete_dept);
    $delete_query_2 = mysqli_query($emp_con, $delete_dept_2);

    if(!$delete_query){
        echo "Wrong Query". mysqli_error($emp_con);
    }
    if(!$delete_query_2){
        echo "Wrong Query". mysqli_error($emp_con);
    }
?>