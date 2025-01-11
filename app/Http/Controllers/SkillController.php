<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillCreateRequest;
use App\Http\Requests\SkillUpdateRequest;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index(User $user)
    {
        $skills = Skill::with('user')->where('user_id', $user->id)->paginate(10);

        $categories = [
            'Analista',
            'Desenvolvedor'
        ];

        return view('skills.index', [
            'skills' => $skills,
            'user' => $user,
            'menu' => 'users',
            'categories' => $categories
        ]);
    }

    public function store(SkillCreateRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $requestImage = $request->file('image')->store('skills', 'public');
            }

            $skill = Skill::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'category' => $request->category,
                'image' => $requestImage,
            ]);

            DB::commit();

            Log::info('Skill cadastrada', ['skill_id' => $skill->id, 'action_user_id' => Auth::id()]);

            return redirect()->route('skill.index', $skill->user_id)->with('success', 'Skill cadastrado com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Skill não cadastrada', ['skill_id' => $skill->id, 'error' => $ex->getMessage()]);

            return back()->with('error', 'Skill não cadastrada, entre em contato com o administrador!');
        }
    }

    public function update(SkillUpdateRequest $request, Skill $skill)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $requestImage = $request->file('image')->store('skills', 'public');

                if ($skill->image) {
                    Storage::disk('public')->delete($skill->image);
                }
            }

            $skill->update([
                'name' => $request->name,
                'category' => $request->category,
                'image' => $requestImage ?? $skill->image,
            ]);

            DB::commit();

            Log::info('Skill atualizada', ['skill_id' => $skill->id, 'action_user_id' => Auth::id()]);

            return redirect()->route('skill.index', $skill->user_id)->with('success', 'Skill atualizado com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Skill não atualizada', ['error' => $ex->getMessage(), 'action_user_id' => Auth::id()]);

            return back()->withInput()->with('error', 'Skill não atualizado, entre em contato com o administrador!');
        }
    }

    public function destroy(Skill $skill)
    {
        try {
            DB::beginTransaction();

            $skill->delete();

            if ($skill->image) {
                Storage::disk('public')->delete($skill->image);
            }

            DB::commit();

            Log::info('Skill deletada', ['skill_id' => $skill->id, 'action_user_id' => Auth::id()]);

            return redirect()->route('skill.index', $skill->user_id)->with('success', 'Skill deletado com sucesso!');
        } catch (\Exception $ex) {
            DB::rollBack();

            Log::info('Skill não deletada', ['erro' => $ex->getMessage(), 'action_user_id' => Auth::id()]);

            return back()->with('error', 'Skill não excluída, entre em contato com o administrador!');
        }
    }
}
