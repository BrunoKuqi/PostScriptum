<x-layout>
    <x-navbar/>
    <x-masthead-dashboard/>

    <div class="container-fluid py-3 title-font text-center text-dark border-bottom shadow-sm border-2  ">
        <div class="row justify-content-center">
            <h1 class="title-font tx-1">
                Lavora con noi
            </h1>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center align-items-center border rounded p-2 shadow-lg border-2 ">
            <div class="col-12 col-md-6">
                <h2 class="title-font tx-1">Lavora come amministratore</h2>
                <p class="body-font tx-2">Cosa farai: 
                    Come amministratore, avrai il potere di plasmare il destino di un'intera organizzazione. Con la possibilità di guidare il personale, gestire le risorse finanziarie e promuovere l'innovazione, avrai un impatto diretto sul successo e la crescita dell'azienda. È un'opportunità straordinaria per sviluppare le tue capacità di leadership e contribuire in modo significativo a un ambiente di lavoro positivo e produttivo. Se sei pronto per una sfida coinvolgente e gratificante, essere un amministratore potrebbe essere la scelta perfetta per te.</p>
                <h2 class="title-font tx-1">Lavora come revisore</h2>
                <p class="body-font tx-2">Cosa farai: 
                    Essere un revisore significa essere il custode della precisione e dell'integrità finanziaria di un'organizzazione. Con una mente analitica e una forte etica professionale, avrai l'opportunità di esaminare attentamente le informazioni finanziarie e garantire la conformità normativa. È un ruolo gratificante che ti permette di contribuire alla fiducia del pubblico nell'azienda e alla sua stabilità a lungo termine.</p>
                <h2 class="title-font tx-1">Lavora come redattore</h2>
                <p class="body-font tx-2">Cosa farai: 
                    Come redattore, avrai il potere di creare contenuti coinvolgenti e persuasivi che trasmettono il messaggio e l'immagine di un'organizzazione. Con una padronanza della lingua e una mente creativa, contribuirai alla reputazione e alla credibilità dell'azienda, mentre trasmetti informazioni importanti e ispiri azioni. Se ami giocare con le parole e mettere in risalto storie interessanti, essere un redattore potrebbe essere il lavoro perfetto per te.</p>
            </div>
            <div class="col-12 col-md-6">
                
                <x-error/>

                <form class="p-5" action="{{route('careers.submit')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="role" class="form-label title-font tx-1">Per quale ruolo ti stai candidando? *</label>
                        <select name="role" id="role" class="form-control title-font tx-2 ">
                            <option value="">  Scegli qui </option>
                            <option value="admin">Amministratore</option>
                            <option value="revisor">Revisore</option>
                            <option value="writer">Redattore</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label title-font tx-1">Email *</label>
                        <input name="email" type="email" class="form-control tx-2 title-font" id="email" value="{{ old('email') ?? Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label title-font tx-1">Parlaci di te *</label>
                        <textarea name="message" id="message" cols="30" rows="7" class="form-control body-font">{{ old('message') }}</textarea>
                    </div>
                    <h6 class="title-font tx-2"> *: Campo obbligatorio </h6>
                    <div class="mt-2">
                        <button class="btn btn-outline-info title-font bg-A text-white">Invia la candidatura</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>