<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaAlbum;
use App\Models\MediaItem;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        $albums = MediaAlbum::with('mediaItems')->latest()->paginate(10);
        return view('admin.media.index', compact('albums'));
    }

    public function createAlbum()
    {
        return view('admin.media.create-album');
    }

    public function storeAlbum(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'type' => 'required|in:photo,video'
        ]);

        MediaAlbum::create($validated);

        return redirect()->route('admin.media.index')->with('success', 'Album créé avec succès');
    }

    public function editAlbum(MediaAlbum $album)
    {
        return view('admin.media.edit-album', compact('album'));
    }

    public function updateAlbum(Request $request, MediaAlbum $album)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'type' => 'required|in:photo,video'
        ]);

        $album->update($validated);

        return redirect()->route('admin.media.index')->with('success', 'Album mis à jour avec succès');
    }

    public function addMedia(MediaAlbum $album)
    {
        return view('admin.media.add-media', compact('album'));
    }

    public function storeMedia(Request $request, MediaAlbum $album)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'file' => 'required|' . ($album->type === 'photo' ? 'image|mimes:jpeg,png,jpg,gif' : 'mimes:mp4,mov,avi') . '|max:20480'
        ]);

        $filePath = $request->file('file')->store("media/{$album->type}s", 'public');

        $album->mediaItems()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'file_path' => $filePath
        ]);

        return redirect()->route('admin.media.index')->with('success', 'Média ajouté avec succès');
    }

    public function destroyMedia(MediaItem $mediaItem)
    {
        $mediaItem->delete();
        return redirect()->back()->with('success', 'Média supprimé avec succès');
    }

    public function destroyAlbum(MediaAlbum $album)
    {
        $album->delete();
        return redirect()->route('admin.media.index')->with('success', 'Album supprimé avec succès');
    }
}
