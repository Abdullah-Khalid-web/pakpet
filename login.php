<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pakpet</title>
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
            padding: 50px;
            border-radius: 20px;
            position: relative;
            background-color: var(--primary-color);
            color: #fff;
            border: 1px solid #333;
        }

        .title {
            font-size: 28px;
            font-weight: 600;
            letter-spacing: 1px;
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

        .wrong {
            animation: pulse 0.3s;
            text-align: center;
            color: red;
            font-size: 1.3rem;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body><br><br>
    <center>
        <form class="form" method="post">
            <p class="title">Log In </p>
            <p class="message ">Well come back! </p>

            <label>
                <input class="input" type="email" placeholder="" required="" id="email" name="email">
                <span>Email</span>
            </label>

            <label>
                <input class="input" type="password" placeholder="" required="" id="password" name="password">
                <span>Password</span>
            </label>
            <!-- <p >Forget Password</p> -->
            <button class="submit" name="submit_login">Log In</button>
            <p class="signin">I have an acount ? <a href="signup.php">Register</a> </p>




            <?php
            $error = '';
            if (isset($_POST['submit_login'])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
                $sql = "SELECT * from user_registeration where user_email = '$email' AND user_password = '$password' ";
                $result = mysqli_query($con, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    session_start();

                    $_SESSION['fname'] = $row['user_fname'];
                    $_SESSION['email'] = $row['user_email'];
                    $_SESSION['user_id'] = $row['user_id'];

                    header("Location: index.php");
                } else {
                    echo "<p class='wrong' > Wrong Name or Password </p>";
                }
            }


            ?>
        </form>
    </center>
</body>

</html>