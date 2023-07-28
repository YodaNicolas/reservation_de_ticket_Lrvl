<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>

<body>



  bienvenue:

  <form method='post' action="{{route('deconection')}}">
    @csrf
    <input type='submit' value='deconnecte'>
  </form>


  <a href="{{route('managerlist')}}" class="btn btn-info"> Liste manager </a>



  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">liste des inscriptions</h6>
    <div class="d-flex justify-content-end mb-4">

      <table class="table table-bordered table-how">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">numero de telephone</th>
            <th scope="col">Email</th>

            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          @foreach ($attentes as $attente )
          <tr>
            <th scope="row">1</th>
            <td>{{ $attente->nom }}</td>
            <td>{{ $attente->etat }}</td>
            <td>025475252</td>
            <td>naomi@gmail.com</td>
            <td>
              <a href="{{url('validation/'.$attente->id)}}" class="btn btn-info"> valider </a>
              <a href="{{url('delete/'.$attente->id)}}" class="btn btn-danger" onclick="if(confirm('Voulez-vous supprimer cette inscription?')){document.getElementById('form-{{$attente->id}}').submit()}">Supprimer</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>