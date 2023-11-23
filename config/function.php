<?php

function passwordConfirmation($password1, $password2){
    if($password2 != $password1){
        header("location: ../signup.php?passwordsdon'tmatch");
        exit();
    }
}

function emptyInputsSignup($customer_name, $customer_email, $password1, $password2){
    if (empty($customer_name) || empty($customer_email) || empty($password1) || empty($password2)) {
        header("location: ../signup.php?empty");
        exit();
    }
}

function emptyInputsLogin($customer_email, $customer_password){
    if (empty($customer_email) || empty($customer_password)) {
        header("location: ../login.php?empty");
        exit();
    }
}
function validateEmail($customer_email){
    if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function validateUpdateEmail($newCustomerEmail){
    if (!filter_var($newCustomerEmail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emailExists($conn, $customer_email){
    $sql = "SELECT * FROM customers WHERE email = ?;";
     $stmt = mysqli_stmt_init($conn);
     mysqli_stmt_prepare($stmt, $sql);
 
     mysqli_stmt_bind_param($stmt, "s", $customer_email);
     mysqli_stmt_execute($stmt);
 
     $resultData = mysqli_stmt_get_result($stmt);
 
     if ($row = mysqli_fetch_assoc($resultData)) {
         return $row;
     }
     else {
         $result = false;
         return $result;
     }
 
     mysqli_stmt_close($stmt);
}

function employeeEmailExists($conn, $employee_email){
    $sql = "SELECT * FROM employees WHERE email = ?;";
     $stmt = mysqli_stmt_init($conn);
     mysqli_stmt_prepare($stmt, $sql);
 
     mysqli_stmt_bind_param($stmt, "s", $employee_email);
     mysqli_stmt_execute($stmt);
 
     $resultData = mysqli_stmt_get_result($stmt);
 
     if ($row = mysqli_fetch_assoc($resultData)) {
         return $row;
     }
     else {
         $result = false;
         return $result;
     }
 
     mysqli_stmt_close($stmt);
}

function emailUpdateExists($conn, $newCustomerEmail){
    $sql = "SELECT * FROM customers WHERE customer_email = ?;";
     $stmt = mysqli_stmt_init($conn);
     mysqli_stmt_prepare($stmt, $sql);
 
     mysqli_stmt_bind_param($stmt, "s", $newCustomerEmail);
     mysqli_stmt_execute($stmt);
 
     $resultData = mysqli_stmt_get_result($stmt);
 
     if ($row = mysqli_fetch_assoc($resultData)) {
         return $row;
     }
     else {
         $result = false;
         return $result;
     }
 
     mysqli_stmt_close($stmt);
}

function createCustomer($conn, $customer_name, $customer_email, $password1){
    $sql = "INSERT INTO customers (name, email, password) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss" , $customer_name, $customer_email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?signupsuccess");
}

function loginCustomer($conn, $customer_email, $customer_password){
    $emailExists = emailExists($conn, $customer_email);

    if ($emailExists === false) {
        header("location: ../login.php?emaildoesnotexist");
        exit();
    }
 
    $hashedPass = $emailExists["password"];
    $checkpass = password_verify($customer_password, $hashedPass);

    if ($checkpass === false) {
        header("location: ../login.php?password-error");
        exit();
    }

    elseif ($checkpass === true) {
        session_start();
        $_SESSION["customer_name"] = $emailExists["name"];
        $_SESSION["user_email"] = $emailExists["email"];
        if (isset($_SESSION['redirect_url'])) {
            $redirectURL = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']);
            header("location: $redirectURL");
            exit();
        }else{
        header("location: ../index.php");
        exit();
        }
    }
}


function invalidUsername($admin_username){
    if (!preg_match("/^[a-zA-Z0-9]*$/", $admin_username)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginAdmin($conn, $admin_username, $admin_password){
    $sql = 'SELECT *  FROM admintbl WHERE username = ? AND password = ?;';
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $admin_username, $admin_password);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($result)){
        session_start();
        $_SESSION["admin"] =  $row["username"];
        $_SESSION["admin_email"] = $row["email"];
        header("location: ../admin/dashboard.php");
        exit();
    }else{
        header("location: ../admin/index.php?loginerror");
        exit();
    }

}

function updateCustomer($conn, $customerId, $newCustomerName, $newCustomerEmail){
    $sql = "UPDATE customers SET customer_name = ?, customer_email = ? WHERE id = '$customerId';";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $newCustomerName, $newCustomerEmail);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header('location: ../admin/dashboard.php?notification&updated');
}



function addOrder($conn, $bookingId, $email, $cake_type, $cake_filling, $cake_shape, $message, $cake_size, $cake_design, $price){
    $status = "paid";
    $sql = "INSERT INTO bookings (booking_id, email, cake_type, cake_filling, cake_shape, cake_message, cake_size, cake_design, amount, payment_status) VALUES (?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssssssis', $bookingId, $email, $cake_type, $cake_filling, $cake_shape, $message, $cake_size, $cake_design, $price, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../order.php?id=$bookingId&success");
}

function createEmployee($conn, $employee_name, $employee_email, $password1){
    $sql = "INSERT INTO employees (name, email, password) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, 'sss', $employee_name, $employee_email, $hashedPassword);
    mysqli_stmt_execute($stmt);
    header("location: ../admin/dashboard.php?notification&employees&regsuccess");
}

function loginEmployee($conn, $employee_email, $employee_password){
    $employeeEmailExists = employeeEmailExists($conn, $employee_email);

    if ($employeeEmailExists === false) {
        header("location: ../employee/index.php?emaildoesnotexist");
        exit();
    }

    $hashedPass = $employeeEmailExists["password"];
    $checkpass = password_verify($employee_password, $hashedPass);

    if ($checkpass === false) {
        header("location: ../employee/index.php?password-error");
        exit();
    }

    elseif ($checkpass === true) {
        session_start();
        $_SESSION["employee_name"] = $employeeEmailExists["name"];
        $_SESSION["user_email"] = $employeeEmailExists["email"];
        header("location: ../index.php");
        exit();
    }
}

function addCake($conn, $cake_name, $category, $cake_price, $cake_description, $newFileName){
    //check if cake name already exists
    function checkCakeName($conn, $cake_name){
        $sql = "SELECT * FROM cakes WHERE name = ?;";
     $stmt = mysqli_stmt_init($conn);
     mysqli_stmt_prepare($stmt, $sql);
 
     mysqli_stmt_bind_param($stmt, "s", $cake_name);
     mysqli_stmt_execute($stmt);
 
     $resultData = mysqli_stmt_get_result($stmt);
 
     if ($row = mysqli_fetch_assoc($resultData)) {
         return $row;
     }
     else {
         $result = false;
         return $result;
     }
 
     mysqli_stmt_close($stmt);
    }

    if (checkCakeName($conn, $cake_name) !== false) {
        header("location: ../admin/add.php?nametaken");
        exit();
    }else{
        $sql = "INSERT INTO cakes (name, category, price, description, img_file_path) VALUES (?,?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $cake_name, $category, $cake_price, $cake_description, $newFileName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header("location: ../admin/dashboard.php?cakes&notification&cake-added");
    }

}

function updateCake($conn, $id, $cake_name, $category, $cake_price, $cake_description, $newFileName){
    
    $sql = "UPDATE cakes SET name=?, category=?, price=?, description=?, img_file_path=? WHERE id=?";
    
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sssssi", $cake_name, $category, $cake_price, $cake_description, $newFileName, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    header("location: ../admin/dashboard.php?cakes&notification&updated");
}