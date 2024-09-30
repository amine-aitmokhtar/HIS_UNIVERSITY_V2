<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidat;
use App\Models\Specialite;
use App\Models\DemandeAdmission;



use Illuminate\Http\Request;

class CandidatureController extends Controller
{
    public function index(){

        return view("candidatureForm");
    }


    public function save_candidature_his (Request $request)
    {
        $request->validate([

            'diplomeCand'=> 'required',
            'mentionCand'=> 'required',
            'niveauCand'=> 'required',
            'nom'=> 'required',
            'prenom'=> 'required',
            'dateNaiss'=> 'required',
            'sexe'=> 'required',
            'villeNaiss'=> 'required',
            'telephone'=> 'required',
            'adresse'=> 'required',
            'pays'=> 'required',
            'codePostal'=> 'required',
            'ville'=> 'required',
            'anneeBac'=> 'required',
            'serieBac'=> 'required',
            'scoreBac'=> 'required',
            'nomLycee'=> 'required',
            'langueMat1'=> 'required',
            'langueMat2'=> 'required',
            'niveauFr'=> 'required',
            'niveauEn'=> 'required',
            'situationCand'=> 'required',
            'connaissHis'=> 'required',
            'photoFILE' => 'required|file',
            'idPDF' => 'required|file',
            'note_trimestre_PDF' => 'required|file',
            'note_bac_PDF' => 'required|file',
            'diplome_bac_PDF' => 'required|file',

        ]);
            // Récupérer les valeurs des champs "diplomeCand", "mentionCand" et "niveauCand"
            $diplomeCand = $request->diplomeCand;
            $mentionCand = $request->mentionCand;
            $niveauCand = $request->niveauCand;

            $email = 'aitmokhtarmohamedamine20@his.edu.dz';

            // Vérifier si l'utilisateur existe déjà dans la table "users" avec l'e-mail fourni
            $user = User::where('email', $email)->first();

            // Enregistrement des données dans la table "candidat$candidat"
            $candidat = new Candidat;
            $candidat->nom = $request->nom;
            $candidat->prenom = $request->prenom;
            $candidat->dateNaiss = $request->dateNaiss;
            $candidat->sexe = $request->sexe;
            $candidat->villeNaiss = $request->villeNaiss;
            $candidat->telephone = $request->telephone;
            $candidat->adresse = $request->adresse;
            $candidat->pays = $request->pays;
            $candidat->codePostal = $request->codePostal;
            $candidat->ville = $request->ville;
            $candidat->anneeBac = $request->anneeBac;
            $candidat->serieBac = $request->serieBac;
            $candidat->scoreBac = $request->scoreBac;
            $candidat->nomLycee = $request->nomLycee;
            $candidat->langueMat1 = $request->langueMat1;
            $candidat->langueMat2 = $request->langueMat2;
            $candidat->niveauFr = $request->niveauFr;
            $candidat->niveauEn = $request->niveauEn;
            $candidat->situationCand = json_encode($request->situationCand);
            $candidat->connaissHis = $request->connaissHis;

            // Enregistrer les fichiers dans le système de fichiers et obtenir les chemins d'accès
            $photoPath = $request->file('photoFILE')->store('photoFILE');
            $idPath = $request->file('idPDF')->store('idPDF');
            $noteTrimPath = $request->file('note_trimestre_PDF')->store('note_trimestre_PDF');
            $noteBacPath = $request->file('note_bac_PDF')->store('note_bac_PDF');
            $diplomeBacPath = $request->file('diplome_bac_PDF')->store('diplome_bac_PDF');

            // Associer les chemins d'accès aux colonnes correspondantes dans le modèle de table "candidats"
            $candidat->photoFILE = $photoPath;
            $candidat->idPDF = $idPath;
            $candidat->note_trimestre_PDF = $noteTrimPath;
            $candidat->note_bac_PDF = $noteBacPath;
            $candidat->diplome_bac_PDF = $diplomeBacPath;

            $candidat->user()->associate($user); // Association de l'utilisateur à l'étudiant
            $candidat->save();


            $candidatId = $candidat->id; // Récupérer l'ID du candidat

            // Créer une nouvelle entrée dans la table "specialites"
            $specialite = new Specialite;
            $specialite->titre = $mentionCand; // Assigner la valeur de mentionCand au champ "titre"
            $specialite->duree = $request->anneeBac; // Assigner la valeur de anneeBac au champ "duree"
            $specialite->save();
            $specialiteId = $specialite->id; // Récupérer l'ID de la spécialité

         // Création de la demande d'admission associée
            $demandeAdmission = new DemandeAdmission;
            // Association du candidat à la demande d'admission
            $demandeAdmission->Candidat()->associate($candidat);
            $demandeAdmission->Specialite()->associate($specialite);
            $demandeAdmission->diplomeCand = $diplomeCand;
            $demandeAdmission->mentionCand = $mentionCand;
            $demandeAdmission->niveauCand = $niveauCand;


            $demandeAdmission->save();


            return redirect()->route('candidatureForm')->with('status','L\'étudiant a été ajouté avec succès.');

                }


                public function espace_cand ()
                {
                    $email = 'aitmokhtarmohamedamine20@gmail.com';
                    $user = User::where('email', $email)->first();
                    $candidat = $user->Candidat;
                    $demandeAdmission = $candidat->demandeAdmission;
                    return view("espaceCandidature", compact('candidat', 'user', 'demandeAdmission'));
                }



    }





