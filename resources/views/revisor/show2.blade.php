<x-layout>
  <div class="container-fluid p-5  bg-custom shadow mb-4">
        
    <div class="row">

        <div class="col-12 text-light p-5">
            <h1 class="display-2">Annuncio da revisionare</h1>
        </div>

    </div>

</div>

<div class="container">
    
  <div class="row">
    
    <div class="col-12-md-6">
      
      <div id="showCarousel" class="carousel slide" data-bs-ride="carousel">
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
            <img src="https://picsum.photos/id/238/200/300" class="img-fluid p-3 rounded" alt="...">
          </div>
          
          
          <div class="carousel-item">
            <img src="https://picsum.photos/id/239/200/300" class="img-fluid p-3 rounded" alt="...">
          </div>
          
          
          <div class="carousel-item">
            <img src="https://picsum.photos/id/239/200/300" class="img-fluid p-3 rounded" alt="...">
          </div>
        </div>
      </div>
      @endif



                    <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">

                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>

                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">

                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>

                    </button>

    </div> 
                  
                  <div class="col-md-3 border-end">
                    <h5 class="tc-accent mt-3">
                      Tags
                    </h5>
          
                    <div class="p-2">
                      @if($image->labels != null)
                      @foreach($image->labels as $label)
                          <p class="d-inline">{{ $label }},</p>
                      @endforeach
                      @endif
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="card-body">
                      <h5 class="tc-accent">Revisione immagini</h5>
                      <p>Adulti: <span class="{{ $image->adult }}"></span></p>
                      <p>Satira: <span class="{{ $image->spoof }}"></span></p>
                      <p>Medicina: <span class="{{ $image->medical }}"></span></p>
                      <p>Violenza: <span class="{{ $image->violence }}"></span></p>
                      <p>Contenuto ammiccante: <span class="{{ $image->racy }}"></span></p>
          
                    </div>
                  </div>

                <h5 class="card-title">Titolo  {{ $announcement->title }}</h5>
                <p class="card-text"><h3>Descrizione</h3>  {{ $announcement->body }}</p>
                <p class="card-text">Prezzo € {{ $announcement->price }}</p>

                <a href="{{ route('categoryShow', ['category'=>$announcement->category]) }}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-primary">Categoria {{ $announcement->category->name }}</a>
                <p class="card-footer">Pubblicato il  {{ $announcement->created_at->format('d/m/Y') }} - Autore {{ $announcement->user->name ?? '' }}</p>

  </div>

       

        

        <div class="row my-5">

          <div class="col-12 col-md-6 d-flex">

                <form action="{{ route('revisor.changeStatus' , ['announcement' => $announcement, 'value' => true]) }}" method="POST">
                  @csrf
                  @method('PATCH')
                      <button type="submit" class="btn btn-success shadow" >Accetta</button>
                </form>


              <form class="mx-3" action="{{ route('revisor.changeStatus' , ['announcement' => $announcement, 'value' => 'false']) }}" method="POST">
                @csrf
                @method('PATCH')
                    <button type="submit" class="btn btn-danger shadow" >Rifiuta</button>
              </form>

          </div>
            
        </div>
</div>

</x-layout>