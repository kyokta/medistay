<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="login">
        <div class="medistay-wrapper">
            <a class="medistay">MediStay</a>
        </div>
        <section class="frame-parent">
            <div class="frame-wrapper">
                <div class="welcome-to-medistay-parent">
                    <b class="welcome-to-medistay-container">
                        <span>Welcome to Medi</span>
                        <span class="stay">Stay</span>
                    </b>
                    <b class="sign-in-to">Sign In to your account</b>
                </div>
            </div>
            <div class="frame-group">
                <div class="frame-container">
                    <form id="login-form" class="frame-form">
                        <div class="username-parent">
                            <input class="username" name="username" placeholder="Username" type="text" required />
                            <div class="vector-wrapper">
                            </div>
                        </div>
                        <div class="password-parent">
                            <input class="password" name="password" placeholder="Password" type="password" required />
                            <div class="vector-container">
                            </div>
                        </div>
                        <div class="frame-div">
                            <button class="rectangle-parent" type="submit">
                                <div class="frame-child"></div>
                                <b class="sign-in">Sign In</b>
                            </button>
                            <div class="forgot-password-wrapper">
                                <a class="forgot-password" href="/forgot-password">Forgot password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <img src="{{ asset('image\Hospital.png') }}" alt="Hospital" class="hospital-image">
    </div>
    <script>
    $(document).ready(function() {
        $('#login-form').on('submit', function(e) {
            e.preventDefault();

            var username = $('.username').val();
            var password = $('.password').val();

            // Mengarahkan pengguna langsung ke halaman homepage
            window.location.href = '/homepage';

            // Mengirim permintaan login ke server (opsional, jika diperlukan)
            // $.ajax({
            //     url: 'http://localhost:8000/login',
            //     method: 'POST',
            //     contentType: 'application/json',
            //     data: JSON.stringify({ username: username, password: password }),
            //     success: function (response) {
            //         // Jika login berhasil, pengguna akan diarahkan ke halaman homepage
            //         window.location.href = '/homepage';
            //     },
            //     error: function (xhr, status, error) {
            //         // Handle error here
            //         alert('Login failed. Please check your username and password.');
            //     }
            // });
        });
    });
    </script>
</body>

</html>