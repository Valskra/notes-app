<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    /**
     * Affiche la liste des notes de l'utilisateur connecté
     */
    public function index(Request $request)
    {
        $query = Note::where('user_id', Auth::id())
            ->orderBy('is_favorite', 'desc')
            ->orderBy('updated_at', 'desc');

        // Filtrage par catégorie si spécifiée
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }

        // Recherche dans le titre et contenu
        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('content', 'LIKE', '%' . $request->search . '%');
            });
        }

        $notes = $query->paginate(12);
        $categories = Note::where('user_id', Auth::id())
            ->distinct()
            ->pluck('category')
            ->filter();

        return view('notes.index', compact('notes', 'categories'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle note
     */
    public function create()
    {
        $categories = Note::where('user_id', Auth::id())
            ->distinct()
            ->pluck('category')
            ->filter();

        return view('notes.create', compact('categories'));
    }

    /**
     * Enregistre une nouvelle note en base de données
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'nullable|max:100',
            'is_favorite' => 'boolean',
            'is_public' => 'boolean'
        ]);

        $note = new Note($validated);
        $note->user_id = Auth::id();
        $note->uuid = Str::uuid();

        if ($request->has('is_favorite')) {
            $note->is_favorite = true;
        }

        if ($request->has('is_public')) {
            $note->is_public = true;
        }

        $note->save();

        return redirect()->route('notes.index')
            ->with('success', 'Note créée avec succès !');
    }

    /**
     * Affiche une note spécifique
     */
    public function show(Note $note)
    {
        // Vérification que l'utilisateur peut voir cette note
        if ($note->user_id !== Auth::id() && !$note->is_public) {
            abort(403, 'Accès non autorisé à cette note.');
        }

        return view('notes.show', compact('note'));
    }

    /**
     * Affiche le formulaire d'édition d'une note
     */
    public function edit(Note $note)
    {
        // Vérification de propriété
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Vous ne pouvez pas modifier cette note.');
        }

        $categories = Note::where('user_id', Auth::id())
            ->distinct()
            ->pluck('category')
            ->filter();

        return view('notes.edit', compact('note', 'categories'));
    }

    /**
     * Met à jour une note existante
     */
    public function update(Request $request, Note $note)
    {
        // Vérification de propriété
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Vous ne pouvez pas modifier cette note.');
        }

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'nullable|max:100',
            'is_favorite' => 'boolean',
            'is_public' => 'boolean'
        ]);

        $note->update($validated);

        // Gestion des checkboxes
        $note->is_favorite = $request->has('is_favorite');
        $note->is_public = $request->has('is_public');
        $note->save();

        return redirect()->route('notes.show', $note)
            ->with('success', 'Note mise à jour avec succès !');
    }

    /**
     * Supprime une note
     */
    public function destroy(Note $note)
    {
        // Vérification de propriété
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Vous ne pouvez pas supprimer cette note.');
        }

        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Note supprimée avec succès !');
    }

    /**
     * Bascule le statut favori d'une note (via AJAX)
     */
    public function toggleFavorite(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            return response()->json(['error' => 'Non autorisé'], 403);
        }

        $note->is_favorite = !$note->is_favorite;
        $note->save();

        return response()->json([
            'success' => true,
            'is_favorite' => $note->is_favorite
        ]);
    }

    /**
     * Duplique une note existante
     */
    public function duplicate(Note $note)
    {
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Vous ne pouvez pas dupliquer cette note.');
        }

        $duplicatedNote = $note->replicate();
        $duplicatedNote->title = $note->title . ' (Copie)';
        $duplicatedNote->uuid = Str::uuid();
        $duplicatedNote->is_favorite = false;
        $duplicatedNote->is_public = false;
        $duplicatedNote->save();

        return redirect()->route('notes.edit', $duplicatedNote)
            ->with('success', 'Note dupliquée ! Vous pouvez maintenant la modifier.');
    }
}
