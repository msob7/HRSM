<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload Images</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <style>
                </style>

</head>
<body dir='ltr'>
<table>  
    
    <tr>
        <td><a href="homepage.php"><img src="ist.jpg" width="250" height="150"></a></td>
    </tr>
        </table>
    
    <?php
   // Database connection
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'employees';
    $con = mysqli_connect($host, $user, $pass, $db);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $res = mysqli_query($con, "SELECT * FROM employee");

    // Button variable
    $id= '';
     $name= '';
     $address= '';
     $join_date= '';
     $join_salary= '';
     $account_name= '';
     $mobile= '';
     $gender= '';
     $status = '';
     $nationality= '';
     $ID_Nationality= '';
     $Passport_Number= '';
     $notes= '';
     $email = '';
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }
    if (isset($_POST['join_date'])) {
         $join_date= date('y-m-d',strtotime($_POST['join_date']));
     }
 
    if (isset($_POST['join_salary'])) {
         $join_salary= $_POST['join_salary'];
     }
 
     if (isset($_POST['account_name'])) {
         $account_name= $_POST['account_name'];
     }
 
     if (isset($_POST['mobile'])) {
         $mobile = $_POST['mobile'];
     }
     if (isset($_POST['gender'])) {
         $gender = $_POST['gender'];
     }
 
     if (isset($_POST['status'])) {
         $status = $_POST['status'];
     }
 
     if (isset($_POST['ID_Nationality'])) {
         $ID_Nationality = $_POST['ID_Nationality'];
     }
    
 
     if (isset($_POST['nationality'])) {
         $nationality = $_POST['nationality'];
     }
    
     if (isset($_POST['Passport_Number'])) {
         $Passport_Number = $_POST['Passport_Number'];
     }
     if (isset($_POST['email'])) {
         $email = $_POST['email'];
     }
     if (isset($_POST['notes'])) {
         $notes = $_POST['notes'];
     }
?>




<!--عرض البيانات -->
<main>

<table id='tbl'>

                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>join_date</th>
                                    <th>join_salary</th>
                                    <th>Account_name</th>
                                    <th>Mobile</th>
                                    <th>gender</th>
                                    <th>status</th>
                                    <th>Nationality</th>
                                    <th>ID_Nationality</th>
                                    <th>Passport_Number</th>
                                    <th>Notes</th>
                                    <th>Email</th>
<div  style="overflow: auto;">
<?php

while  ( $row = mysqli_fetch_array($res)) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "<td>".$row['join_date']."</td>";
    echo "<td>".$row['join_salary']."</td>";
    echo "<td>".$row['account_name']."</td>";
    echo "<td>".$row['mobile']."</td>";
    echo "<td>".$row['gender']."</td>";
    echo "<td>".$row['status']."</td>";
    echo "<td>".$row['nationality']."</td>";
    echo "<td>".$row['ID_Nationality']."</td>";
    echo "<td>".$row['Passport_Number']."</td>";
    echo "<td>".$row['notes']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "</tr>";
}




?>
    </div>
</table>
</main>

</body>
</html>


