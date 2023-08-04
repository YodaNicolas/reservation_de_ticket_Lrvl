<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Client register</title>
    <link rel="stylesheet" href="{{asset('css/client/register.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>

<body>

    <head>

    <body>
        <nav class="navbar navbar navbar-expand-lg " style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Reserva</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <a class="navbar-brand btn btn-dark" href="{{url('/')}}">Se connecter</a>
                    </span>
                </div>
            </div>
        </nav>


        <form method="post" action="{{url('envoiEnBaseClient')}}">
            @csrf
            <div class="container">
                <h1>Inscription</h1>
                <p>Chere client(e) renseignez vos infos pour ceer un compte.</p>
                @if (Session:: has('ok'))
                {{ Session::get('ok') }}
                @endif
                @if (Session:: has('non_ok'))
                {{ Session::get('non_ok') }}
                @endif
                <label for="email"><b>Nom</b></label>
                <input type="text" placeholder="Entrez votre nom" name="nom" required>

                <label for="email"><b>Prenom</b></label>
                <input type="text" placeholder="Entrez votre prenom" name="prenom" required>

                <label for="email"><b>Numero</b></label>
                <input type="text" placeholder="Entrez votre numero" name="numero" required>

                <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrez le mot de passe" name="password1" required>

                <label for="psw"><b>Confirmation</b></label>
                <input type="password" placeholder="confirmez le mot de passe" name="password2" required>

                <div class="clearfix">
                    <button type="submit" class="btn">Enregistrer</button>
                </div>
            </div>
        </form>
        <script src="{{asset('js/bootstrap.min.js')}}"> </script>

    </body>

</html>