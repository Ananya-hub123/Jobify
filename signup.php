<?php
    session_start();
    include("db.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            
            $query = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$password')";

            if (mysqli_query($con, $query)) {
                echo "<script type='text/javascript'>alert('Successfully Registered')</script>";
            } else {
                echo "<script type='text/javascript'>alert('Error: " . mysqli_error($con) . "')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Enter valid information')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Your Website</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(16, 24, 39, 0.95) 0%, rgba(31, 41, 55, 0.95) 100%),
                url('bgimage.jpg') center/cover no-repeat fixed;
            color: #fff;
            overflow: hidden;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        body.fade-out {
            opacity: 0;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 40px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            animation: slideIn 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 600;
            background: linear-gradient(45deg, #4CAF50, #2196F3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

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
        }

        .cta-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #4CAF50, #2196F3);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        #back-to-home {
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        #back-to-home:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Signup</h2>
        <form method="POST">
            <label for="signup-username">Username:</label>
            <input type="text" id="signup-username" name="username" required>
            <label for="signup-email">Email ID:</label>
            <input type="email" id="signup-email" name="email" required>
            <label for="signup-password">Password:</label>
            <input type="password" id="signup-password" name="password" required>
            <button type="submit" class="cta-btn">Signup</button>
        </form>
        <button class="cta-btn" id="back-to-home">Back to Home</button>
    </div>

    <script>
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