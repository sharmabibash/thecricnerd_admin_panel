<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Access-Control-Allow-Origin");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

$conn = mysqli_connect("localhost", "thecricn_erd", "8.Z8~0pW*U4B", "thecricn_erd");

if (!$conn) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . mysqli_connect_error()]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!$data) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data received.']);
        exit;
    }

    $email = $data['email'];

    if (empty($email)) {
        echo json_encode(['status' => 'error', 'message' => 'Please provide an email address.']);
        exit;
    }
    $email_check = mysqli_query($conn, "SELECT * FROM user_registration WHERE Email = '$email'");

    if (mysqli_num_rows($email_check) == 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email is not registered.']);
        exit;
    }

    $user = mysqli_fetch_assoc($email_check);

    if ($user['Verified'] == 1) {
        echo json_encode(['status' => 'error', 'message' => 'Your account is already verified.']);
        exit;
    }
    $verification_token = $user['Verification Token'];
    $verification_link = "https://admin.thecricnerd.com/app_api/Post/verify.php?token=$verification_token";
    $subject = "Email Verification from The Cricket Nerd";
   $message = "
<html>
<head>
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }
        h2 {
            color: #2e3192;
            font-size: 26px;
            margin-bottom: 15px;
            font-weight: bold;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 16px 30px;
            background-color: #2e3192;
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .button:hover {
            background-color: #1a237e;
            transform: translateY(-2px);
        }
        footer {
            font-size: 14px;
            color: #777;
            text-align: center;
            margin-top: 30px;
        }
        footer i {
            color: #2e3192;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h2>Welcome to The Cricket Nerd!</h2>
        <p>Thank you for registering with us! We're excited to have you on board. To complete your registration, please click the button below to verify your email address:</p>
        <p><a href='$verification_link' class='button'>Verify Your Email</a></p>
        <p>If you did not sign up for this account, feel free to ignore this message.</p>
        <footer>
            <p>Best regards,</p>
            <p>The Cricket Nerd Team</p>
            <p><i>www.thecricnerd.com</i></p>
        </footer>
    </div>
</body>
</html>
";


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@thecricnerd.com" . "\r\n";

    if (mail($email, $subject, $message, $headers)) {
        echo json_encode(['status' => 'success', 'message' => 'A new verification link has been sent to your email address.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send verification email.']);
    }
}

mysqli_close($conn);
?>
