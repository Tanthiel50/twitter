<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request ->validate([
            'pseudo' => 'required|max:40',
            'image'=> 'nullable|string'
        ]);

        //on modifie les infos de l'utilisateur
        $user->pseudo = $request ->input('pseudo');
        $user->image = $request->input ('image');

        //on sauvegarde les changement en bdd
        $user->save();

        //on redirige vers la page precedente
        return back()->with('message', 'Le compte a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //On vérifie que c'est bien l'utilisateur connecté qui fait la demande de suppression
        //les id doivent etre identiques
        if (Auth::user()->id == $user->id){
            $user->delete();
            return redirect()->route('home')->with('message', 'Le compte a bien été supprimé');
        }else{
            return back()->with('message', 'Vous ne pouvez pas supprimer ce compte');
        }
    }
}
