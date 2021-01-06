<?php 
//------------------ Insertion || Department ----------------------//

    if(isset($_POST['submit_dept'])){

        if(!empty($_POST['dept_id'] && $_POST['dept_name_2'])){
            $dept_id = $_POST['dept_id'];
            $dept_name = $_POST['dept_name_2'];
            
            $dept_con = mysqli_connect('localhost','root','','emp_dept_q4');
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

        if(!empty($_POST['emp_id'] && $_POST['emp_name'] && $_POST['dept_name'] && $_POST['age'])){
            $emp_id = $_POST['emp_id'];
            $emp_name = $_POST['emp_name'];
            $dept_name = $_POST['dept_name'];
            $age = $_POST['age'];
            
            $emp_con = mysqli_connect('localhost','root','','emp_dept_q4');
            if(!$emp_con){
                echo "Connection Error". mysqli_connect_error();
            }

            $emp_insert_query = "INSERT INTO Employee(Emp_id,Emp_Name,Dept_Name,Age) VALUES('$emp_id','$emp_name', '$dept_name', '$age')";

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
    <title>Q4</title>
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
                <td>Age:</td>
                <td><input type="text" name="age"></td>
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
    $emp_con = mysqli_connect('localhost','root','','emp_dept_q4');
    if(!$emp_con){
        echo "Connection Error". mysqli_connect_error();
    }
    //------------------ Employees In More Than One Department ----------------------//

    $emp_duplicate = "SELECT Emp_Name FROM Employee GROUP BY Emp_Name HAVING COUNT(Emp_Name) > 1";

    $duplicate_query = mysqli_query($emp_con, $emp_duplicate);

    if(!$duplicate_query){
        echo "Wrong Query". mysqli_error($emp_con);
    }

    $duplicate_emp_names = mysqli_fetch_all($duplicate_query, MYSQLI_ASSOC);

    echo "<h1>Employees In More Than One Department</h1>";

    echo "<table border='1px solid black' width='100px' style='text-align:center;'>";
    foreach($duplicate_emp_names as $key=>$value){
        echo "<tr><td>".$value["Emp_Name"]."</td></tr>";
    }
    echo "</table>";

    //----------- Employee Names Starting With s or S -------------//

    $emp_names_from_s = "SELECT Emp_Name FROM Employee WHERE Emp_Name like 's%' or Emp_Name like 'S%'";

    $names_list_from_s = mysqli_query($emp_con, $emp_names_from_s);

    if(!$names_list_from_s){
        echo "Wrong Query". mysqli_error($emp_con);
    }

    $list = mysqli_fetch_all($names_list_from_s, MYSQLI_ASSOC);

    echo "<h1>Employee Names Starting With 's' or 'S':</h1>";

    foreach($list as $key=>$value){
        echo $value["Emp_Name"]." ";
    }

    //---------Deleting if working for more than one dept ---------------//

    $emp_delete = "DELETE FROM Employee 
                   WHERE Emp_Name IN (
                                  SELECT Emp_Name 
                                  FROM Employee 
                                  GROUP BY Emp_Name 
                                  HAVING COUNT(Emp_Name) > 1)";

    $delete_query_names = mysqli_query($emp_con, $emp_delete);

    if(!$delete_query_names){
        echo "Wrong Query". mysqli_error($emp_con);
    }
?>