<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Client register</title>
    <link rel="stylesheet" href="{{asset('css/client/register.css')}}" />
</head>

<body>

    <head>

    <body>

        <form method="post" action="{{url('envoiEnBaseAdmin')}}">
            @csrf
            <div class="container">
                <h1>Sign Up</h1>
                <p>Renseignez vos infos pour ceer un compte administrateur.</p>

                <label for="email"><b>Nom</b></label>
                <input type="text" name="nom" placeholder="Entrez votre nom" required>

                <label for="email"><b>Prenom</b></label>
                <input type="text" placeholder="Entrez votre prenom" name="prenom" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Entrez votre mail" name="email" required>


                <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrez le mot de passe" name="password1" required>

                <label for="psw"><b>Confirmation</b></label>
                <input type="password" placeholder="confirmez le mot de passe" name="password2" required>

                <div class="clearfix">
                    <button type="submit" class="btn">Sign Up</button>
                </div>
            </div>
        </form>

    </body>

</html>