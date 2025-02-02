<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function setAdmin(User $user)
    {
        $user->update([
            'is_admin' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso amministratore l\'utente scelto');
    }

    public function setRevisor(User $user)
    {
        $user->update([
            'is_revisor' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso revisore l\'utente scelto');
    }

    public function setWriter(User $user)
    {
        $user->update([
            'is_writer' => true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai correttamente reso redattore l\'utente scelto');
    }

    public function editTag(Request $request, Tag $tag)
    {

        $request->validate([
            'name' => 'required|unique:tags',
        ]);

        $tag->update([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Tag aggiornato correttamente');
    }

    public function deleteTag(Tag $tag)
    {
        foreach ($tag->articles as $article) {
            $article->tags()->detach($tag);
        }
        $tag->delete();
        return redirect()->back()->with('message', 'Tag eliminato correttamente');
    }

    public function editCategory(Request $request, Category $category)
    {

        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category->update([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Categoria aggiornata correttamente');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('message', 'Categoria Eliminata correttamente');
    }

    public function storeCategory(Request $request)
    {
        Category::create([
            'name' => strtolower($request->name),
        ]);

        return redirect()->back()->with('message', 'Categoria inserita correttamente');
    }
}
