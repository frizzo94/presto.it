<x-layout>
  <div class="container-fluid  h-25 d-inline-block bg-custom shadow mb-4">
    <div class="row">
      <div class="col-12 text-light  p-5">
        <h1 class="display-2 text-center">
          {{ __('ui.indiceDegliAnnunci') }}  
        </h1>
      </div>
    </div>
  </div>
  
  
  


<div class="container">
  <div class="row">
    <div class="col-12">
      <h2>{{ __('ui.nav-annunci') }}</h2>
    </div>
  </div>
  <div class="row rounded border border-5 shadow-lg border-light">
    <div class="col-12 table-responsive-sm">
      <table class="table table-white align-middle table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">{{ __('ui.titolo') }}</th>
            <th scope="col">{{ __('ui.autore') }}</th>
            <th scope="col">Status</th>
            <th scope="col">{{ __('ui.azioni') }}</th>
          </tr>
        </thead>
        <tbody>
          @foreach($announcements as $announcement)
          <tr>
            <th scope="row">{{ $announcement->id }}</th>
            <td>{{ $announcement->title }}</td>
            <td>{{ $announcement->user->name }}</td>
            @if($announcement == 'null')
            <td>{{ __('ui.rifiutato') }}</td>
            @else
            
            <td>{{ $announcement->is_accepted ? 'Pubblicato' : 'Da revisionare' }}</td>
            @endif
            <td>
              @if($announcement->is_accepted)
              <form action="{{ route('revisor.changeStatus' , ['announcement' => $announcement, 'value' => 'null']) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success shadow" >{{ __('ui.mandaInRevisione') }}</button>
              </form>
              @else 
              <a href="{{ route('revisor.show', $announcement) }}" class="btn btn-danger">{{ __('ui.revisiona') }}</a>
              @endif
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>

</x-layout>