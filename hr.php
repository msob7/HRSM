
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload Images</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
  
        <style>
                </style>

</head>
<body dir='ltr'>
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
         $join_salary= date('y-m-d',strtotime($_POST['join_date']));
     }
 
    if (isset($_POST['join_salary'])) {
         $join_salary= $_POST['join_salary'];
     }
 
     if (isset($_POST['account_name'])) {
         $account_name= $_POST['account_name'];
     }
 
     if (isset($_POST['mobile'])) {
         $Mobile = $_POST['mobile'];
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


        

    if (isset($_POST['del'])) {
        $stmt = $con->prepare("DELETE FROM employee WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->close();
        header("Location: hr.php");
    }
   if (isset($_POST['Update'])) {
        $stmt = $con->prepare("UPDATE Employee SET id='$id',name='$name',address='$address' WHERE id = '$id'"); 
        $stmt->execute();
        $stmt->close();
        header("Location: hr.php");
   }
        /*               }
    if (isset($_POST['Update'])) {
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $query = "UPDATE Employee SET id='$id',name='$name',address='$address' WHERE id = '$id'";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $stmt->close();
        header("Location: hr.php");
                    }
    
    */
   

     
    
      ?> 
<div id='mother'>
<form method='post'>
<aside>
<div id='div'>
<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTu1_gO0ER0q19wAHyGK3CdeJAJaLtBjwMEDg&s'alt ='HR System Management' width="100px">
<h3> Register Employee </h3>

<label for="id"> Employee ID</label><br>
<input type="text" name="id" id="id"><br>
<label for="name">Employee Name</label><br>
<input type="text" name="name" id="name"><br>
<label for="address">Address</label><br>
<input type="text" name="address" id="address"><br>
<label for="join_date">join_date</label><br>
<input type="date" name="join_date" id="join_date"><br>
<label for="join_salary">join_salary</label><br>
<input type="text" name="join_salary" id="join_salary"><br>
<label for="account_name">account_name</label><br>
<input type="text" name="account_name" id="account_name"><br>
<label for="number">number</label><br>
<input type="text" name="number" id="number"><br>
<label for="gender" name="gender" id="gender"> gender</label><br>
 <div class="from-group mb-3">
     
        <select name="gender" class="form-control">
        <option value="">--Select Gender--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        </select>
    </div>
<label for="status">status</label><br>
<input type="text" name="status" id="status"><br>
<label for="nationality">nationality</label><br>
<input type="text" name="nationality" id="nationality"><br>
<label for="ID_Nationality">ID_Nationality</label><br>
<input type="text" name="ID_Nationality" id="ID_Nationality"><br>
<label for="address">Passport_Number</label><br>
<input type="text" name="Passport_Number" id="Passport_Number"><br>
<label for="address">email</label><br>
<input type="text" name="email" id="email"><br>
<label for="notes">notes</label><br>
<input type="text" name="notes" id="notes"><br>
    

<button name="del">Delete</button>
<button name="Update">Update</button>
    </div>
    </aside>
</form>

    

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
</table>
</main>
</div>
</body>
</html>


