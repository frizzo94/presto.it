<x-layout>
    <div class="container d-flex justify-content-center position-absolute top-50 start-50 translate-middle">
        <div class="row p-3 mh-100rounded border bg-white shadow-lg border-light">
            <div class="col-12 ">
                <h1 class="text-center">Login</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="{{ __('ui.register-email') }}" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="{{ __('ui.password') }}" >
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">{{ __('ui.ricordami') }}</label>
                    </div>
                    <button type="submit" class="btn  btn-primary">Login</button>
                    
                </form>
            </div>
        </div>
    </div>
</x-layout>                