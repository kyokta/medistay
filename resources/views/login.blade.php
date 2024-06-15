<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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
                    <form id="login-form" class="frame-form" action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="username-parent">
                            <input class="username" name="username" placeholder="Username" type="text" value="{{ old('username') }}" required />
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
        <img src="{{ asset('image/Hospital.png') }}" alt="Hospital" class="hospital-image">
    </div>

    @if ($errors->any())
        <script>
            $(document).ready(function() {
                swal("Login Failed", "{{ $errors->first() }}", "error");
            });
        </script>
    @endif
</body>

</html>
