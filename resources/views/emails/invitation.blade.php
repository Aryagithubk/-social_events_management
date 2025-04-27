<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Invitation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .email-container:hover {
            transform: scale(1.02);
        }

        .email-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .email-header h1 {
            font-size: 24px;
            color: #4a90e2;
        }

        .email-content {
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .email-content p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .cta-link {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 25px;
            background-color: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .cta-link:hover {
            background-color: #357ab7;
            transform: translateY(-2px);
        }

        .email-footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>You're Invited to an Exclusive Event!</h1>
        </div>
        
        <div class="email-content">
            <p>Hello {{ $guest->name }},</p>
            <p>We are excited to invite you to an upcoming event. Please take a moment to confirm your attendance.</p>
            <p>To respond to this invitation, click the link below:</p>
            <a href="{{ url('/guest/login') }}" class="cta-link">Accept Invitation</a>
        </div>
        
        <div class="email-footer">
            <p>Thank you for being a valued guest!</p>
            <p>If you have any questions, feel free to contact us.</p>
        </div>
    </div>
</body>
</html>
