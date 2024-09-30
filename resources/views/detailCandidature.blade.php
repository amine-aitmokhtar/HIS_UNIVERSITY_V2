@extends('bureauPortail')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col">

                <h1 id="titre1">Détails de la demande d'admission</h1>
                <hr>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb yes">
                        <li class="breadcrumb-item"><a href="{{ route('ConsulterDetailCandidat-Formation', ['id' => $candidat->idCand]) }}">FORMATION</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ConsulterDetailCandidat-EtatCivil', ['id' => $candidat->idCand]) }}">ÉTAT CIVIL</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ConsulterDetailCandidat-ParcoursAcademique', ['id' => $candidat->idCand]) }}">PARCOURS ACADÉMIQUE</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ConsulterDetailCandidat-InformationsDiverses', ['id' => $candidat->idCand]) }}">INFORMATIONS DIVERSES</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ConsulterDetailCandidat-Justificatif', ['id' => $candidat->idCand]) }}">JUSTIFICATIF</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ConsulterDetailCandidat-Decision', ['id' => $candidat->idCand]) }}">DÉCISION</a></li>
                    </ol>
                </nav>

                  <hr>
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

                <br>

                    <h3 class="titre-etatcivil">Formation</h3>
                    <div class="row">
                        <div class="col-md-4">
                          <label for="nom" class="form-label">Diplome</label>
                          <input type="text" class="form-control" id="DiplomeCandidat" name="diplomeCand" value="{{$candidat->demandeAdmission->diplomeCand}}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                          <label for="prenom" class="form-label">Mention</label>
                          <input type="text" class="form-control" id="MentionCand" name="mentionCand" value="{{$candidat->demandeAdmission->mentionCand}}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                          <label for="prenom" class="form-label">Niveau</label>
                          <input type="text" class="form-control" id="NiveauCand" name="niveauCand" value="{{$candidat->demandeAdmission->niveauCand}}" readonly>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>

        <div class="col">
                <a href="{{route('ListeCandidature')}}" class="btn btn-danger">Revenir à liste des candidature</a>



                <a href="{{route('ListeCandidature')}}" class="btn btn-success">Suivant</a>
</div>

    </div>

@endsection
