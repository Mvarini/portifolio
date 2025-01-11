<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectCreatRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(User $user)
    {
        // Carrega as relações
        $user->load('projects');

        // Carrega a relação do usuário com o projeto atual, usado apenas para a paginação
        $projects = Project::with('user')->where('user_id', $user->id)->paginate(10);

        $categories = ['Analista', 'Desenvolvedor'];

        return view('projects.index', [
            'user' => $user,
            'projects' => $projects,
            'menu' => 'users',
            'categories' => $categories
        ]);
    }

    public function show(Project $project)
    {
        $projects = Project::with('user')->where('user_id', $project->user_id)->paginate(10);

        $project->load('user', 'galleries');

        return view('projects.show', ['project' => $project, 'projects' => $projects]);
    }

    public function store(ProjectCreatRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            if ($request->hasFile('cover')) {
                $requestImage = $request->file('cover')->store('projects', 'public');
            }

            $project = Project::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'date_at' => Carbon::createFromFormat('d/m/Y', $request->date_at)->format('Y-m-d'),
                'client' => $request->client,
                'url' => $request->url,
                'category' => $request->category,
                'cover' => $requestImage,
                'description' => $request->description
            ]);

            DB::commit();

            Log::info('Projeto cadastrado', ['project_id' => $project->id, 'Action_user_id' => Auth::id()]);

            return redirect()->route('project.index', $project->user_id)->with('success',
                'Projeto cadastrado com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Projeto cadastrado', ['erro' => $ex->getMessage(), 'Action_user_id' => Auth::id()]);

            return back()->withInput()->with('error', 'Projeto não cadastrado, entre em contato com o administrador');
        }
    }

    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            // Caso haja a cover, envia para pasta projects
            if ($request->hasFile('cover')) {
                $requestImage = $request->file('cover')->store('projects', 'public');

                // Excluir a iamgem salva anteriormente
                if ($project->cover) {
                    Storage::disk('public')->delete($project->cover);
                }
            }

            $project->update([
                'name' => $request->name,
                'date_at' => Carbon::createFromFormat('d/m/Y', $request->date_at)->format('Y-m-d'),
                'client' => $request->client,
                'url' => $request->url,
                'category' => $request->category,
                'cover' => $requestImage ?? $project->cover,
                'description' => $request->description
            ]);

            DB::commit();

            Log::info('Projeto atualizado', ['project_id' => $project->id, 'Action_user_id' => Auth::id()]);

            return redirect()->route('project.index', $project->user_id)->with('success',
                'Projeto atualizado com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Projeto não atualizado', ['erro' => $ex->getMessage(), 'Action_user_id' => Auth::id()]);

            return back()->withInput()->with('error', 'Projeto não atualizado, entre em contato com o administrador');
        }
    }

    public function destroy(Project $project)
    {
        try {
            DB::beginTransaction();

            $project->delete();

            DB::commit();

            if ($project->cover) {
                Storage::disk('public')->delete($project->cover);
            }

            Log::info('Projeto excluído', ['project_id' => $project->id, 'Action_user_id' => Auth::id()]);

            return redirect()->route('project.index', $project->user_id)->with('success',
                'Projeto excluído com sucesso');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Projeto não excluído', ['erro' => $ex->getMessage(), 'Action_user_id' => Auth::id()]);

            return back()->withInput()->with('error', 'Projeto não excluído, entre em contato com o administrador');
        }
    }
}
