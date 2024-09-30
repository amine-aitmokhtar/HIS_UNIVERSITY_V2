@extends('adminPortail')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des candidat HIS </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <!--==================== UNICONS ====================-->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
</head>
  <body>

    <style>
     .btn {
    border: 1px solid #e0e0e0;
    background: none;
    border-radius: 4px;
    color: #6a727a;
    cursor: pointer;
    font-family: var(--font-family);
  }

  .btn-success:hover {
  background: rgb(47, 214, 111);
  color: white;
  }
  .btn-danger:hover {
    background: crimson;
    color: white;
  }

  .btn-primary
 {
  align-items: center;
  color: white;
  background-color: #0eacca !important;
  border: white;
  font-weight: bold !important;
  transition: all 0.2s ease-in-out;
}
.btn-primary:hover
{
background-color: #0079b9 !important;
  transform: translateY(-2px);
}

.btn-primary:active
{
  background-color: #0eacca;
  border-color: #0eacca;
  transform: translateY(2px);
}

.page-item.active .page-link{
    background-color: #0eacca;
}
.div.dataTables_wrapper div.dataTables_filter{
    text-align: none;
}
.dataTables_filter{
    margin-left: -19rem;
}
.dataTables_length{

   margin-left: -19rem;
}
        </style>


    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h1>Liste des étudiant </h1>
                <hr>
                <a a href="{{route('ajouterEtudiant')}}" class="btn btn-primary">Ajouter un étudiant</a>
                <hr>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            <div class="container mt-4">
                <table id="datatable" class="table dataTable">
                    <thead>
                        <tr>

                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Adresse email</th>
                            <th data-orderable="false">Action</th>
                        </tr>

                    </thead>

                    <tbody>
                        @foreach($etudiants as $etudiant)
                        <tr>

                            <td>{{ $etudiant->matricule }}</td>
                            <td>{{ $etudiant->nom }}</td>
                            <td>{{ $etudiant->prenom }}</td>
                            <td>{{ $etudiant->user->email }}</td>

                            <td>
                                <a href="{{ route('updateAdminEtudiant', ['id' => $etudiant->idEtd]) }}" class="btn btn-success">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>



                                <a href="{{ route('deleteAdminEtudiant', ['id' => $etudiant->idEtd]) }}" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>


                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#datatable').DataTable();
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
@endsection
