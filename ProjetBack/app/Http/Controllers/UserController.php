<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClasseResource;
use App\Http\Resources\InscriptionResource;
use App\Models\User;
use App\Models\Module;
use App\Imports\UsersImport;
use App\Models\ClasseAnnee;
use App\Models\Inscription;
use App\Models\ModuleProf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           return InscriptionResource::collection(Inscription::all());
        // return Inscription::all();
    }

    public function import(Request $request)
    {
        $fichierExcel = $request->file('file');
        $etu = Excel::toArray(new UsersImport, $fichierExcel);

        try {
            DB::beginTransaction();
            foreach ($etu as $value) {
                foreach ($value as $value1) {
                    $v = (new UsersImport)->model($value1);
                    $v->save();
                    $id = $v->id;
                    Inscription::insert([
                        "etudiant_id" => $id,
                        "classe_annee_id" => $request->classe_annee_id,
                    ]);
                    $eff = ClasseAnnee::where('id', $request->classe_annee_id)->first();
                    $eff->increment('nbreEtu', 1);
                }
            }
            DB::commit();
            return response()->json([
                "message" => "Inscription avec succés"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return $th;
        }
    }
    // Excel::import(new UsersImport, $fichierExcel);
    // return $etu;
    // return redirect('/')->with('success', 'All good!');

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    public function getProfByModule($id)
    {
        $mod = ModuleProf::where('module_id',$id)->get();
        // return $mod;
        $prof = $mod->pluck('prof_id');
        return User::whereIn('id',$prof)->get();
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
