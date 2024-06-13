<x-layout>
<x-navbar/>
<x-masthead-dashboard/>

    <div class="container-fluid py-3 title-font text-center border-bottom shadow-sm border-2  ">
        <div class="row justify-content-center">
            <h1 class="title-font tx-1 text-capitalize">
                Bentornato Revisore {{Auth::user()->name}}
            </h1>
        </div>
    </div>

    <x-succes/>

    <div class="container mt-3 -b5">
        <div class="row justify-content-center">
            <div class="col-12 title-font tx-1">
                <h2>Articoli da revisionare</h2>
                <x-articles-table :articles="$unrevisionedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 title-font tx-1">
                <h2> Articoli pubblicati </h2>
                <x-articles-table :articles="$acceptedArticles"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 title-font tx-1">
                <h2>Articoli respinti</h2>
                <x-articles-table :articles="$rejectedArticles"/>
            </div>
        </div>
    </div>

</x-layout>