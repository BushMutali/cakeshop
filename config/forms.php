<?php

require 'db.php';
require 'function.php';

if(isset($_POST['customer-signup'])){
    $customer_name = $_POST['username'];
    $customer_email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (!preg_match('/^[a-zA-ZA\s]+$/', $customer_name)) {
        header("location: ../signup.php?invalidname");
        exit();
    }

    passwordConfirmation($password1, $password2);
    emptyInputsSignup($customer_name, $customer_email, $password1, $password2);

    if (validateEmail($customer_email) !== false) {
        header("location: ../signup.php?invalidemail");
        exit();
    }

    if (emailExists($conn, $customer_email) !== false) {
        header("location: ../signup.php?email-taken");
        exit();
    }

    createCustomer($conn, $customer_name, $customer_email, $password1);
}

if (isset($_POST['customer-login'])) {
    $customer_email = $_POST['email'];
    $customer_password = $_POST['password'];

    emptyInputsLogin($customer_email, $customer_password);

    loginCustomer($conn, $customer_email, $customer_password);
}

if (isset($_POST['admin-login'])) {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    if(empty($admin_username) || empty($admin_password)){
        header('location: ../login.php?empty');
    }

    if (invalidUsername($admin_username) !== false) {
        header("location: ../admin/index.php?invalidusername");
        exit();
    }

    loginAdmin($conn, $admin_username, $admin_password);
}

if (isset($_POST['delete-customer'])){
    if (isset($_POST['customer'])) {
        $selectedCustomers = $_POST['customer'];
        foreach ($selectedCustomers as $customerId) {
            $deleteQuery = "DELETE FROM customers WHERE id IN (" . implode(",", $selectedCustomers) . ")";
            if ($conn->query($deleteQuery) === TRUE) {
                header('location: ../admin/dashboard.php?notification&customers&success');
                exit();
            } else {
                echo "Error deleting customers: " . $conn->error;
            }
        }
    }
    else{ 
        header('location: ../admin/dashboard.php?customers&noneselected');
        exit();
    }
}

if (isset($_POST['delete-employee'])){
    if (isset($_POST['employee'])) {
        $selectedEmployees = $_POST['employee'];
        foreach ($selectedEmployees as $employeeId) {
            $deleteQuery = "DELETE FROM employees WHERE id IN (" . implode(",", $selectedEmployees) . ")";
            if ($conn->query($deleteQuery) === TRUE) {
                header('location: ../admin/dashboard.php?notification&employees&success');
                exit();
            } else {
                echo "Error deleting employee: " . $conn->error;
            }
        }
    }
    else{
        header('location: ../admin/dashboard.php?employees&noneselected');
        exit();
    }
}
if (isset($_POST['delete-invoice'])){
    if (isset($_POST['invoice'])) {
        $selectedInvoices = $_POST['invoice'];
        foreach ($selectedInvoices as $employeeId) {
            $deleteQuery = "DELETE FROM invoices WHERE invoice_number IN (" . implode(",", $selectedInvoices) . ")";
            if ($conn->query($deleteQuery) === TRUE) {
                header('location: ../admin/dashboard.php?notification&invoice&success');
                exit();
            } else {
                echo "Error deleting employee: " . $conn->error;
            }
        }
    }
    else{
        header('location: ../admin/dashboard.php?invoice&noneselected');
        exit();
    }
}

if(isset($_POST['customer-update'])){
    $customerId = $_POST['userid'];
    $newCustomerName = $_POST['username'];
    $newCustomerEmail = $_POST['email'];

    if(empty($customerId) || empty($newCustomerName) || empty($newCustomerEmail)){
        header('location: ../admin/edit.php?empty');
    }

    if (validateEmail($customer_email) !== false) {
        header("location: ../admin/edit.php?invalidemail");
        exit();
    } 

    if (emailUpdateExists($conn, $newCustomerEmail) !== false) {
        header("location: ../admin/edit.php?email-taken");
        exit();
    }

    updateCustomer($conn, $customerId, $newCustomerName, $newCustomerEmail);
}


if (isset($_POST['place-order'])) {
    $randomBytes = random_bytes(3);
    $randomString = bin2hex($randomBytes);
    $bookingId = 'ORD-' . $randomString;
    $email = $_POST['user_email'];
    $cake_type = $_POST['cake-type'];
    $cake_filling = $_POST['cake-filling'];
    $cake_shape = $_POST['cake-shape'];
    $message = $_POST['message'];
    $cake_size = $_POST['cake-size'];
    $cake_design = $_POST['design'];
    if (empty($cake_type) || empty($cake_filling) || empty($cake_shape) || empty($cake_size) || empty($cake_design)){
        header("location: ../order.php?empty");
        exit();
    }
    if($_POST['cake-size'] == "15cm"){
        $price = 1500;
    }else if($_POST['cake-size'] == "20cm"){
        $price = 2500;
    }elseif ($_POST['cake-size'] == "25cm") {
        $price = 3500;
    }
    addOrder($conn, $bookingId, $email, $cake_type, $cake_filling, $cake_shape, $message, $cake_size, $cake_design, $price);
}


if(isset($_POST['employee-signup'])){
    $employee_name = $_POST['username'];
    $employee_email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (!preg_match('/^[a-zA-ZA\s]*$/', $employee_name)) {
        header("location: ../employee/signup.php?invalidname");
        exit();
    }

    if($password2 != $password1){
        header("location: ../employee/signup.php?passwordsdon'tmatch");
        exit();
    }

    if (empty($employee_name) || empty($employee_email) || empty($password1) || empty($password2)) {
        header("location: ../employee/signup.php?empty");
        exit();
    }

    if (!filter_var($employee_email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../employee/signup.php?invalidemail");
        exit();
    }

    if (employeeEmailExists($conn, $employee_email) !== false) {
        header("location: ../employee/signup.php?email-taken");
        exit();
    }

    createEmployee($conn, $employee_name, $employee_email, $password1);
}

if (isset($_POST["employee-login"])) {
    $employee_email = $_POST["email"];
    $employee_password = $_POST["password"];

    if (empty($employee_email) || empty($employee_password)) {
        header("location: ../employee/index.php?empty");
        exit();
    }

    loginEmployee($conn, $employee_email, $employee_password);
}

if (isset($_POST['add-cake'])) {
    $cake_name = $_POST['cake_name'];
    $cake_price = $_POST['cake_price'];
    $cake_description = $_POST['cake_description'];
    $category = $_POST['category'];

    if (!preg_match('/^[a-zA-ZA\s]*$/', $cake_name)) {
        header('location: ../admin/add.php?invalidname');
        exit();
    }

    if (preg_match('/^[a-zA-ZA\s]*$/', $cake_price)) {
        header("location: ../admin/add.php?invalidpriceformat");
        exit();
    }

    if(empty($cake_name) || empty($cake_price) || empty($cake_description)){
        header('location: ../admin/add.php?empty');
        exit();
    }

        if($_FILES["image"]["error"] === UPLOAD_ERR_OK){
            $tempFilePath = $_FILES["image"]["tmp_name"];
            $originalFileName = $_FILES["image"]["name"];
            $fileInfo = pathinfo(($originalFileName));
        

        // ensure a unique name to avoid overwriting existing files
        $newFileName = uniqid() . '_'. random_int(1, 1000). '.' . $fileInfo["extension"];
        $newFilePath = "../assets/img/cakes/" . $newFileName;

        addCake($conn, $cake_name, $category, $cake_price, $cake_description, $newFileName);
        move_uploaded_file($tempFilePath, $newFilePath);
        }
}

if(isset($_POST['pay-now'])){
    $id = $_POST['id'];
    $randomBytes = random_bytes(3);
    $randomString = bin2hex($randomBytes);
    $receiptNo = 'REC-' . $randomString;
    $name = $_POST['name'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $total = $_POST['total'];

    $sql = "INSERT INTO sales (receipt_no, cake_id, cake_name, customer_name, email, total) VALUES ('$receiptNo', '$id', '$name', '$customer_name', '$customer_email', '$total');";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("location: ../pay.php?id=$receiptNo");
}

if (isset($_POST['apply'])) {
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $email = $_POST['email'];
    $town = $_POST['town'];
    $applicationNo = 'APP-' . random_int(1, 1000);
    
    $sql = "INSERT INTO applications (first_name, second_name, email, town, app_no) VALUES ('$first_name', '$second_name', '$email', '$town', '$applicationNo');";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("location: ../training.php?id=$applicationNo");
}

if (isset($_POST['confirm'])) {
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    header("location: ../index.php?confirm&phone=$phone&amount=$amount");
    exit();
}

if (isset($_POST['update-cake'])) {
    $cake_name = $_POST['cake_name'];
    $cake_price = $_POST['cake_price'];
    $cake_description = $_POST['cake_description'];
    $category = $_POST['category'];
    $id = $_POST['id'];

    if (!preg_match('/^[a-zA-ZA\s]*$/', $cake_name)) {
        header('location: ../admin/update.php?invalidname');
        exit();
    }

    if (preg_match('/^[a-zA-ZA\s]*$/', $cake_price)) {
        header("location: ../admin/update.php?invalidpriceformat");
        exit();
    }

    if(empty($cake_name) || empty($cake_price) || empty($cake_description)){
        header('location: ../admin/update.php?empty');
        exit();
    }

        if($_FILES["image"]["error"] === UPLOAD_ERR_OK){
            $tempFilePath = $_FILES["image"]["tmp_name"];
            $originalFileName = $_FILES["image"]["name"];
            $fileInfo = pathinfo(($originalFileName));
        

        // ensure a unique name to avoid overwriting existing files
        $newFileName = uniqid() . '_'. random_int(1, 1000). '.' . $fileInfo["extension"];
        $newFilePath = "../assets/img/cakes/" . $newFileName;

        updateCake($conn, $id, $cake_name, $category, $cake_price, $cake_description, $newFileName);
        move_uploaded_file($tempFilePath, $newFilePath);
        }
}

if (isset($_POST['delete-cake'])){
    if (isset($_POST['cake'])) {
        $selectedCake = $_POST['cake'];
        foreach ($selectedCake as $cakeId) {
            $deleteQuery = "DELETE FROM cakes WHERE id IN (" . implode(",", $selectedCake) . ")";
            if ($conn->query($deleteQuery) === TRUE) {
                header('location: ../admin/dashboard.php?cakes&notification&success');
                exit();
            } else {
                echo "Error deleting employee: " . $conn->error;
            }
        }
    }
    else{
        header('location: ../admin/dashboard.php?cakes&noneselected');
        exit();
    }
}