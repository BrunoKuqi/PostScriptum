<x-layout>
    <x-navbar />
    <x-slide :imageUrl="$imageUrl" />
    <div class="container-fluid py-3 title-font text-center text-dark  border-2  ">
        <div class="row justify-content-center">
            <h1 class="title-font tx-1 text-capitalize ">
                {{ $category->name }}
            </h1>
        </div>
    </div>

    <div class="container shadow-lg ">
        <div class="row justify-content-between ">
            @foreach ($articles as $article)
                <div class="col-12 col-md-6">

                    {{-- articles è la nostra key passata nel compact indicata nel ArticleController nella funzione --}}
                    <x-article-card :article="$article" />
                </div>
            @endforeach

        </div>
    </div>

    </div>


    </div>

    {{-- articles è la nostra key passata nel compact indicata nel ArticleController nella funzione --}}
</x-layout>
