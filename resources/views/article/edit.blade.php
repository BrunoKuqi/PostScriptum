<x-layout>
    <x-navbar />
    <x-masthead-dashboard />
    <header class="header py-3">
        <div class="container-fluid p-3 title-font text-center text-dark border-bottom shadow-sm border-2">
            <div class="row justify-content-center align-content-center h-100">
                <div class="col-12 col-md-6 d-flex justify-content-center ">
                    <h1 class="text-center title-font">Modifica Articolo</h1>

                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row mt-5 justify-content-center my-5">

            <div class="col-12 col-md-6 justify-content-center ">
                <form class="rounded-4 shadow-lg p-3" action="{{ route('article.update', $article) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT') {{-- Stiamo sovrascrivendo il metodo originale che era POST. --}}
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label title-font tx-1">Titolo articolo</label>
                        <input name="title" type="text" value="{{ $article->title }}" class="form-control title-font"
                            id="title">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label title-font tx-1">Sottotitolo dell'articolo</label>
                        <input name="subtitle" type="text" value="{{ $article->subtitle }}" class="form-control title-font"
                            id="subtitle">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label title-font tx-1">Categoria</label>
                        <select name="category" id="category" class="form-controll text-capitalize title-font rounded-2 tx-2">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label title-font">Tags</label>
                        <input type="text" name="tags" class="form-control title-font" id="tags"
                            value="{{ $article->tags->implode('name', ',') }}">
                        <span class="small text-muted fst-italic title-font "> Dividi ogni tag con una virgola</span>
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label title-font tx-1">Corpo dell'articolo</label>
                        <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{ $article->body }}</textarea>
                    </div>
                    <div class="mb-3 ">
                        <span class="form-label title-font tx-1">Immagine attuale:</span>
                        <img src="{{ Storage::url($article->img) }}" alt="{{ $article->title }}" width="40%"
                            height="40%">
                    </div>
                    <div class="mb-3 ">
                        <label for="img" class="form-label title-font tx-1">Nuova immagine</label>
                        <input name="img" type="file" class="form-control d-flex me-3 title-font" id="img">
                    </div>
                    <button type="submit" class="btn btn-primary title-font">Modifica articolo</button>
                </form>
            </div>
        </div>
    </div>


</x-layout>
