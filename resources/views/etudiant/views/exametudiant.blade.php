<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('etudiant.layouts.navbaretudiant')
  
  @section('contenu')

  <style>
 
@media  (width: 1024px) {
    .card {
      margin-right:50px; /* Hide the sidebar by default on smaller screens */
    }
}
@media  (min-width: 1025px) and  (max-width:1444 px) {
    .card {
      margin-left:0px; /* Hide the sidebar by default on smaller screens */
    }
}
@media (min-width: 768px) {
        .container {
          margin-left: 214px; /* Set max-width to match iPad Air width */
        }
    }
 .card {
      margin-top:80px;
   width:auto;
      background-color: #f8f9fa;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    
    .card:hover {
      transform: translateY(-5px);
    }
    
    .card-title {
      color: #3966c2;
    }
    
    .card-subtitle {
      font-size: 14px;
    }
    
    .card-text {
      color: #6c757d;}
      @media (width: 2560px) {
        .card{
     width: 1900px; 
     height: 200px;
     margin-left:-450px;
     margin-top: 120px;
      /* Rétablir la largeur maximale pour les écrans plus grands */
    }}
    @media (min-width: 1920px) {
        .card{
     width: 1400px; 
     height: 230px;
     margin-left:-450px;
     margin-top: 120px;
      /* Rétablir la largeur maximale pour les écrans plus grands */
    }
  p{
    font-size:18px;
  }
}
    p{
      font-size:15px;
    }
    .card-subtitle{
      font-size:20px;
    }
    


    
    </style>
    

  <div class="container">
  <div class="card" id="myCard">
    <div class="card-body">
      @foreach($exams as $exam)
      <h4 class="card-title">{{ $exam->element->intitule }}</h4>
            <h5 class="card-subtitle mb-2 text-muted"><strong> Date:</strong>  {{ $exam->date_exam }}</h5>
            <h5 class="card-subtitle mb-2 text-muted"><strong> Heure:</strong> {{ $exam->heure_exam }}</h5>
            <p class="card-text">Chers étudiants, un rappel : un examen est prévu à la date et à l'heure indiquées. Assurez-vous d'être présents et prêts à temps. Bonne chance à tous !</p>
            @endforeach
    </div>
  </div>
</div>

  
  

<script>
const card = document.getElementById('myCard');

card.addEventListener('mouseenter', function() {
  this.style.transform = 'translateY(-5px)';
});

card.addEventListener('mouseleave', function() {
  this.style.transform = 'translateY(0)';
});

</script>

  @endsection