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

        <form method="post" action="{{url('envoiEnBase')}}">
            @csrf
            <div class="container">
                <h1>Sign Up</h1>
                <p>Renseignez les infos pour ajouter manager! .</p>

                <label for="email"><b>Nom</b></label>
                <input type="text" name="nom" placeholder="Entrez le nom" required>

                <label for="email"><b>Prenom</b></label>
                <input type="text" placeholder="Entrez le prenom" name="prenom" required>

                <label for="email"><b>Numero</b></label>
                <input type="tel" placeholder="Entrez le numero" name="numero" required>


                <!-- <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrez le mot de passe" name="password1" required> -->


                <div class="clearfix">
                    <button type="submit" class="btn">Sign Up</button>
                </div>
            </div>
        </form>

    </body>

</html>