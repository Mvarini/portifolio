<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProjectGalleryController extends Controller
{
    public function index(Project $project)
    {
        // Carrega as relações
        $project->load('user', 'galleries');

        // Relação de todas as galerias do projeto sendo utilizada apenas para a paginação
        $galleries = Gallery::with('project')->where('project_id', $project->id)->paginate(10);

        return view('projects_gallery.index', ['project' => $project, 'galleries' => $galleries, 'menu' => 'users']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'image.required' => 'A imagem é obrigatória',
        ]);

        try {
            DB::beginTransaction();

            $gallery = Gallery::create([
                'project_id' => $request->project_id,
                'image' => $request->file('image')->store('gallery', 'public'),
            ]);

            DB::commit();

            Log::info('Galeria cadastrada', ['gallery_id' => $gallery->id, 'action_user_id' => Auth::id()]);

            return redirect()->route('gallery.index', $gallery->project_id)->with('success',
                'Imagem cadastrada com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Galeria não cadastrada', ['error' => $ex->getMessage(), 'action_user_id' => Auth::id()]);

            return back()->withInput()->with('error', 'Imagem não cadastrada, entre em contato com o administrador');
        }
    }

    public function update(Gallery $gallery, Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'image.required' => 'A imagem é obrigatória',
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $requestImage = $request->file('image')->store('gallery', 'public');

                if ($gallery->image) {
                    Storage::disk('public')->delete($gallery->image);
                }
            }

            $gallery->update([
                'image' => $requestImage ?? $gallery->image,
            ]);

            DB::commit();

            Log::info('Galeria atualizada', ['gallery_id' => $gallery->id, 'action_user_id' => Auth::id()]);

            return back()->with('success', 'Galeria atualizada com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Galeria não atualizada', ['erro' => $ex->getMessage(), 'action_user_id' => Auth::id()]);

            return back()->withInput()->with('error', 'Galeria não atualizada, entre em contato com o administrador');
        }
    }

    public function destroy(Gallery $gallery)
    {
        try {
            DB::beginTransaction();

            $gallery->delete();

            DB::commit();

            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            Log::info('Galeria excluída', ['gallery_id' => $gallery->id, 'action_user_id' => Auth::id()]);

            return redirect()->route('gallery.index', $gallery->project_id)->with('success',
                'Galeria excluída com sucesso');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Galeria não excluída', ['error' => $ex->getMessage(), 'action_user_id' => Auth::id()]);

            return back()->with('error', 'Galeria não excluída, entre em contato com o administrador');
        }
    }
}
