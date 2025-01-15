<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background: linear-gradient(50deg, #ffffff, #0000ff);
        }

        .container {
            position: relative;
            max-width: 400px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .container .form .title {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            position: relative;
            text-align: center;
        }

        .container .form .title::before {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background-color: #4070f4;
        }

        .container .form .input-field {
            position: relative;
            height: 50px;
            width: 100%;
            margin-top: 30px;
        }

        .container .form .input-field input {
            width: 100%;
            height: 100%;
            padding: 0 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .container .form .input-field .icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .checkbox-text {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 14px;
        }

        .checkbox-content {
            display: flex;
            align-items: center;
        }

        .checkbox-content input[type="checkbox"] {
            margin-right: 5px;
        }

        .checkbox-content label.text {
            color: #333;
        }

        a.text {
            color: #4070f4;
            text-decoration: none;
        }

        .submit {
            width: 100%;
            padding: 10px 0;
            border: none;
            background-color: #4070f4;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .submit:hover {
            background-color: #305fbe;
        }
    </style>

    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="form">
            <span class="title">Login</span>
            @if (session('success'))
                <div class="mx-auto mt-4 max-w-md rounded-lg bg-green-100 px-4 py-3 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mx-auto mt-4 max-w-md rounded-lg bg-red-100 px-4 py-3 text-red-700">
                    {{ session('error') }}
                </div>
            @endif
            
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="input-field">
                    <input type="text" name="email" placeholder="Email" required>
                    <i class="uil uil-envelope icon"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="password" class="password" id="password" placeholder="Password"
                        required>
                    <i class="uil uil-eye-slash icon" id="showHidePw"></i>
                </div>

                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="logCheck">
                        <label for="logCheck" class="text">Remember me</label>
                    </div>
                    <a href="#" class="text">Forgot password?</a>
                </div>

                <button type="submit" class="submit">Login</button>
            </form>
        </div>
        <p style="text-align: center; margin-top: 20px;">Belum punya akun? <a href="{{ route('register') }}"
                class="text">Daftar</a></p>
    </div>

    <script>
        const passwordField = document.getElementById('password');
        const showHidePw = document.getElementById('showHidePw');

        showHidePw.addEventListener('click', () => {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            showHidePw.classList.toggle('uil-eye');
            showHidePw.classList.toggle('uil-eye-slash');
        });
    </script>
</body>

</html>
