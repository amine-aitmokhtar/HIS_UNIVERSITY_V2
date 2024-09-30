<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Dans votre fichier de vue ou de mise en page -->
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/lib/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/espCandidature.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

</head>

</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"
            ><img
              class="logo"
              src="../images/HIS_LOGO_only.png"
              alt="Logo de l'université"
          /></a>

          <a class="navbar-brand" href="#">
              <img class="title" src="{{ asset('images/HIS_TITLE_only.png') }}" alt="Titre de l'image">
          </a>


          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <button id="monPortailBtn" type="button" class="btn btn-primary">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="22"
                height="25"
                fill="currentColor"
                class="bi bi-box-arrow-in-right"
                viewBox="0 1 18 18"
              >
                <path
                  fill-rule="evenodd"
                  d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"
                />
                <path
                  fill-rule="evenodd"
                  d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"
                />
              </svg>
              Candidat
            </button>

          </div>
        </div>
      </nav>

        <section class="container">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <ul>
            @foreach ($errors->all() as $error)
            <li class="alert alert-danger"> {{ $error }} </li>
            @endforeach
        </ul>
            <header> Ma candidature</header>
            <form action="#" class="form">
              <p class="texte-candidature">Accéder à votre candidature pour consulter les informations complémentaires sur votre admission ou le motif de refus.</p>

              <div class="border">
                <table class="table">
                  <thead>
                    <tr>
                        <th>Formation</th>
                        <th>Année</th>
                        <th>Décision</th>
                        <th>État</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="file-cell">
                            <span class="nom-formation">{{ $candidat->demandeAdmission->diplomeCand }}</span>
                        </td>
                        <td>
                            <span class="etat-cell">{{ $candidat->demandeAdmission->niveauCand  }}</span>
                        </td>
                        <td class="etat-cell">
                            {{-- <span>{{ $dotnnee->decision }}</span> --}}
                        </td>
                        <td class="etat-cell">
                            {{-- <span>{{ $donnee->etat }}</span> --}}
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </form>
          </section>


          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
