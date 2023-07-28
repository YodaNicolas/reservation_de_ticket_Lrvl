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

    <form method='post' action="{{route('deconection')}}">
        @csrf
        <input type='submit' value='deconnecte'>
    </form>

    <a href="{{route('inscriptionListe')}}" class="btn btn-info"> Liste inscriptions </a>


    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="contentAjout">
            <h2 class="border-bottom pb-2 mb-0">Liste des managers</h2>
            <a href="{{ route('AjoutManager')}}" class="ml-4 text-sm text-gray-700 underline"><button class="btn btn-primary"> Ajouter un utilisateur</button></a>

        </div>


        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col" class="positionActionBouton">
                        <div class="actpo">Action</div>
                    </th>
                </tr>
            </thead>
            <tbody>



                <tr>
                    <th scope="row">1</th>
                    <td>Hien</td>
                    <td>Baki</td>
                    <td>baki@gmail.com</td>
                    <td>

                    </td>
                    <td>

                        <div class="positionActionBouton">
                            <a class="btn btn-success" href="">Modifier</a>

                            <a href="" class="btn btn-danger" onclick="if(confirm('Voulez-vous supprimer cet utilisateur?')){document.getElementById.submit()}">Supprimer</a>
                        </div>

                    </td>
                </tr>


            </tbody>


        </table>
    </div>

</body>

</html>