<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Client register</title>
    <link rel="stylesheet" href="{{asset('css/client/register.css')}}" />
</head>

<body>
    <form method="post" action="{{url('insertdonne/'.$utilisat->id)}}">
        @csrf
        @method('PUT')
        <div class="container">
            <h3>MODIFICATION DU COMPTE DE :{{$utilisat->nom}}.</h3>
            <!-- <p>MODIFIER LE COMPTE DE :<h3> </h3></p> -->
            @if (Session:: has('ok'))
            {{ Session::get('ok') }}
            @endif
            @if (Session:: has('non_ok'))
            {{ Session::get('non_ok') }}
            @endif
            <label for="email"><b>Nom</b></label>
            <input type="text" name="nom" value="{{$utilisat->nom}}" placeholder="Entrez le nom" required>

            <label for="email"><b>Prenom</b></label>
            <input type="text" placeholder="Entrez votre prenom" value="{{$utilisat->prenom}}" name="prenom" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Entrez votre mail" value="{{$utilisat->email}}" name="email" required>

            <div class="clearfix">
                <button type="submit" class="btn">Sign Up</button>
            </div>
        </div>
    </form>

</body>

</html>