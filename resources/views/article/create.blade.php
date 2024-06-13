<x-layout>
    <x-navbar/>
    <x-masthead-dashboard/>



    <header class="header py-3">
        <div class="container-fluid p-3 title-font text-center text-dark border-bottom shadow-sm border-2">
            <div class="row justify-content-center align-content-center h-100">
                <div class="col-12 col-md-6 d-flex justify-content-center ">
                    <h1 class="text-center title-font">Inserisci un nuovo articolo</h1>

                </div>
            </div>
        </div>
    </header>



    <x-error />
    <x-succes />

    <div class="container">
        <div class="row mt-5 justify-content-center my-5 ">
            <div class="col-12 col-md-6 justify-content-center ">
                <form class="rounded-2 shadow p-3 border bg-light-subtle rounded-2 p-2 shadow-lg border-2"
                    action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label title-font tx-1">Titolo articolo *</label>
                        <input name="title" type="text" value="{{ old('title') }}" class="form-control"
                            id="title">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label title-font tx-1">Sottotitolo dell'articolo *</label>
                        <input name="subtitle" type="text" value="{{ old('subtitle') }}" class="form-control"
                            id="subtitle">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label title-font tx-1">Categoria *</label>
                        <select name="category" id="category" class="form-controll title-font text-capitalize ">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label title-font tx-1">Tags *</label>
                        <input name="tags" type="text" value="{{ old('tags') }}" class="form-control"
                            id="tags">
                        <span class="small text-muted fst-italic">Dividi ogni tag con una virgola</span>
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label title-font tx-1">Corpo dell'articolo</label>
                        <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
                    </div>
                    <div class="mb-3 ">
                        <label for="img" class="form-label title-font tx-1">Inserisci immagine</label>
                        <input name="img" type="file" class="form-control d-flex me-3 title-font" id="img">
                    </div>
                    <span class="small text-muted fst-italic my-2">*: Campi obbligatori</span>
                    <div>
                        <button type="submit" class="btn btn-primary title-font my-2">Crea articolo</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-layout>
