<x-layout>
    <x-navbar/>
    <x-masthead-dashboard/>
    <div class="container-fluid py-3 title-font text-center border-bottom shadow-sm border-2">
        <div cLass="row justify-content-center">
            <h1 class="title-font tx-1">
                Bentornato Admin {{Auth::user()->name}}
            </h1>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 title-font tx-1">
                <h2>Richieste per ruolo amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 title-font tx-1">
                <h2> Richieste per ruolo revisore </h2>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 title-font tx-1">
                <h2>Richieste per ruolo redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="redattore" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 title-font tx-1">
                <h2>Tutti i tags</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags" />
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class=" col-12  title-font tx-1 ">
                 <h2>Tutte le categorie</h2>
                 <form action="{{ route('admin.storeCategory') }}" method="POST" class="w-50 d-flex m-3">
                     @csrf
                     <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                     <button type="submit" class="btn btn-outline-secondary">Inserisci</button>
                 </form>
             </div>
        </div>
    </div>
    <div class="container">
        <row class="justify-content-center">
            <div class="col-12 title-font tx-1">
                <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
            </div>

        </row>
    </div>

</x-layout>
