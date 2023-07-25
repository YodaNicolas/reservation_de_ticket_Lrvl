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
  


<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">liste des managers</h6>
    <div class="d-flex justify-content-end mb-4">
    <a href="#" class="btn btn-primary">ajouter un nouveau manager</a></div>
    <table class="table table-bordered table-how">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">numero de telephone</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <tr>
            <th scope="row">1</th>
            <td>kando</td>
            <td>naomie</td>
            <td>07253520</td>
            <td>
            <a href="#" class="btn btn-info">modifier un manager</a>
            <a href="#" class="btn btn-danger">suprimer un manager</a>
        </td>
          </tr>
         
        </tbody>
      </table>
  </div>
  

</div>

</body>
</html>