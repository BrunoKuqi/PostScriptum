{{-- <div class="card dark rounded-0">
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        NEW!
    </span>
    <img src="{{ Storage::url($article->img) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <div class="text-section">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="card-text">{{ $article->subtitle }}</p> --}}

            {{-- <p class="card-text">Descrizione: {{ $article->body }}</p> --}}
            {{-- @if ($article->category)
                <p class="small text-muted">Categoria: <a
                        href="{{ route('categories', ['category' => $article->category->id]) }}"
                        class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                </p>
            @else
                <p class="small text-muted">Nessuna Categoria</p>
            @endif
            <p class="my-0 small text-muted">Tag:
                @foreach ($article->tags as $tag)
                    {{ $tag->name }}
                @endforeach
            </p>
            <p class="card-subtitle text-muted fst-italic small">Tempo Di Lettura {{ $article->readDuration() }} minuti
            </p>
        </div>
        <div class="cta-section">
            <div>
                <div>
                    Redatto da <a href="{{ route('users', ['user' => $article->user->id]) }}"
                        class="small text-muted fst-italic text-capitalize">{{ $article->user->name }}</a>
                </div>
                <div>
                    data: {{ $article->created_at->format('d/m/Y') }}
                </div>
            </div>
            <div>
                <a href="{{ route('show', compact('article')) }}"
                    class="btn btn-info bg-A text-white  title-font">Leggi</a>
            </div>
        </div>
    </div>
</div> --}}


{{-- nuova card --}}
<div class="container shadow-lg m-auto p-auto mb-2 mt-2 stile-underline">
    <div class="row">
        <div class="col-12 col-md-6 d-flex justify-content-center align-items-center mx-auto p-2">
            <img src="{{ Storage::url($article->img) }}" class="card-img-top img-card" alt="...">
        </div>
        {{-- sezione testo card --}}
        <div class="col-12 col-md-6 title-font py-1">
            <div class="row">
                <div class="col-12">
                    <h4 class="tx-1">{{ $article->title }}</h3>
                </div>
                <div class="col-12">
                    <h5 class="tx-2"> {{ $article->subtitle }}</h5>
                </div>
                <div class="col-12">
                    <h6> <a href="{{ route('users', ['user' => $article->user->id]) }}"
                            class="small text-muted fst-italic text-capitalize tx-3">{{ $article->user->name }}</a></h6>
                </div>
                <div class="col-12">
                    <h6 class="tx-2"> Redatto il {{ $article->created_at->format('d/m/Y') }}</h6>
                </div>
                <div class="col-12">
                    <h6 class="tx-2"> {{ $article->readDuration() }} minuti</h6>
                </div>
                <div class="col-12">
                    <h6>
                        @if ($article->category)
                            <a class="tx-3" href="{{ route('categories', ['category' => $article->category->id]) }}"
                                class="small text-muted fst-italic text-capitalize tx-3">{{ $article->category->name }}</a>
                        @else
                            <p class="small text-muted tx-3">Nessuna Categoria</p>
                        @endif
                    </h6>
                </div>
                <div class="col-12">
                    <p class="tx-2">
                        @foreach ($article->tags as $tag)
                             #{{ $tag->name }}
                        @endforeach
                    </p>
                </div>
                <div class="col-12 d-flex justify-content-end pb-1">
                    <a href="{{ route('show', compact('article')) }}"
                class="btn btn-outline-info title-font tx-3">Leggi</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row d-flex justify-content-center ">
        <div class="col-12 col-md-6 d-flex justify-content-center py-2">
           <p class="small fst-italic "> "Didascalia Immagine"</p>
        </div>
        <div class="col-12 col-md-6 d-flex justify-content-end py-2">
            <a href="{{ route('show', compact('article')) }}"
                class="btn text-sm btn-info bg-A text-white  title-font">Leggi</a>
        </div>
    </div> --}}
</div>
