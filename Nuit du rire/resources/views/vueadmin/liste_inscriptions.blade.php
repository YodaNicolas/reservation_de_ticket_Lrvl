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

  <a href="{{route('reservlist')}}" class="btn btn-info"> Liste des reservations </a>

  @if (Session:: has('statut'))
  <a href="{{route('managerlist')}}" class="btn btn-info"> Liste manager </a>
  @endif

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <div class="contentAjout">
      <h2 class="border-bottom pb-2 mb-0">liste des inscriptions en attente.</h2>
    </div>

    <table class="table table-warning table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">numero de telephone</th>
          <th scope="col">Inscrit depuis </th>
          <th scope="col" class="positionActionBouton">
            <div class="actpo">Action</div>
          </th>
        </tr>
      </thead>

      <tbody>
        @foreach ($attentes as $attente )
        <tr>
          <th scope="row">1</th>
          <td>{{ $attente->nom }}</td>
          <td>{{ $attente->prenom }}</td>
          <td>{{ $attente->numero }}</td>
          <td>{{ (new DateTime ($attente->created_at))->format('j, F Y H:i') }}</td>

          <td>
            <div class="positionActionBouton">
              <a href="{{url('validation/'.$attente->id)}}" class="btn btn-info"> valider </a>
              <a href="{{url('delete/'.$attente->id)}}" class="btn btn-danger" onclick="if(confirm('Voulez-vous supprimer cette inscription?')){document.getElementById('form-{{$attente->id}}').submit()}">Supprimer</a>
            </div>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>




</body>

</html>