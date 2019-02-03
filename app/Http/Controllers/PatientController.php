<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Patient;

class PatientController extends Controller
{
    public function create (Request $request) {
      $patient = new Patient;

      $patient->nome = $request->nome;
      $patient->cpf = $request->cpf;
      $patient->dataDeNascimento = $request->dataDeNascimento;
      $patient->telefone = $request->telefone;
      $patient->sintomas = $request->sintomas;
      $patient->save();
      return response()->json([$patient]);
    }

    public function list (){
      return Patient::all();
    }

    public function show($id) {
      $patient = Patient::findOrFail($id);

      return response()->json([$patient]);
    }

    public function update(Request $request, $id) {
      $patient = Patient::findOrFail($id);
      if($request->nome)
          $patient->nome = $request->nome;
      if($request->cpf)
          $patient->cpf = $request->cpf;
      if($request->dataDeNascimento)
          $patient->dataDeNascimento = $request->dataDeNascimento;
      if($request->telefone)
          $patient->telefone = $request->telefone;
      if($request->sintomas)
          $patient->sintomas = $request->sintomas;
      $patient->save();
      return response()->json($patient);
    }

    public function delete($id){
      Patient::destroy($id);
      return response()->json(['DELETADO']);
    }
}
