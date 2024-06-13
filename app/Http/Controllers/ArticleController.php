<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Mostriamo tutti i nostri elementi
     */
    public function index()
    {

        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();  //Prendiamo tutti gli articoli e li ordiniamo in base alla date di redazione
        return view('article.index', compact('articles')); //ritorniamo su index con la key articles che conterra tutti i dati
    }

    /**
     * Mostriamo il form dove inseriremo i dati desiderati.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Andiamo a valorizzare i dati presi dal form per poi salvarli nel database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:articles|min:4',
            'subtitle' => 'required|unique:articles|min:5',
            'body' => 'required|min:10',
            'img' => 'image|required',
            'category' => 'required',
            'tags' => 'required'
        ]);
        //Se vogliamo utilizzare questo nuovo oggetto Article per eseguire ulteriori operazioni o applicare condizioni prima di salvarlo nel database, è necessario salvarlo in una variabile.

        $article = Article::create([
            'title' => $request->title, //$title = $request->title invece di scriverli sopra possiamo direttamente scriverli qui
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'slug'=>Str::slug($request->title),
        ]);

        if ($request->file('img')) { // L'utente mi ha passato l'immagine?

            $article->img = $request->file('img')->store('public/img'); // Valorizzo l'oggeto con il nuovo valore di img

            $article->save(); // Salvo nel database il nuovo valore dell'oggetto

        }

        $tags = explode(',', $request->tags);

        foreach ($tags as $i => $tag) {

            $tags[$i] = trim($tag);
        }

        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate(
                ['name' => strtolower($tag)]
            );
        }

        $article->tags()->attach($newTag);

        return redirect(route('home'))->with('message', 'articolo inserito con successo');
    }

    /**
     * Visualizzazione dell'articolo selezionato.
     */
    public function show(Article $article)
    {
        $imageUrl= "/slide-dettaglio.jpg";

        return view('article.show', compact('article','imageUrl')); //visualizziamo l'articolo specifico usando la key article = [$article='article']
    }

    /**
     * Mostriamo il form per la modifica dell'articolo.
     */
    public function edit(Article $article)
    {
        if (Auth::user()->id == $article->user_id) {
            return view('article.edit', compact('article'));
        }
        return redirect()->route('home')->with('alert', 'Accesso consentito solo al redattore');
    }

    /**
     * Andiamo a sovrascrivere i valori salvati nell'articolo nel momento in cui richieda una modifica.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|min:5|unique:articles,title,' . $article->id,
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'img' => 'image',
            'category' => 'required',
            'tags' => 'required',
        ]);

        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            // 'user_id' => Auth::user()->id,
            'is_accepted' => null,
            'slug' => Str::slug($request->title),


        ]);
        //condizione dove se viene passata l'immagine allora prenderà quell'immagine, altrimenti rimarrà con l'immagine che aveva salvato prima
        if ($request->img) {
            Storage::delete($article->img);
            $article->update([
                'img' => $request->file('img')->store('public/img')
            ]);
        }

        $tags = explode(',', $request->tags);
        foreach ($tags as $i => $tag) {
            $tags[$i] = trim($tag);
        }

        $newTags = [];
        foreach ($tags as $tag) {
            $newTag = Tag::updateOrCreate([

                'name' => strtolower($tag)
            ]);
            $newTags[] = $newTag->id;
        }
        $article->tags()->sync($newTags);

            return redirect(route('writer.dashboard'))->with('message', 'Articolo modificato con successo');




        // return redirect(route('show', $article->id))->with('message', 'articolo modificato');
    }
    public function destroy(Article $article)
    {
        foreach($article->tags as $tag) {
            $article->tags()->detach($tag);
        }
        Storage::delete($article->img);
        $article->delete();
        return redirect()->back()->with('message','Articolo cancellato con successo');
    }

    /**
     * Rimuozione dell'articolo.
     */
    public function delete(Article $article)
    {
        $article->delete();

        return redirect()->back()->with('message', 'articolo eliminato');
    }

    public function category(Category $category)
    {  $files=File::allFiles(public_path('categories'));
        $categoryName = $category->name;
        $imagecategory = "{$categoryName}.jpg";
        $images=[];
        foreach($files as $file){
            
                array_push($images,$file->getFilename());

        }
        if (in_array($imagecategory,$images)) {
            $imageUrl="/categories/$imagecategory";
        }
        else{
            $imageUrl="/default.jpg";
        }
        
        $articles = $category->articles->sortByDesc('created_at')->filter(function ($article) {
            return $article->is_accepted == true;
        });

        return view('article.categories', compact('category', 'articles','imageUrl'));
    }

    public function user(User $user)
    {
        $articles = $user->articles->sortByDesc('created_at')->filter(function ($article) {
            return $article->is_accepted == true;
        });
        return view('article.users', compact('user', 'articles'));
    }

    public function articleSearch(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.search-index', compact('articles', 'query'));
    }
}
