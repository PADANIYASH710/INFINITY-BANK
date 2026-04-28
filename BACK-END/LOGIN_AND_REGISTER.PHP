<?php
$error1 = "";$error2="";$error3="";
$username_r = "";$username_l = "";

$con = mysqli_connect("localhost","root","","infinity_bank");
//      registration emp 

    if(isset($_POST['s1'])){
        $username_r = $_POST['t1'];
        $password = $_POST['t2'];
        $con_password = $_POST['t3'];

        if($password != $con_password){
            $error1 = "<p style='color: #e97063;'>Password does not match.</p>";
        }
        else{
            $q = "insert into registration (username , password ) values ('$username_r' , '$password')";
            mysqli_query($con,$q);
            mysqli_close($con);
            echo "<script>
                        alert('✅ Registration sucessful.');
                        window.location.href='LOGIN_AND_REGISTER.php';
                </script>";
            exit();
        }
    }

//     login emp 

    if(isset($_POST['s2'])){
        $username_l = $_POST['t1'];
        $password = $_POST['t2'];

        $q = "select *from registration where username = '$username_l'";
        $result = mysqli_query($con,$q);

        if($row = mysqli_fetch_assoc($result)) {
            if($row['password'] == $password){
                session_start();
                $_SESSION['username'] = $username_l;
                header("Location:HOME.php");
                exit();
            }
            else{
                $error3 = "<p style='color: #e97063;'>Password does not match.</p>";
            }
        }
        else{
             $error2 = "<p style='color: #e97063;'>Username does not exist.</p>";
        }
    }
?>