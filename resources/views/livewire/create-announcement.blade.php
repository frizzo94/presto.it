<div class="Container  d-flex justify-content-center ">
  <div class="row mt-5 mb-3  p-5 rounded border  shadow-lg border-light">
    <div class="col-12 text-center ">
      <h2>{{ __('ui.creaIlTuoAnnuncio') }}</h2>
      
      @if (session()->has('message'))
      <div class="flex flex-row justify-start my-2 alert alert-success">
        {{ session('message') }}
      </div>
      @endif
      
      
      <form wire:submit.prevent="store">
        @csrf
        
        <div class="mb-3">
          <input  wire:model="title" type="text" class="form-control" placeholder="{{ __('ui.inserisciIlTitolo') }}">
          @error('title') <span class="text-danger error">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
          <textarea wire:model="body" type="text" class="form-control" placeholder="{{ __('ui.descriviIlTuoArticolo') }} "></textarea>
          @error('body') <span class="text-danger error">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
          <input wire:model="price" type="number" class="form-control" placeholder="{{ __('ui.inserisciIlPrezzo') }}">
          @error('price') <span class=" text-danger error" >{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
          <select wire:model.defer="category" id="category" class="form-control">
            <option value="">{{ __('ui.scegliLaCategoria') }}</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>  
        </div>
        <div class="mb-3">
          <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="img"/>
          
          @error('temporary_images.*')
          <p class="text-danger mt-2">{{ $message }}</p>
          @enderror
          
          
          
        </div>
        @if(!empty($images))
        <div class="row">
          <div class="col-12">
            <p>Photo preview:</p>
            <div class="row border-4 border-info rounded shadow py-4">
              @foreach ($images as $key =>  $image)
              <div class="col my-3">
                
                <img src="{{ $image->temporaryUrl() }}" alt="" class=" w-25 ">
                
                <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{ $key }})">Cancella</button>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        @endif
        <button type="submit" class="btn btn-primary shadow">{{ __('ui.crea') }}</button>
        
        
        
        
        
        
      </form>
    </div>
  </div>
</div>
