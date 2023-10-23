<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModuleProfResource;
use App\Models\Cours;
use App\Models\ModuleProf;
use Illuminate\Http\Request;

class ModuleProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return ModuleProfResource::make(ModuleProf::all());
    }
      public function getProfByModule($idProf){

        $prof= ModuleProf::where('prof_id',$idProf)->get()->pluck('id');

        // $cours=Cours::whereIn('module_i')
      }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ModuleProf $moduleProf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModuleProf $moduleProf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModuleProf $moduleProf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModuleProf $moduleProf)
    {
        //
    }
}
