<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Client register</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/client/connection.css')}}" />
</head>

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
                    <form method='post' action="{{route('deconection')}}">
                        @csrf
                        <input class="btn btn-dark" type='submit' value='deconnecte'>
                    </form>
                </span>
            </div>
        </div>
    </nav>
    <form method='post' action="{{route('deconection')}}">
        @csrf
        <input type='submit' value='deconnecte'>
    </form>


    bienvenue:


    @if (Session:: has('statut'))

    {{ Session::get('statut') }}

    @endif
    <a class="btn btn-success" href="{{url('reserve/'.$cnt->id)}}">Faire une reservation</a>

    <a class="btn btn-success" href="{{url('mesreserve/'.$cnt->id)}}">Voir mes reservation</a>
</body>

</html>