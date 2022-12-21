<footer class="text-center text-white" style="background-color: #0a4275;">
  <div class="container p-4 pb-0">
    <section class="">
      <p class="d-flex justify-content-center align-items-center">
        <span class="me-3">{{ __('ui.footer-revisor') }}</span>
        <a href="{{ route('become.revisor') }}" class="btn btn-warning text-dark shadow my-3">{{ __('ui.here') }}</a>
      </button>
    </p>
    
  </section>
  
</div>
<div class="text-center p-3 d-flex justify-content-around" style="background-color: rgba(0, 0, 0, 0.2);">
  <a class="text-white" href="#">Copyright: Presto.it</a>
  <div class="dropdown">
    Language:
      <a class="btn bottom me-3 btn-primary btn-sm"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <x-fas-language class="iconlang"/>
      </a>
      
      <ul class="dropdown-menu">

        <li class="">
          
          <x-_locale lang='it' nation='it'/>
          
        </li>
        <li>
          
          <x-_locale lang='en' nation='gb'/>
          
        </li>
        <li>
          
          <x-_locale lang='es' nation='es'/>
          
        </li>
      </ul>
    </div>
</div>

</footer>
