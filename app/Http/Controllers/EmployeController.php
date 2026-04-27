<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    public function dashboard()
    {
        return view('employe.dashboard');
    }

    public function mesTaches()
    {
        // requete qui permet de recuperer les taches de l'employé connecté
        $taches = Task::where('user_id', Auth::user()->id)
                        ->orderBy('due_date', 'asc')->get();
        //compact('taches') permet de passer les taches à la vue
        return view('employe.mes-taches', compact('taches'));
    }

    public function addTache(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'date_realisation' => 'required|date|after:today',
            'niveau' => 'required|in:basse,moyenne,élevée'
        ]);

        try {
            Task::create([
                'title' => $request->input('titre'),
                'due_date' => $request->input('date_realisation'),
                'priority' => $request->input('niveau'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id,
        ]);
                return redirect()->route('employe.mes-taches')
                       ->with('success', 'Tâche ajoutée avec succès.');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
             
        }

    }

    public function ChangeStatus($id,$status){
        $tache = Task::find($id);
       if($tache && $tache->user_id == Auth::user()->id){
        $tache->is_completed = $status;
        $tache->save();
        return redirect()->route('employe.mes-taches')
                       ->with('success', 'Status de la tâche mis à jour avec succès.');
       } else{
        return redirect()->route('employe.mes-taches')
                       ->with('error', 'Tâche non trouvée ou accès refusé.');
       }
    }
}
