<x-layout>
    <div class="container-fluid p-4 mt-2 bg-custom shadow mb-4">
        
        <div class="row">
            
            <div class="col-12 text-light p-5">
                <h1 class="dispaly-2 text-center">{{ __('ui.tuttiGliAnnunci') }}</h1>
            </div> 
        </div>  
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($announcements as $announcement)
                    <div class="col-12 col-md-4 my-4">
                        
                        <div>
                            
                            <div class="container d-flex justify-content-center">
                                
                                <div class="card">
                                    
                                    <div class="imgBx">
                                        <img src="{{ ! $announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/id/200/300' }}">
                                    </div>
                                    
                                    <div class="contentBx">
                                        <h3>{{ $announcement->title }}</h3>
                                        
                                        <div class="size">
                                            
                                            <h3>{{ $announcement->body }}</h3>
                                            
                                        </div>
                                        
                                        <div class="color">
                                            <h3> € {{ $announcement->price }}</h3>
                                            
                                        </div>
                                        
                                        <a href="{{ route('announcement.show',compact('announcement') )}}" class="btn btn-primary shadow">{{ __('ui.visualizza') }}</a>
                                        
                                        <a href="{{ route('categoryShow',['category'=>$announcement->category] )}}" class="card-link shadow btn btn-seconday"> {{ $announcement->category->name }}</a>
                                        <p class="card-footer ">{{ __('ui.pubblicato-il') }} : {{ $announcement->created_at->format('d/m/Y') }} - {{ __('ui.autore') }}: {{ $announcement->user->name ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning py-3 shadow">
                            <p class="lead">Non ci sono annunci per questa ricerca. </p>
                        </div>
                    </div>
                    @endforelse
                    {{$announcements->links()}}     
                </div> 
            </div>
        </div>
    </div>
</x-layout>