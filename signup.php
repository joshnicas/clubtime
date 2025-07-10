<?php
require 'includes/error.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         :root {
            --white: #FFFFFF;
            --pale-white: #f6f6f6;
            --sidebar-primary-hover: #EBEFFD;
            --sidebar-bg: #fff;
            --bg: #dbdbdb;
            --black-gb: #0b0f17;
            --text: #808183;
            --text-headline: #1f1f1f;
            --text-link: #f9fafc;
            --expand-button: #f6f6f6;
            --search-bg: #f6f6f6;
            --separator: #1e1f21;
            --link-text: #454545;
            --link-hover: #f6f6f6;
            --toolkit-bg: #151515;
            --toolkit-text: #f6f6f6;
            --alarm: #ee461e;
            --green: #aeeadb;
            --green-dark: #a3d6c7;
            --violet: #cad2f6;
            --violet-dark: #c2c7e1;
            --purple: #e4c5f4;
            --purple-dark: #d5bddd;
            --text-dark: #151515;
            --text-gray: #929292;
        }
        
        body {
            background: var(--black-gb);
            font-family: 'Inter', sans-serif;
            background-repeat: no-repeat;
            background-size: contain;
            background-image: linear-gradient(var(--black-gb)0.1%, #06558680, var(--black-gb) 90%), url('asset/image.webp');
            font-size: 16px;
            padding: 1rem;
            color: white;
            min-height: 100%;
            margin: 0;
        }
        
        .logo {
            display: flex;
            justify-content: center;
            font-size: 3rem;
        }
        
        .main {
            display: flex;
            gap: 1rem;
        }
        
        .main .background {
            display: flex;
            position: relative;
            z-index: 1;
            padding: 5rem;
            color: #9ba9bc;
            font-weight: 600;
            font-size: 20px;
        }
        
        .main .background::before {
            content: "";
            position: absolute;
            height: 100%;
            background: var(--black-gb);
            z-index: 0;
        }
        
        .form-inputs {
            display: flex;
            justify-content: center;
            width: 100%;
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            justify-content: center;
            justify-items: center;
        }
        
        form input {
            border-radius: 0.5rem;
            height: 1.75rem;
            width: 20rem;
            border: 1px solid blue;
            background: var(--black-gb);
            color: blue;
            padding: 0.5rem;
        }
        
        form input::placeholder {
            font-family: 'Inter', sans-serif;
            padding: 8.75px;
            color: blue;
        }
        
        form .button {
            display: flex;
            justify-content: center;
        }
        
        form button {
            height: 2rem;
            width: 7rem;
            background: var(--black-gb);
            color: blue;
            border: 1px solid blue;
        }
        
        form button:hover {
            background: blue;
            color: black;
        }
        
        .other-details {
            padding: 5rem;
        }
        
        footer {
            padding: 9rem;
        }
        
        .icons {
            display: flex;
            gap: 2rem;
        }
        
        .icons .svg {
            height: 1.75rem;
            width: 1.75rem;
            cursor: pointer;
        }
        .error-div{
        
            text-align: center;
            font-size: 19px;
        }
        .error{
            color: red;
        }
    </style>
</head>

<body>
    <div class="logo">
        DevLoop
    </div>
    <div class="main">
        <div class="form-inputs">
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="username" placeholder="username">
                <input type="password" name="pwd" placeholder="password">
                <input type="password" name="confirm_pwd" placeholder="confirm your password">
                
              

                <div class="button">
                    <button type="submit" name="submit">signup</button>
                </div>
                 <div class="error-div">
                     <?php
                if (!isset($_GET['signup'])) {
                    
                }
                else{
                    $signupcheck = $_GET['signup'];

                    if ($signupcheck == "empty") {
                        echo "<p class='error'>Fill all the fields!!..</p>";
                        
                    }
                    elseif ($signupcheck == "email") {
                        echo "<p class='error'>E-mail not valid!!..</p>";
                        
                    }
                    elseif ($signupcheck == "user") {
                        echo "<p class='error'>E-mail already exist!!..</p>";
                        
                    }
                }
                ?>
                 </div>
            </form>
        </div>
        <div class="background">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad sint corrupti voluptate sequi accusamus quas. Perspiciatis asperiores mollitia eum sint autem dignissimos assumenda! Placeat unde corrupti eius, dolore voluptates nam!
        </div>
    </div>
    <div class="other-details">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam vitae explicabo omnis eius placeat minus, porro ex corrupti iusto doloremque, nisi modi officia! Laboriosam sapiente illum praesentium necessitatibus tempora rem!
    </div>
    <footer>
        <div class="icons">
            <div class="whatsapp">
                <img src="asset/whatsapp.png" alt="" class="svg">
            </div>
            <div class="whatsapp">
                <img src="asset/twitter.png" alt="" class="svg">
            </div>
        </div>
    </footer>

</body>

</html>