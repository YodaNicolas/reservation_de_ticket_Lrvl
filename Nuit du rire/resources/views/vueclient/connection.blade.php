<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>title</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/client/connection.css')}}" />
</head>

<body>

    <nav class="navbar navbar navbar-expand-lg " style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('LOGO RESERVAZONE.jpg')}}" height="40px" width="40px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul> -->
                <span class="navbar-text">
                    <!-- <form method='post' action="{{route('deconection')}}">
                        @csrf
                        <input class="btn btn-dark" type='submit' value='Se connecter'>
                    </form> -->
                </span>
            </div>
        </div>
    </nav>
    <section class="container">
        <div class="login-container">
            <h3> @if (Session:: has('statut'))
                {{ Session::get('statut') }}
                @endif
            </h3>
            <div class="circle circle-one"></div>
            <div class="form-container">
                <h1 class="opacity">CONNECTION</h1>
                <form method="post" action="{{route('connectionTraitement')}}">

                    @csrf
                    <input type="text" name="email" placeholder="Email ou Numero" />
                    <input type="password" name="password" placeholder="Mot de passe" />
                    <button type="submit" class="opacity">SE CONNECTER</button>
                </form>
                <div class="register-forget opacity">
                    <a href="{{route('inscriptionClient')}}">Créer un compte ICI !</a>

                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
    <script src="{{asset('js/bootstrap.min.js')}}"> </script>
    <script src="{{asset('js/client/connection.js')}}"></script>
</body>

</html>