<x-layout>
    <div class="containerd-flex justify-content-center position-absolute top-50 start-50 translate-middle">
        <div class="row bg-white mb-2 mh-100 mt-3  py-2 rounded border  shadow-lg border-light">
            <div class="col-12 text-center">
                <h1>{{ __('ui.nav-register') }}</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" placeholder="{{ __('ui.register-name') }}" >
                    </div>
                    <div class="mb-3">    
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="{{ __('ui.register-email') }}" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <input type="password" name="password" class="form-control" placeholder="{{ __('ui.register-password') }}">
                    </div>
                    <div class="mb-2">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('ui.password-confirm') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('ui.nav-register') }}</button>
                    
                </form>
            </div>
        </div>
    </div>
</x-layout>