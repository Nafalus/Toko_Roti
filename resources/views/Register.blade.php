<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            background: linear-gradient(135deg, #4d675a, #175c3a);
        }

        .container {
            position: relative;
            max-width: 400px;
            width: 100%;
            background-color: #fff;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .container .form .title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
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
            margin-top: 15px;
        }

        .container .form .input-field input,
        .container .form .input-field textarea {
            width: 100%;
            height: 40px;
            padding-left: 10px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .container .form .input-field textarea {
            height: 80px;
            resize: none;
        }

        .container .form .input-field .icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .container .form .checkbox-text {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 15px;
        }

        .container .form .checkbox-content input[type="checkbox"] {
            margin-right: 5px;
        }

        .container .form .checkbox-content label.text {
            color: #333;
            font-size: 14px;
        }

        .container .form .submit {
            width: 100%;
            padding: 8px 0;
            border: none;
            background-color: #4070f4;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        .container .form .submit:hover {
            background-color: #305fbe;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form">
            <span class="title">Register</span>

            <!-- Pesan sukses dari session -->
            @if (session('success'))
                <div style="color: green; text-align: center; margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Pesan error dari session -->
            @if (session('error'))
                <div style="color: red; text-align: center; margin-bottom: 15px;">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Validasi error -->
            @if ($errors->any())
                <div style="color: red; margin-bottom: 15px;">
                    <ul style="list-style: none; padding-left: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.store') }}" method="post">
                @csrf
                <div class="input-field">
                    <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}"
                        required>
                    <i class="uil uil-user icon"></i>
                </div>
                <div class="input-field">
                    <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
                        required>
                    <i class="uil uil-envelope icon"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                    <i class="uil uil-eye-slash icon" id="showHidePw"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Confirm Password" required>
                    <i class="uil uil-eye-slash icon" id="showHidePwConfirm"></i>
                </div>
                <div class="input-field">
                    <textarea name="alamat" placeholder="Enter your address" required>{{ old('alamat') }}</textarea>
                    <i class="uil uil-map-marked-alt icon"></i>
                </div>
                <div class="input-field">
                    <input type="tel" name="no_hp" placeholder="Enter your phone number"
                        value="{{ old('no_hp') }}" required>
                    <i class="uil uil-phone icon"></i>
                </div>
                <button type="submit" class="submit">Register</button>
                <p style="text-align: center; margin-top: 20px;">Sudah punya akun? <a href="{{ route('login') }}"
                        class="text">Login</a></p>
            </form>
        </div>
    </div>
    <script>
        const passwordField = document.getElementById('password');
        const showHidePw = document.getElementById('showHidePw');
        const passwordConfirm = document.getElementById('password_confirmation');
        const showHidePwConfirm = document.getElementById('showHidePwConfirm');

        showHidePw.addEventListener('click', () => {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            showHidePw.classList.toggle('uil-eye');
            showHidePw.classList.toggle('uil-eye-slash');
        });

        showHidePwConfirm.addEventListener('click', () => {
            const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirm.setAttribute('type', type);
            showHidePwConfirm.classList.toggle('uil-eye');
            showHidePwConfirm.classList.toggle('uil-eye-slash');
        });
    </script>
</body>

</html>
