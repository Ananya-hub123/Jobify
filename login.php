<?php
    session_start();
    include("db.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        $username = $_POST['username'];       
        $password = $_POST['password'];
    
        if (!empty($username) && !empty($password) && !is_numeric($username))
        {
            $query="select * from signup where username = '$username' limit 1";
            $result= mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password)
                    {
                        header("location: index.php");
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'>alert('Wrong username or password')</script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('Wrong username or password')</script>";
        }
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Your Website</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Modern CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling with Gradient Background */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, 
                rgba(16, 24, 39, 0.95) 0%, 
                rgba(31, 41, 55, 0.95) 100%),
                url('bgimage.jpg') center/cover no-repeat fixed;
            color: #fff;
            overflow: hidden;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        body.fade-out {
            opacity: 0;
        }

        /* Glassmorphism Form Container */
        .form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 40px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 2rem;
            font-weight: 600;
            color: #fff;
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Input Fields */
        .form-container label {
            display: block;
            margin: 15px 0 8px;
            font-size: 0.9rem;
            color: #fff;
            opacity: 0.9;
        }

        .form-container input {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-container input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-container input:focus {
            outline: none;
            border-color: #4CAF50;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.4);
        }

        /* Buttons */
        .cta-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #4CAF50, #2196F3);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .cta-btn:active {
            transform: translateY(0);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Forgot Password Link */
        .forgot-password {
            display: block;
            text-align: center;
            margin: 15px 0;
            color: #4CAF50;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #45a049;
        }

        /* Back to Home Button */
        #back-to-home {
            margin-top: 10px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        #back-to-home:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .form-container {
                padding: 30px;
                margin: 20px;
            }

            .form-container h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST">
            <label for="login-username">Username:</label>
            <input type="text" id="login-username" name="username" required>
            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" required>
            <a href="forgot_password.html" class="forgot-password">Forgot Password?</a>
            <button type="submit" class="cta-btn">Login</button>
        </form>
        <br>
        <button class="cta-btn" id="back-to-home">Back to Home</button>
    </div>

    <script>
        // Interactive Button Animation
        document.querySelectorAll('.cta-btn').forEach(button => {
            button.addEventListener('click', () => {
                button.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    button.style.transform = 'scale(1)';
                }, 200);
            });
        });

        // Add fade transition when navigating back to home
        document.getElementById('back-to-home').onclick = function(e) {
            e.preventDefault(); // Prevent default link behavior
            document.body.classList.add('fade-out'); // Add fade-out class
            setTimeout(() => {
                window.location.href = 'index.php'; // Navigate after fade-out
            }, 500); // Match this duration with the CSS transition
        };
    </script>
</body>
</html>