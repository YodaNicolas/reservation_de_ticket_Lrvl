<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/listemanager.css')}}">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
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

    <a href="{{route('inscriptionListe')}}" class="btn btn-info"> Liste inscriptions </a>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="contentAjout">
            <h2 class="border-bottom pb-2 mb-0">Liste des reservation</h2>
            <!-- <a href="{{ route('AjoutManager')}}" class="ml-4 text-sm text-gray-700 underline"><button class="btn btn-primary"> Ajouter un manager</button></a> -->

        </div> @if (Session:: has('status'))
        <h3>

            {{ Session::get('status') }}

        </h3> @endif
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nom du client</th>
                    <th scope="col">Numero </th>
                    <th scope="col">Date de reservation</th>
                    <th scope="col">Etat</th>
                    <th scope="col" class="positionActionBouton">
                        <div class="actpo">Action</div>
                    </th>
                </tr>
            </thead>

            <tbody>

                @if (Session:: has('statut'))
                <tr>
                    <h2 style="color: red;">
                        {{ Session::get('statut') }}
                    </h2>
                </tr>
                @endif

                @foreach ( $reservs as $reserv )
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $reserv->user->nom}}</td>
                    <td>{{ $reserv->user->numero}}</td>
                    <td>{{ $reserv->created_at }}</td>
                    <td>{{ $reserv->etat_reservation }}</td>

                    <td>
                        <div class="positionActionBouton">
                            <a class="btn btn-success" href="{{url('valid/'.$reserv->id)}}">Modifier</a>
                            <a href="{{url('delete/'.$reserv->id)}}" class="btn btn-danger" onclick="if(confirm('Voulez-vous supprimer cette reservation?')){document.getElementById.submit()}">Supprimer</a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <script src="{{asset('js/bootstrap.min.js')}}"> </script>

</body>

</html>