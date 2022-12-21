<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  
    
    @livewireStyles

    {{-- CDN Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    
    
</head>
<body>
    
    <x-navbar/>
    
   

    
    <div class=" div-slot min-vh-100">
        
        @if (session()->has('message'))
        <div class="my-2 alert alert-success">
            {{ session('message') }}
        </div>
    @endif

        {{ $slot }}
        


    </div>
    
    <x-footer/>
   

    
    @livewireScripts

</body>
</html>