<x-layout>
    <x-navbar/>
    <x-masthead-dashboard/>
    <div class="container-fluid">
        <div class="row justify-content-center p-5">
            <div class="col-12 col-md-5 border border-2 shadow-lg rounded-0 p-4 mt-5">

                <x-error />
                <form method="POST" action="{{ route('register') }}">
                    @csrf <!-- Token CSRF -->


                    <div class="mb-3 title-font ">
                        <label for="name">Nome *</label>
                        <input class="form-control " id="name" type="text" name="name"
                            value="{{ old('name') }}" required autofocus>
                    </div>
                    <div class="mb-3 title-font ">
                        <label for="email">Email *</label>
                        <input class="form-control " id="email" type="email" name="email"
                            value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3 title-font ">
                        <label for="password">Password * </label>
                        <input class="form-control " id="password" type="password" name="password" required
                            autocomplete="new-password">
                    </div>
                    <div class="mb-3 title-font">
                        <label for="password_confirmation">Conferma Password *</label>
                        <input class="form-control " id="password_confirmation" type="password"
                            name="password_confirmation" required>
                    </div>
                    <span class="title-font tx-2"> *: Campi obbligatori </span>
                    <div class="row">

                    </div>
                    <button class="btn bg-info text-white title-font mt-5">Registrati</button>
                    <p class="mt-2 title-font">Sei già registrato?<a class="lnk" href="{{ route('login') }}"> Clicca
                            qui!</a>
                    </p>


                </form>
            </div>
        </div>
    </div>
    </div>
</x-layout>
