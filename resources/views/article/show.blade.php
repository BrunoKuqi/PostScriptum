<x-layout>
    <x-navbar />
    <x-slide :imageUrl="$imageUrl"/>
    {{-- articolo --}}
    <div class="container  pb-4 shadow-lg ">
        {{-- header articolo con Titolo e Sottotitolo --}}
        <div class="row stile-underline pb-2  pt-3">
            <div class="col-12  d-flex justify-content-center text-center">
                <h1 class="title-font tx-1"> {{ $article->title }} </h1>
            </div>
            <div class="col-12  d-flex justify-content-center text-center">
                <h3 class="title-font tx-2"> {{ $article->subtitle }}</h3>
            </div>
        </div>
        {{-- body articolo con sezione immagine e sezione di testo --}}
        <div class="row py-4 ">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center mx-auto">
                <img src="{{ Storage::url($article->img) }}" class="card-img-top img-card-detail" alt="...">
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <p class="body-font tx-1 space">{{ $article->body }}</p>
            </div>
        </div>
        {{-- footer articolo con Categoria, tag, Redattore e data di redazione --}}
        <div class="row pt-4 d-flex align-items-center">
            <div class="col-12 col-md-3 d-flex justify-content-center ">
                <p class=" title-font tx-2">
                    @if (isset($article->category))
                        <a href="{{ route('categories', ['category' => $article->category->id]) }}"
                            class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                    @else
                        <span class="small text-muted fst-italic text-capitalize">Nessuna Categoria</span>
                    @endif
                </p>
            </div>
            <div class="col-12 col-md-3 d-flex justify-content-center ">
                <p class=" title-font tx-2">
                    @foreach ($article->tags as $tag)
                        #{{ $tag->name }}
                    @endforeach
                </p>
            </div>
            <div class="col-12 col-md-3 d-flex justify-content-center ">
                <p class=" title-font tx-2">
                    Redatto da <a href="{{ route('users', ['user' => $article->user->id]) }}"
                        class="small text-muted fst-italic text-capitalize">{{ $article->user->name }}</a>
                </p>
            </div>
            <div class="col-12 col-md-3 d-flex justify-content-center ">
                <p class=" title-font tx-2">
                    Redatto il {{ $article->created_at->format('d/m/Y') }}
                </p>
            </div>
        </div>
        {{-- sezione dettaglio visibile solamente al revisore --}}
        @auth
            @if (Auth::user()->is_revisor && $article->is_accepted === null)
                <div class="row title-font">
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <a href="{{ route('revisor.acceptArticle', compact('article')) }}"
                            class="btn btn-outline-success tx-1">Accetta articolo</a>

                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center">
                        <a href="{{ route('revisor.rejectArticle', compact('article')) }}"
                            class="btn btn-outline-danger tx-1">Rifiuta articolo</a>
                    </div>
                </div>
            @endif
        @endauth
    </div>



    {{-- visualizzazione card show --}}
    {{-- <div class="card dark p-2 rounded-0 shadow-lg ">
        <img src="{{ Storage::url($article->img) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <div class="text-section">
                <h5 class="title-font tx-1">{{ $article->title }}</h5>
                <p class="card-text body-font tx-2">{{ $article->subtitle }}</p>

                <p class="body-font tx-1"> {{ $article->body }}</p>
                <p class="body-font tx-1">Categoria:
                    @if (isset($article->category))
                        <a href="{{ route('categories', ['category' => $article->category->id]) }}"
                            class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                    @else
                        <span class="small text-muted fst-italic text-capitalize">Nessuna Categoria</span>
                    @endif
                </p>
                <p class="small  my-0">Tag:
                    @foreach ($article->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                </p>
                <div>
                    Redatto da <a href="{{ route('users', ['user' => $article->user->id]) }}"
                        class="small text-muted fst-italic text-capitalize">{{ $article->user->name }}</a>
                </div>
                <div>
                    data: {{ $article->created_at->format('d/m/Y') }}
                </div>
            </div>
            <div class="cta-section">

                @auth
                    <div>
                        @if (Auth::user()->is_revisor && $article->is_accepted === null)
                            <ul class="title-font">
                                <li class="my-5">

                                    <a href="{{ route('revisor.acceptArticle', compact('article')) }}"
                                        class="btn btn-success text-white">Accetta articolo</a>
                                </li>
                                <li class="my-5">
                                    <a href="{{ route('revisor.rejectArticle', compact('article')) }}"
                                        class="btn btn-danger text-white">Rifiuta articolo</a>

                                </li>
                        @endif

                        </ul>



                    </div>
                @endauth

            </div>
        </div>

    </div> --}}




    </div>





</x-layout>
