<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryadController extends Controller
{
    public function index()
    {
        $categories = Category::with('titles')->get();
        return view('administration.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('administration.pages.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($validated);

        return redirect()->route('categoriesad.index')
            ->with('success', 'Catégorie créée avec succès.');
    }

    public function show(Category $category)
    {
        return view('administration.pages.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $titles = \App\Models\Title::where('category_id', $category->id)->get();;
        return view('administration.pages.categories.edit', compact('category', 'titles'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'titles' => 'array',
            // 'new_title' => 'nullable|string|max:255',
        ]);
    
        $category->update([
            'name' => $validated['name']
        ]);
        
        // Si un nouveau titre est ajouté
        if ($request->has('add_title') && !empty($request->new_title)) {
            \App\Models\Title::create([
                'name' => $request->new_title,
                'category_id' => $category->id
            ]);
            return redirect()->route('categoriesad.edit', $category->id)
            ->with('success', 'Catégorie mise à jour avec succès.');
        }elseif($request->has('titles')) {
            // Récupérer tous les titres qui appartiennent à cette catégorie
            $currentTitles = \App\Models\Title::where('category_id', $category->id)->get();
            
            // Pour chaque titre actuel, vérifier s'il est dans la liste des titres sélectionnés
            foreach ($currentTitles as $title) {
                if (!in_array($title->id, $request->titles)) {
                    // Si non sélectionné, dissocier de cette catégorie
                   
                    $title->delete();
                }
            }
            
            // Pour chaque titre sélectionné, l'associer à cette catégorie s'il ne l'est pas déjà
            foreach ($request->titles as $titleId) {
                $title = \App\Models\Title::find($titleId);
                if ($title && $title->category_id != $category->id) {
                    $title->category_id = $category->id;
                    $title->save();
                }
            }
        } else {
            // Si aucun titre n'est sélectionné, dissocier tous les titres
            \App\Models\Title::where('category_id', $category->id)
                ->delete();
        }
        
       
    
        return redirect()->route('categoriesad.index')
            ->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categoriesad.index')
            ->with('success', 'Catégorie supprimée avec succès.');
    }
}