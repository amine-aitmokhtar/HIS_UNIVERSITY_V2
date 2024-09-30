@extends('bureauPortail')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 id="titre1">Détails de la demande d'admission</h1>
                <hr>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
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
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>

                <br>


                <section class="container">
                    <h3>Décision concernant la candidature</h3>

                    <form action="#" class="form">
                        État actuel de la candidature :

                      <div class="border">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Formation</th>
                              <th>Année</th>
                              <th>État</th>
                              <th>Date</th>
                              <th></th>
                            </tr>
                          </thead>
                        </tbody>
                          <tr>
                              <td>{{ $candidat->demandeAdmission->mentionCand }}</td>
                              <td>{{ $candidat->demandeAdmission->niveauCand }}</td>
                              <td>{{ $candidat->demandeAdmission->niveauCand }}</td>
                              <td>{{ $candidat->demandeAdmission->created_at }}</td>



                          </tr>

                      </tbody>
                        </table>


                      </div>
                      <br>
                      <div class="text-center mt-5 btn-decision" >
                        <a href="{{ route('adminPersonnelBureauInscription') }}" class="btn btn-primary m-2" id="accepter">
                          <i class="fa-solid fa-user-plus"></i> Accepter
                        </a>

                        <a href="{{ route('adminPersonnelBureauInscription') }}" class="btn btn-primary m-2" id="reorienter">
                          <i class="fa-solid fa-user-minus"></i> Réorientation
                        </a>

                        <a href="{{ route('adminPersonnelBureauInscription') }}" class="btn btn-primary m-2" id="refuser">
                            <i class="fa-solid fa-user-slash"></i> Refusé
                          </a>
                      </div>

                    </form>
                  </section>


    </div>
@endsection
