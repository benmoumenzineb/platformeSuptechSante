<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;
class AjouteNoteController extends Controller
{
   

    public function indexx(Request $request)
    {
        if ($request->ajax()) {
            // Récupérer les valeurs des critères choisis depuis la requête
            $cycle = $request->input('cycle');
            $filiere = $request->input('filiere');
            $niveau = $request->input('niveau');
            $groupe = $request->input('groupe');
            $matiere = $request->input('matiere');
    
            // Commencer avec une requête pour les étudiants
            $query = Etudians::query();
    
            // Appliquer les filtres en fonction des critères choisis
            if ($cycle) {
                $query->where('Cycle', $cycle);
            }
            if ($filiere) {
                $query->where('Filiere', $filiere);
            }
            if ($niveau) {
                $query->where('Niveau', $niveau);
            }
            if ($groupe) {
                $query->where('Groupe', $groupe);
            }
            if ($matiere) {
                $query->where('Matiere', $matiere);
            }
    
            // Récupérer les données du DataTables
            $etudiants = $query->get(['apogee','CNE','CNI','Nom','Prenom','CTR1','CTR2','EF','TP']);
    
            // Renvoyer les données au format JSON requis par DataTables
            return DataTables::of($etudiants)
                ->make(true);
        
    
        // Si la requête n'est pas AJAX, renvoyer la vue normale
        
    }
    return view('Prof.views.ajoutenote');
    }

/*public function fetchEtudiants(Request $request)
{
    // Récupérer le cycle depuis la requête
    $cycle = $request->input('cycle');

    // Utiliser le cycle pour filtrer les étudiants
    $etudiants = Etudians::where('Cycle', $cycle)->get(['apogee','CNE','CNI','Nom','Prenom','CTR1','CTR2','EF','TP']);

    // Renvoyer les données au format JSON requis par DataTables
    return DataTables::of($etudiants) 
         ->make(true);
}


public function update(Request $request, $id)
{
    $etudiant = Etudians::findOrFail($id);
    $etudiant->CTR1 = $request->input('CTR1');
    $etudiant->CTR2 = $request->input('CTR2');
    $etudiant->EF = $request->input('EF');
    $etudiant->TP = $request->input('TP');
    $etudiant->save();

    return redirect()->back()->with('success', 'Les notes ont été mises à jour avec succès');
}*/
 
public function fetchEtudiants(Request $request)
{
    $cycle = $request->input('cycle');

    // Utiliser le cycle pour filtrer les étudiants
    $etudiants = Etudians::where('Cycle', $cycle)->get(['apogee','CNE','CNI','Nom','Prenom','CTR1','CTR2','EF','TP']);

    // Renvoyer les données au format JSON requis par DataTables
    return DataTables::of($etudiants)
         ->addIndexColumn()
         ->make(true);
}

public function index(Request $request)
{
    return view('prof.views.noteprof');
}



public function getEtudiantsByCycle(Request $request)
{
    $cycle = $request->input('cycle');
    $filiere = $request->input('filiere');
    $matiere = $request->input('matiere');
    $groupe = $request->input('groupe');
   
    // Stockez les choix dans des variables de session
    $request->session()->put('cycle', $cycle);
    $request->session()->put('filiere', $filiere);
    $request->session()->put('matiere', $matiere);
    $request->session()->put('groupe', $groupe);
    
    $etudiants = Etudians::where('Cycle', $cycle)
                        ->where('Filiere', $filiere)
                        ->where('Matiere', $matiere)
                        ->where('Groupe', $groupe)
                        ->get(['apogee','CNE','CNI','Nom','Prenom','CTR1','CTR2','EF','TP']);
    
    // Redirigez vers la deuxième vue avec les choix comme paramètres d'URL
    return view('Prof.views.ajoutenote', compact('etudiants'));
}

public function getEtudiantsData(Request $request)
{ 
    $cycle = $request->session()->get('cycle');
    $filiere = $request->session()->get('filiere');
    $matiere = $request->session()->get('matiere');
    $groupe = $request->session()->get('groupe');

    $etudiants = Etudians::where('Cycle', $cycle)
                        ->where('Filiere', $filiere)
                        ->where('Matiere', $matiere)
                        ->where('Groupe', $groupe)
                        ->get(['apogee','CNE','CNI','Nom','Prenom','CTR1','CTR2','EF','TP']);
    
    $formattedData = DataTables::of($etudiants)
        ->addIndexColumn()
        ->make(true);

    // Retournez les données formatées sous forme de réponse JSON pour DataTables
    return $formattedData;
}



}