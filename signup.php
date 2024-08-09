<?php
include 'connection.php';
if (isset($_POST['submit_registert'])) {
    $fname = $_POST["fnames"];
    $lname = $_POST["lnames"];
    $email = $_POST["email"];
    $phoneno = $_POST["phoneno"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $exists = false;

    // Access images
    $picture = $_FILES['picture']['name'];


    // Accessing temp names
    $picturetemp = $_FILES['picture']['tmp_name'];

    if (($password == $cpassword) && !$exists) {
        $sql = "INSERT INTO `user_registeration` (`user_fname`, `user_lname`, `user_email`,`user_phoneno`,`user_address`, `user_password`) 
        VALUES ('$fname', '$lname', '$email','$phoneno','$address', '$password')";
       
       // $sql = "INSERT INTO `user_registeration` (`user_fname`, `user_lname`,`user_pic`, `user_email`,`user_phoneno`,`user_address`, `user_password`) 
        // VALUES ('$fname', '$lname','$picture', '$email','$phoneno','$address', '$password')";

        if (mysqli_query($con, $sql)) {
            move_uploaded_file($temp_Image1, "./product_images/$picturetemp");
            session_start();

            $_SESSION['fname'] = $fname;
            $_SESSION['email'] = $email;

            $sql = "SELECT * FROM `user_registeration` where user_email ='$user_email' ";
            $result = mysqli_query($con, $sql);
            $row_data = mysqli_fetch_assoc($result);
            $user_id = $row_data['user_id'];

            $_SESSION['user_id'] = $user_id;

            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

    <style>
        :root {
            --primary-color: #4A919E;
            --secondary-color: #1a5f6b;
            padding: 0;
            margin: 0;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-width: 350px;
            padding: 10px 50px;
            border-radius: 20px;
            position: relative;
            background-color: var(--primary-color);
            color: #fff;
            border: 1px solid #333;
        }

        .title {
            font-size: 28px;
            font-weight: 600;
            letter-spacing: -1px;
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 30px;
            color: white;
        }

        .title::before {
            width: 18px;
            height: 18px;
        }

        .title::after {
            width: 18px;
            height: 18px;
            animation: pulse 1s linear infinite;
        }

        .title::before,
        .title::after {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            border-radius: 50%;
            left: 0px;
            background-color: transparent;
        }

        .message,
        .signin {
            font-size: 14.5px;
            color: white;
        }

        .signin {
            text-align: center;
        }

        .signin a:hover {
            text-decoration: underline var(--secondary-color);
            color: var(--secondary-color);
        }

        .signin a {
            color: white;
        }

        .flex {
            display: flex;
            width: 100%;
            gap: 6px;
        }

        .form label {
            position: relative;
        }

        .form label .input {
            background-color: var(--secondary-color);
            color: #fff;
            width: 100%;
            padding: 20px 05px 05px 10px;
            outline: 0;
            border: 1px solid white;
            border-radius: 10px;
        }

        .form label .input+span {
            color: white;
            position: absolute;
            left: 10px;
            top: 0px;
            font-size: 0.9em;
            cursor: text;
            transition: 0.3s ease;
        }

        .form label .input:placeholder-shown+span {
            top: 12.5px;
            font-size: 0.9em;
        }

        .form label .input:focus+span,
        .form label .input:valid+span {
            color: #00bfff;
            top: 0px;
            font-size: 0.7em;
            font-weight: 600;
        }

        .input {
            font-size: medium;
        }


        .submit {
            border: none;
            outline: none;
            padding: 10px;
            border-radius: 10px;
            color: black;
            font-size: 16px;
            transform: .3s ease;
            background-color: white;
        }

        .submit:hover {
            transition: 0.3s;
            background-color: var(--secondary-color);
            color: white;
        }

        @keyframes pulse {
            from {
                transform: scale(0.9);
                opacity: 1;
            }

            to {
                transform: scale(1.8);
                opacity: 0;
            }
        }

        .inp_file {}
    </style>
</head>

<body>
    <div class="loginpop">

        <br><br><br>
        <center>
            <form class="form" method="post" enctype="multipart/form-data">
                <p class="title">Register </p>
                <!-- <p class="message">Signup now and get full access to our app. </p> -->
                <div class="flex">
                    <label>
                        <input class="input" type="text" placeholder="" required="" id="fnames" name="fnames">
                        <span>Firstname</span>
                    </label>

                    <label>
                        <input class="input" type="text" placeholder="" required="" id="lnames" name="lnames">
                        <span>Lastname</span>
                    </label>
                </div>

                <!-- <label>
                    <input class="input inp_file" type="file" placeholder="" required="" id="picture" name="picture">
                    <span>Picture</span>
                </label> -->

                <label>
                    <input class="input" type="email" placeholder="" required="" id="email" name="email">
                    <span>Email</span>
                </label>

                <label>
                    <input class="input" type="no" placeholder="" required="" id="phoneno" name="phoneno">
                    <span>Phone No</span>
                </label>

                <label>
                    <input class="input" type="text" placeholder="" required="" id="address" name="address">
                    <span>Address</span>
                </label>

                <label>
                    <input class="input" type="password" placeholder="" required="" id="password" name="password">
                    <span>Password</span>
                </label>
                <label>
                    <input class="input" type="password" placeholder="" required="" id="cpassword" name="cpassword">
                    <span>Confirm password</span>
                </label>
                <button class="submit" name="submit_registert">Submit</button>
                <p class="signin">Already have an acount ? <a href="login.php">Signin</a> </p>

            </form>
        </center>
    </div>
</body>

</html>