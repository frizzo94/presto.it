<x-layout>
    <div class="container-fluid p-5 bg-custom shadow mb-4">

        <div class="row">

            <div class="col-12  text-light">
                <h2 class=" text-center ">Esplora la categoria {{ $category->name }}</h2>
            </div>

        </div>

    </div>

    <div class="container">

        <div class="row">
      
            <div class="col-12 ">

                <div class="row ">

                    @forelse ($category->announcements as $announcement)
                        
                        <div class="col-12 col-md-4 my-2 d-flex justify-content-center">

                            <div>

                                <div class="container">
    
                                    <div class="card">
    
                                      <div class="imgBx">
                                        <img src="https://picsum.photos/300/400">
                                      </div>
    

                                      <div class="contentBx">
                                            <h3>{{ $announcement->title }}</h3>
                                            <div class="size">{{ $announcement->body }}</div>

                                                    <a href="{{ route('announcement.show',$announcement) }}" class="btn btn-primary shadow">Visualizza</a>
                                                <p class="card-footer my-2">Pubblicato il  {{ $announcement->created_at->format('d/m/Y') }} - Autore {{ $announcement->user->name ?? '' }}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          @empty
                                        <div class="col-12">

                                                <p class="h1">Non sono presenti annunci per questa categoria</p>
                                                <p class="h2">Pubblicane uno <a href="{{ route('announcement.create') }}" class="btn btn-primary shadow">Nuovo Annuncio</a></p>

                                        </div>
                    @endforelse
 
                </div>
            </div>
        </div>
    </div>
</x-layout>