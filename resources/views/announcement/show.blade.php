<x-layout>
  <div class="container-fluid p-5  bg-custom shadow mb-4">
    
        <h2 class="text-center">{{ $announcement->title }}</h2>
    
  </div>
  
  <div class="container text-center my-5 ">
    
    <div class="row row-cols-2">
      
      <div class="col-12 col-md-6 ">
        
        <div id="showCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
          @if($announcement->images)
          <div class="carousel-inner">
            
            
            @foreach($announcement->images as $image)
            <div class="carousel-item @if($loop->first) active @endif">
              <img src="{{ $image->getUrl(400,300) }}" class="img-fluid p-3 rounded" alt="...">
            </div>
            @endforeach
          </div>  
          
          @else
          
          <div class="carousel-inner">
            
            <div class="carousel-item">
              <img src="https://picsum.photos/id/200/300" class="img-fluid p-3 rounded" alt="...">
            </div>
            
            
            <div class="carousel-item">
              <img src="https://picsum.photos/id/400/300" class="img-fluid p-3 rounded" alt="...">
            </div>
            
            
            <div class="carousel-item">
              <img src="https://picsum.photos/id/400/300" class="img-fluid p-3 rounded" alt="...">
            </div>
          </div>
        </div>
        @endif

        <button  class="carousel-control-prev " type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon " aria-hidden="true"><x-fas-arrow-circle-left class="freccetta" />
          </span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon " aria-hidden="true"><x-fas-arrow-circle-right class="freccetta" />
          </span>
          <span class="visually-hidden freccetta">Next</span>
        </button>
      </div>   
    </div> 
  

 
     
          <div class="col-12 col-md-6">

          <h3 class="card-title text-center">{{ $announcement->title }}</h3>
          <p class="card-text"><h2 class="text-center">Descrizione</h2> {{ $announcement->body }}</p>
          <p class="card-text ">Prezzo: € {{ $announcement->price }}</p>
          
          <a href="{{ route('categoryShow', ['category'=>$announcement->category]) }}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-primary">{{ $announcement->category->name }}</a>
          <p class="card-footer text-black-50">Pubblicato il  {{ $announcement->created_at->format('d/m/Y') }} - Autore {{ $announcement->user->name ?? '' }}</p>
        </div>
   
</div>



</x-layout>