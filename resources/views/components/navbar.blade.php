<nav id="mainnavbar" class="navbar nav-custom navbar-expand-lg navbar-expand-md fixed-top ">
  
  <div class="container-fluid">
    
    <a class="navbar-logo" href="/">
      <img class="navbar-logo" src="\img\masthead-background.jpg" alt="">
    </a>
    
    <a class="navbar-brand" href="/">
      Presto.it
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      
      <span class="navbar-toggler-icon"></span>
      
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{ route('welcome') }}">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{route ('announcement.index') }}">{{ __('ui.nav-annunci') }}</a>
        </li>
        
        
        <li class="nav-item dropdown ">
          <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('ui.nav-category') }}
          </a>
          
          <ul class="dropdown-menu dropdown-bg" aria-labelledby="categoriesDropdown">
            
            @foreach ($categories as $category)
            
            <li><a class="dropdown-item " href="{{ route('categoryShow', compact('category')) }}">{{ ($category->name) }}</a></li>
            <li><hr class="dropdown-divider"></li>                  
            @endforeach
            
          </ul>
          
        </li>
        
        
        
        @guest
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('ui.nav-register') }}</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        
        @else
        
        @if(Auth::user()->is_revisor)
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{ route('revisor.index') }}">{{ __('ui.nav-revisor') }}
            <span class="top-0 start-100 traslate-middle badge rounded-pill bg-danger">
              {{ App\Models\Announcement::toBeRevisionedCount()}}
              <span class="visually-hidden">unread messages</span>
            </span>
            
            
          </a>
        </li>
        @endif
        
        <li class="nav-item dropdown ">
          
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          
          <ul class="dropdown-menu dropdown-bg">
            
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('announcement.create') }}">{{ __('ui.newAnnouncement') }}</a>
            </li>
            
            
            <li><hr class="dropdown-divider"></li>
            
            <li><a class="dropdown-item" href="/logout" onclick="event.preventDefault();getElementById('form-logout').submit()">Logout</a></li>
            
            <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">@csrf</form>
            
          </ul>
          
        </li>
        
        
        
        @endguest
        
        
        
      </ul>
      
      
      
      
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="GET" action="{{ route('announcement.search') }}" role="search">
        <div class="input-group">
          <input class="form-control" type="search" name="searched" placeholder="{{ __('ui.nav-placeHolder') }}" aria-label="Search for..." aria-describedby="btnNavbarSearch">
          <button class="btn btn-primary" id="btnNavbarSearch"  type="submit" ><x-fas-search class="icon" /></button>
        </div>
      </form>
      
    </div>
    
  </nav>