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


        if (isset($_POST['add'])) {
            $name = mysqli_real_escape_string($con, $_POST['name']);
            if (empty($name)) {
		header("Location: Addpage.php?error=User Name is required");
	exit();
            }
            else{
        $stmt = $con->prepare("INSERT INTO employee 
            (id,name,address,join_date,join_salary,account_name,mobile,gender,status,nationality,ID_Nationality,Passport_Number,notes,email) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssssssssss", 
                $id, $name, $address, $join_date,$join_salary,$account_name,$mobile,
                $gender,$status,$nationality,$ID_Nationality,$Passport_Number,$notes,$email);
        $stmt->execute();
        $stmt->close();
        header("Location: hr.php");
            }
        }

                          ?> 

<form method='post' action="Addpage.php">
<aside>

<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTu1_gO0ER0q19wAHyGK3CdeJAJaLtBjwMEDg&s'alt ='HR System Management' width="100px">
<h3> Register Employee </h3>
<?php if (isset($_GET['error'])) { ?>
<p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>
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
<label for="mobile">mobile</label><br>
<input type="text" name="mobile" id="mobile"><br>
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
<label for="Passport_Number">Passport_Number</label><br>
<input type="text" name="Passport_Number" id="Passport_Number"><br>
<label for="notes">email</label><br>
<input type="text" name="email" id="email"><br>
<label for="notes">notes</label><br>
<input type="text" name="notes" id="notes"><br>

<button name="add" >Add</button>
</aside>

</form>

</body>
</html>


