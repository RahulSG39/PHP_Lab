<?php
    //Database Creation

    $db_con = mysqli_connect('localhost', 'root', '', '');
    if(!$db_con){
        echo "Connection Error".mysqli_connect_error();
    }

    $database = "CREATE DATABASE emp_dept";
    if(!mysqli_query($db_con , $database)){
        echo "Could not create Database".mysqli_connect_error();
    }else
        echo "Database emp_dept created successfully<br>"; 


    //Department Table
    $dept_con = mysqli_connect('localhost','root','','emp_dept');
    if(!$dept_con){
        echo "Connection Error".mysqli_connect_error();
    }
    
    $dept_table = "CREATE TABLE Department(
                  Dept_id varchar(20) NOT NULL PRIMARY KEY,
                  Dept_Name varchar(40) NOT NULL UNIQUE
                )";
                
    if(!mysqli_query($dept_con, $dept_table)){
        echo "Could not create Table".mysqli_error($dept_con);
    }else
        echo "Table Department created successfully<br>";


    //Employee Table
    $emp_con = mysqli_connect('localhost','root','','emp_dept');
    if(!$emp_con){
        echo "Connection Error".mysqli_connect_error();
    }
    
    $emp_table = "CREATE TABLE Employee(
                  Emp_id varchar(20) PRIMARY KEY NOT NULL,
                  Emp_Name varchar(30) NOT NULL,
                  Dept_Name varchar(40) NOT NULL,
                  Salary INT NOT NULL,
                  FOREIGN KEY(Dept_Name) REFERENCES Department(Dept_Name) 
                )";
                
    if(!mysqli_query($emp_con, $emp_table)){
        echo "Could not create Table".mysqli_error($emp_con);
    }else
        echo "Table Employee created successfully<br>";
?>