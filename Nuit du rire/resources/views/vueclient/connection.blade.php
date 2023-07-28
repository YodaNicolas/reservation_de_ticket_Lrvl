<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>title</title>
    <link rel="stylesheet" href="{{asset('css/client/connection.css')}}" />
</head>

<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <!-- <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" /> -->
                <h1 class="opacity">LOGIN</h1>
                <form method="post" action="{{route('connectionTraitement')}}">
                    @csrf
                    <input type="text" name="email" placeholder="Email" />
                    <input type="password" name="password" placeholder="Mot de passe" />
                    <button type="submit" class="opacity">SUBMIT</button>
                </form>
                <div class="register-forget opacity">
                    <a href="{{route('inscriptionClient')}}">REGISTER</a>
                    <a href="">FORGOT PASSWORD</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
    <script src="{{asset('js/client/connection.js')}}"></script>
</body>

</html>