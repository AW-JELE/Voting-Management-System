<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS from HTML</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-c6TqnLO0MT3XeLs0quN9DzLyRP4YwGHf7U1ly/ViRMvfA/rv/iU5DTIfCeOOHppB3mK+GUdnAA3O8hmwBegUrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 80%;
            max-width: 400px;
            margin: auto;
        }

        fieldset {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        legend {
            font-size: 1.5em;
            color: #007bff;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        div {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1em;
        }

        span {
            font-size: 0.8em;
            color: #777;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1em;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button:hover {
            background-color: #0056b3;
        }

        button i {
            margin-right: 5px;
        }

        @media (max-width: 600px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <fieldset>
            <legend><i class="fas fa-comment"></i> Send SMS</legend>

            <form action="sendSMS.php" method="POST">
                <div>
                    <input type="text" name="phoneNumber" required placeholder="Enter Phone Number">
                    <span>Example: +27123456789</span>
                </div>

                <button class="btnSend"><i class="fas fa-paper-plane"></i> Send</button>
            </form>
        </fieldset>
    </div>
</body>

</html>
