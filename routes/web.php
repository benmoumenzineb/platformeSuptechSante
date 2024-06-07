<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeetudiantController;
use App\Http\Controllers\Profil_etudiantController;
use App\Http\Controllers\DemandeetudiantController;
use App\Http\Controllers\EmploietudiantController;
use App\Http\Controllers\ReclamationetudiantController;
use App\Http\Controllers\PaiementetudiantController;
use App\Http\Controllers\NoteEtudiantController;
use App\Http\Controllers\ExamEtudiantController;
use App\Http\Controllers\homeProfController;
use App\Http\Controllers\homeScolariteController;
use App\Http\Controllers\LoginetudiantController;
use App\Http\Controllers\ListetudiantController;
use App\Http\Controllers\DemandeScolariteController;
use App\Http\Controllers\ReclamationScolariteController;
use App\Http\Controllers\PaiementScolariteController;
use App\Http\Controllers\CahierTextProfController;
use App\Http\Controllers\PresenceProfController;
use App\Http\Controllers\FormtelechargerController;
use App\Http\Controllers\HistoriqueprofController;

use App\Http\Controllers\NotifactionsexamController;
use App\Http\Controllers\NoteProfController;
use App\Http\Controllers\AjouteNoteController;
use App\Http\Controllers\ListePresenceController;
use App\Http\Controllers\AjouterEtudiantController;
use App\Http\Controllers\RhPersonnelControlleur;
use App\Http\Controllers\homeRHController;
use App\Http\Controllers\Auth\EtudiantLoginController;
use App\Http\Controllers\ProgrammeEvaluationController;
use App\Http\Controllers\HomeaAccuielController;

use App\Http\Controllers\ExamNotificationController;
use App\Http\Controllers\AbsenceProfacceuilcontroller;


Route::get('/absenceaccuiel', [AbsenceProfacceuilcontroller::class, 'index'])->name('absence.accueil');
Route::get('/exams/create', [ExamNotificationController::class, 'create'])->name('scolarite.views.notificationsexam');
Route::post('/exams', [ExamNotificationController::class, 'store'])->name('exams.store');
Route::get('/student/exams', [ExamNotificationController::class, 'studentExams'])->name('etudiant.views.exametudiant');

Route::middleware(['web'])->group(function () {
    Route::get('/loginetudiant', [EtudiantLoginController::class, 'index'])->name('etudient.login');
    Route::post('/loginetudiant2', [EtudiantLoginController::class, 'login_etudient'])->name('login.submit');
    Route::get('/homeetudiant', [homeetudiantController::class, 'index'])->name('homeetudiant');
});

Route::get('/logout', [EtudiantLoginController::class, 'logout'])->name('logout.etudiant');

Route::get('/homeetudiant', [homeetudiantController::class, 'index'])->name('homeetudiant');

route::get('/emploi','App\Http\Controllers\EmploietudiantController@index')->name('emploi');
route::get('/demande','App\Http\Controllers\DemandeetudiantController@index')->name('demande');
route::post('/enregistrer-demande','App\Http\Controllers\DemandeetudiantController@enregistrerDemande')->name('endemande');
route::get('/reclamation','App\Http\Controllers\ReclamationetudiantController@index')->name('reclamation');
Route::post('/enregistrer-reclamation', 'App\Http\Controllers\ReclamationetudiantController@enregistrerReclamation')->name('enreclamation');
Route::post('/enregistrer-paiement', 'App\Http\Controllers\PaiementetudiantController@enregistrerPaiement')->name('enpaiement');

route::get('/paiement','App\Http\Controllers\PaiementetudiantController@index')->name('paiement');
route::get('/note','App\Http\Controllers\NoteEtudiantController@index')->name('note');

Route::get('/nav', function () {
    return view('prof.layouts.navbarprof');
   
});
Route::get('/etudiants', [LoginetudiantController::class, 'index']);
Route::get('/etudiants/search', [LoginetudiantController::class, 'search'])->name('etudiant.search');
Route::get('/homeprof', [homeProfController::class, 'index'])->name('homeprof');

Route::get('/navbarsscolarite', function () {
    return view('scolarite.layouts.navbarscolarite');
   
});
Route::get('/homescolarite', [homeScolariteController::class, 'index'])->name('homescolarite');
Route::get('/homeaccueil', [HomeaAccuielController::class, 'index'])->name('homeacceuil');
Route::get('/scolaritelisteetudient', [ListetudiantController::class, 'index'])->name('listetudiant');
Route::get('/etudiants/search/scolarite', [ListetudiantController::class, 'search'])->name('etudiant.search.scolarite');
Route::get('/demandescolarite', [DemandeScolariteController::class, 'index'])->name('demandescolarite');
Route::get('/demandescolarite/search', [DemandeScolariteController::class, 'search'])->name('demandescolarite.search');
Route::get('/reclamationscolarite/search', [ReclamationScolariteController::class, 'search'])->name('reclamationscolarite.search');
Route::get('/reclamationscolarite', [ReclamationScolariteController::class, 'index'])->name('reclamationscolarite');
Route::get('/paiementscolarite/search', [PaiementScolariteController::class, 'search'])->name('paiementscolarite.search');
Route::get('/paiementscolarite', [PaiementScolariteController::class, 'index'])->name('paiementscolarite');


Route::get('/Profil_etudiant', [Profil_etudiantController::class, 'index'])->name('Profil_etudiant');
Route::post('/upload-image', [Profil_etudiantController::class, 'uploadImage'])->name('upload.image');



Route::get('/programme-evaluation/create', [ProgrammeEvaluationController::class, 'create'])->name('programme_evaluation.create');
Route::post('/programme-evaluation/store', [ProgrammeEvaluationController::class, 'store'])->name('programme_evaluation.store');

Route::get('/cahiertextprof', [CahierTextProfController::class, 'index'])->name('cahiertextprof');
Route::get('/Presence', [ PresenceProfController::class, 'index'])->name('PresenceEtudiant');
//Route::post('/telecharger-fichier', [FormtelechargerController::class, 'telechargerFichier'])->name('telecharger.fichier');


//Route::post('/enregistrercahiertext', 'App\Http\Controllers\FormtelechargerController@enregistrercahiertext')->name('enregistrercahiertext');

Route::post('/enregistrer-cahier-de-texte', [FormtelechargerController::class, 'enregistrerCahierDeTexte'])->name('enregistrer.cahier');

// Route pour télécharger le cahier de texte
Route::post('/telecharger-cahier-de-texte', [FormtelechargerController::class, 'telechargerCahierDeTexte'])->name('telecharger.cahier');


Route::get('/search', [ListePresenceController::class, 'search'])->name('listepresence.search');










Route::post('/enregistrer-exam', 'App\Http\Controllers\NotifactionsexamController@enregistrerPaiement')->name('enregnotificationsexam');
Route::get('/Note_etudiants', [NoteProfController::class, 'index'])->name('noteetudiants');

Route::get('/Note_etudiants', [NoteProfController::class, 'index'])->name('noteetudiants');
Route::get('/Note_etudiants_Ajoute', [AjouteNoteController::class, 'indexx'])->name('Ajouternoteetudiants');





Route::post('/ajouter-etudiant', [ListetudiantController::class, 'ajouterEtudiant'])->name('ajouter.etudiant');

Route::get('/getDataprofs', [AbsenceProfacceuilcontroller::class, 'fetchPersonnel'])->name('getDataprofs');
Route::get('fetchetudiants', [ListetudiantController::class, 'fetchEtudiants'])->name('getDataEtudients');
Route::post('/update-notes', [AjouteNoteController::class, 'updateNotes'])->name('update.notes');
Route::get('fetch-etudiants', [AjouteNoteController::class, 'fetchEtudiants'])->name('fetch.etudiants');
Route::get('demadnescolariteetudiants', [DemandeScolariteController::class, 'demandeEtudiants'])->name('getDataDemande');
Route::get('/historiqueprofesseur/search', [HistoriqueprofController::class, 'fetchHistorique'])->name('hisroriqueprofesseur');
Route::get('/historiqueprof', [HistoriqueprofController::class, 'index'])->name('historiqueprof');

Route::get('demadneetudiants', [DemandeetudiantController::class, 'demandeEtudiants'])->name('getDataDemandeetudiant');
Route::get('/fetch-etudiants', [AjouteNoteController::class, 'indexx'])->name('fetch.etudiants');
Route::get('/fetch', [AjouteNoteController::class, 'index'])->name('fetch');


Route::get('reclamationscolariteetudiants', [ReclamationScolariteController::class, 'reclamationEtudiants'])->name('getDataReclamation');
Route::get('paiementscolariteetudiants', [PaiementScolariteController::class, 'paiementEtudiants'])->name('getDataPaiement');
Route::get('paiementetudiants', [PaiementetudiantController::class, 'paiementEtudiantshistorique'])->name('getDataPaiementetudiant');
Route::get('/getPaidMonths', [PaiementetudiantController::class, 'getPaidMonths']);



Route::get('/fetch-etudiants', [AjouteNoteController::class, 'indexx'])->name('fetch.etudiants');
Route::get('/fetch', [AjouteNoteController::class, 'index'])->name('fetch');

Route::post('update-etudiant', [ListetudiantController::class, 'update'])->name('update-etudiant');





Route::delete('/etudiants/{id}', [ListetudiantController::class, 'destroy'])->name('etudiants.destroy');
Route::delete('/personnel/{cin_salarie}', [RhPersonnelController::class, 'destroy'])->name('personnel.destroy');







Route::post('/ajouter-etudiant', [ListetudiantController::class,'ajouterEtudiant'])->name('ajouter.etudiant');

Route::get('/homeRH', [homeRHController::class, 'index'])->name('homeRH');
Route::post('/ajouter-Personnel', [RhPersonnelControlleur::class,'ajouterPersonnel'])->name('ajouter-Personnel');
Route::get('/getDatapersonnel', [RhPersonnelControlleur::class, 'fetchPersonnel'])->name('getDatapersonnel');
Route::post('/delete-Personnel', [RhPersonnelControlleur::class, 'deletePersonne'])->name('delete-Personnel');

Route::post('/update-Personnel', [RhPersonnelControlleur::class, 'updatePersonne'])->name('update-Personnel');
Route::get('fetch-Personnel', [RhPersonnelControlleur::class, 'fetchPersonnel'])->name('getDataPersonnel');
Route::get('/Personnel', [RhPersonnelControlleur::class, 'index'])->name('listPersonnel');



Route::get('/f', [AjouteNoteController::class, 'fetchEtudiants'])->name('fetch.etudiant');
Route::get('et', [AjouteNoteController::class, 'index'])->name('get');
Route::get('//etudiants', [AjouteNoteController::class, 'getEtudiantsByCycle'])->name('etudiants');
Route::get('/etudiants-liste', [AjouteNoteController::class, 'getEtudiantsData'])->name('data');

Route::get('/liste-etudiants-presence', [ListePresenceController::class, 'getEtudiants'])->name('Listes');
Route::get('/Presence-etudiant', [ListePresenceController::class, 'getEtudiantsData'])->name('dataetudiant');

Route::post('/miseajour', [AjouteNoteController::class, 'update'])->name('profupdate');


Route::post('/update-absence', [ListePresenceController::class, 'updateAbsence'])->name('updateAbsence');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
