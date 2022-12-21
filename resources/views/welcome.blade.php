<x-layout >
    <x-masthead></x-masthead>
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-12 text-center">
                
                <p class="h2 my-5 fw-bold ">{{ __('ui.allAnnouncements') }}</p>
                
                <div class="row justify-content-center align-item-center ">
                    
                    
                    @foreach ($announcements as $announcement)
                    
                    <div class=" d-flex justify-content center colonna col-12 col-md-4 px-0 col-sm-6 my-4  ">
                        <div>
                            
                            <div class="container ">
                                
                                <div class="card">
                                    
                                    <div class="imgBx">
                                        <img src="{{ ! $announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/id/238/300/400' }}">
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
                    @endforeach
                </div>
                
            </div>
            
        </div>
        
    </div>   
    
    
    
    
    
    
    
    
    
</x-layout>