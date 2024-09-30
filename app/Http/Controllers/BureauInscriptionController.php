<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidat;
use App\Models\Specialite;

use App\Models\DemandeAdmission;

class BureauInscriptionController extends Controller
{
    public function index()
     {

         return view("bureauPortail");

     }


     public function liste_candidature()

     {
         $candidats = Candidat::all();
         $specialites = Specialite::all();
         $demandeAdmissions = DemandeAdmission::all();
         return view("voirCandidat", compact('candidats','specialites','demandeAdmissions'));
     }

     public function consulter_formation($id)
     {
         $candidat = Candidat::find($id);
         $demandeAdmission = $candidat->demandeAdmission;
         return view('detailCandidature', compact('candidat','demandeAdmission'));
     }

     public function consulter_etat_civil($id)
     {
         $candidat = Candidat::find($id);
         $demandeAdmission = $candidat->demandeAdmission;
         return view('detailCandidature2', compact('candidat','demandeAdmission'));
     }

     public function consulter_parcours($id)
     {
         $candidat = Candidat::find($id);
         $demandeAdmission = $candidat->demandeAdmission;
         return view('detailCandidature3', compact('candidat','demandeAdmission'));
     }

     public function consulter_information_diverse($id)
     {
         $candidat = Candidat::find($id);
         $demandeAdmission = $candidat->demandeAdmission;
         return view('detailCandidature4', compact('candidat','demandeAdmission'));
     }
     public function consulter_justificatif($id)
     {
         $candidat = Candidat::find($id);
         $demandeAdmission = $candidat->demandeAdmission;
         return view('detailCandidature5', compact('candidat','demandeAdmission'));
     }

     public function decision($id)
     {
         $candidat= Candidat::find($id);
         $demandeAdmission = $candidat->demandeAdmission;
         return view('detailCandidature6', compact('candidat','demandeAdmission'));
     }


    public function save_decision(Request $request)
    {
        $request->validate ([
            'matricule' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $etudiant = Etudiant::find($request->id);
        $user = $etudiant->user;

        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hashage du mot de passe
        $user->update();

        $etudiant->matricule = $request->matricule;
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->update();

        return redirect()->route('updateAdminEtudiant', ['id' => $etudiant->idEtd])->with('status', 'L\'étudiant a été modifié avec succès.');
    }





}
