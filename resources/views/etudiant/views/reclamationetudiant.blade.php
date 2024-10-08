<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
      
#reclamation {
    margin: 80px auto 50px;
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    max-width: 800px; 
    width: 100%;
   
    margin-left: auto; 
    margin-right: auto; 
}

@media (max-width: 320px) {
    #reclamation {
        padding: 20px; 
    }
}

@media (min-width: 375px) {
    #reclamation {
        max-width: 90%; /* Réduire la largeur maximale pour les petits écrans */
    }
}

@media (min-width: 425px) {
    #reclamation {
        max-width: 95%; /* Réduire la largeur maximale pour les petits écrans */
    }
}

@media (min-width: 768px) {
    #reclamation {
        max-width: 600px; /* Ajuster la largeur maximale pour les écrans de taille moyenne */
    }
}




        @media (width: 1440px) {

            #reclamation {
                max-width: 70%;
                margin-left: 1px;
            }

            /* Adjust input width */
            .form-control {
                width: 100%;
            }
        }
        @media (min-width: 1920px) {
    #reclamation {
     max-width: 1200px; 
    
     margin-left:20px;
   
     
    }
  img{
    width: 150px;
  }
   
    
}
@media (min-width: 1024) {
    #reclamation {
     max-width: 1000px; 
    
     margin-left:100px;
   
     
    }
  img{
    width: 150px;
  }
   
    
}
        /* Style pour les titres */
        h6 {
            color: #173165;
            margin-bottom: 10px;
        }

        /* Style pour les inputs */
        .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 5px;
            margin-bottom: 20px;
        }

        /* Style pour le bouton "Enregistrer" */
        .button-enregistrer {
            width: 100%;
            padding: 10px;
            background-color: #1858b1;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Style pour le bouton "Enregistrer" au survol */
        .button-enregistrer:hover {
            background-color: #0d3d82;
        }

        /* Style pour le bouton "Télécharger un fichier" */
        .file-input {
            display: none;
        }

        .file-upload-btn {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 6px;
            border-radius: 5px;
            cursor: pointer;
        }

      
        .camera-icon {
            margin-right: 5px;
        }
        @media (width: 2560px) {
            #reclamation{
     max-width: 1700px; 
     height: 800px;
     margin-left:-80px;
     margin-top: 120px;
      /* Rétablir la largeur maximale pour les écrans plus grands */
    }
    .button-enregistrer{
        margin-top: 40px;
    }
    form{
        margin-top: 10px;
        margin: 20px;
        padding: 30px;
    }
    
}

    </style>

    <div id="reclamation" class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
       <ul>
         @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    </ul>
        <form action="{{route('enreclamation') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            
            <input type="hidden" id="gh" name="apogee" value="{{ $user->apogee ?? '' }}">
<input type="hidden" id="id" name="intitule" value="{{ $inscription->filiere_intitule ?? '' }}">

            <div class="row">
                <div class="col-md-6">
                    <h6>Nom</h6>
                    <input class="form-control" type="text" placeholder="Votre nom" name="Nom" id="" value="{{ $user->Nom ?? '' }}" readonly>
                </div>
              
                <div class="col-md-6">
                    <h6>Prénom</h6>
                    <input class="form-control" type="text" placeholder="Votre prénom" name="Prenom" id="" value="{{ $user->Prenom ?? '' }}" readonly>
                </div>  </div>
                <div class="row">
                    <div class="col-md-6">
                        <h6>Votre numéro de téléphone</h6>
                        <input class="form-control" type="text" name="Numero" id="" value="{{ $user->telephone ?? '' }}" placeholder="Téléphone"  required>
                    </div>
                    <div class="col-md-6">
                        <h6>Votre Email</h6>
                        <input class="form-control" type="email" name="Email" id="" placeholder="Email" value="{{ $user->Email ?? '' }}" required>
                    </div> </div>
            <div class="row">
                <div class="col-md-12">
                    <h6>Type de réclamation :</h6>
                    <select class="form-control" name="Type" required>
                        
                        <option value="internat">Réclamation d'internat</option>
                        <option value="suptech">Réclamation  Suptech</option>
                        <option value="transport">Réclamation  Transport</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <h6>Description :</h6>
                  
                    <textarea class="form-control" rows="5" name="Description"></textarea>

                </div>
            </div>
            
           
           
            <div class="row">
                <div class="col-md-12">
                    <h6>Sélectionner un fichier :</h6>
                    
                    <label for="file-reclamation" class="file-upload-btn btn btn-outline-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor"
                            class="bi bi-camera-fill camera-icon" viewBox="0 0 16 16">
                            <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path
                                d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" />
                        </svg>
                        <input type="file" id="file-reclamation" name="file_reclamation" class="file-input">
                        Sélectionner un fichier
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn button-enregistrer">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
@endsection