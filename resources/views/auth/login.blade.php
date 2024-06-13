<x-layout>
    <x-navbar/>
    <x-masthead-dashboard/>
    
    <div class="container-fluid">
        <div class="row justify-content-center p-5">
            <div class="col-12 col-md-5 border shadow-lg rounded-2 p-4 title-font">
                <x-error/>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- Token CSRF -->
                
                <div class="mb-3 ">
                    <label for="email">Email</label>
                    <input class="form-control " id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3 ">
                    <label for="password">Password</label>
                    <input class="form-control " id="password" type="password" name="password" required autocomplete="new-password">
                </div>
                <div>
                    <button class="btn bg-info text-white">Login</button>
                    <p class="mt-2">Non sei già registrato?<a class="lnk txt-2" href="{{route('register')}}"> Clicca qui!</a></p>
                
                </div>
                    
                
            </form>
            </div>
        </div>
    </div>
</x-layout>
