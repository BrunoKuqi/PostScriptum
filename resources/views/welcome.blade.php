<x-layout>
    <x-navbar/>
    <x-masthead/>
    <x-succes />

    <div class="container-fluid p-3 title-font text-center text-dark">
        <div class="row justify-content-center">
            <h1 class="text-capitalize">
                Ultimi Articoli
            </h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">

            </div>
        </div>
    </div>
    <div class="container shadow-lg ">
        <div class="row justify-content-between ">
            @foreach ($articles as $article)
                <div class="col-12 col-md-6">

                    {{-- articles è la nostra key passata nel compact indicata nel ArticleController nella funzione --}}
                    <x-article-card-welcome :article="$article" />
                </div>
            @endforeach

        </div>
    </div>




</x-layout>
