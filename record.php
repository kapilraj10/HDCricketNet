<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="https://i.postimg.cc/zvRbZcbS/icon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #333;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            padding: 12px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
        }

        textarea {
            resize: vertical;
            height: 150px;
        }

        input[type="submit"] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Contact Us</h3>
        <form onsubmit="sendEmail(); return false;">
            <label for="name">Your Name</label>
            <input type="text" id="name" placeholder="Enter your name" required>

            <label for="email">Your Email</label>
            <input type="email" id="email" placeholder="Enter your email" required>

            <label for="phone">Your Phone No.</label>
            <input type="text" id="phone" placeholder="Enter your phone number" required>

            <label for="message">Your Message</label>
            <textarea id="message" placeholder="Enter your message" required></textarea>

            <input type="submit" value="Send">
        </form>
    </div>

    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        function sendEmail() {
            Email.send({
                SecureToken: "6539bf73-a81f-4342-93e1-f514a1b15b52",
                To: 'tharinduthilakshana36@gmail.com',
                From: document.getElementById("email").value,
                Subject: "New Contact Form Enquiry",
                Body: "Name: " + document.getElementById("name").value +
                    "<br> Email: " + document.getElementById("email").value +
                    "<br> Phone No.: " + document.getElementById("phone").value +
                    "<br> Message: " + document.getElementById("message").value
            }).then(
                message => alert("Message Sent Successfully")
            );
        }
    </script>
</body>
</html>
