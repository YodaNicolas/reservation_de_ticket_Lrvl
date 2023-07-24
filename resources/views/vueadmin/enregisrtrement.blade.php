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

        <form>
            <div class="container">
                <h1>Sign Up</h1>
                <p>Renseignez vos infos pour ceer un compte.</p>

                <label for="email"><b>Username</b></label>
                <input type="text" name="nom" placeholder="Enter Username" required>

                <label for="email"><b>Prenom</b></label>
                <input type="text" placeholder="Enter Email" name="prenom" required>

                <label for="psw"><b>Email</b></label>
                <input type="password" placeholder="Enter email" name="psw" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <label for="psw"><b> Confirm Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <div class="clearfix">
                    <button type="submit" class="btn">Sign Up</button>
                </div>
            </div>
        </form>

    </body>

</html>