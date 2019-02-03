<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Doctor;

class DoctorController extends Controller
{
    public function create(Request $request){
      $doctor = new Doctor;
      $doctor->nome = $request->nome;
      $doctor->crm = $request->crm;
      $doctor->email = $request->email;
      $doctor->especializacao = $request->especializacao;
      $doctor->dataDeNascimento = $request->dataDeNascimento;
      $doctor->idPatients = $request->idPatients;
      $doctor->save();
      return response()->json([$doctor]);
    }

    public function list(){
      return Doctor::all();
    }

    public function show($id){
      $doctor = Doctor::findOrFail($id);
      return response()->json([$doctor]);
    }

    public function update(Request $request, $id){
      $doctor = Doctor::findOrFail($id);
      if($request->nome)
      $doctor->nome = $request->nome;
      if($request->crm)
      $doctor->crm = $request->crm;
      if($request->email)
      $doctor->email = $request->email;
      if($request->especializacao)
      $doctor->especializacao = $request->especializacao;
      if($request->dataDeNascimento)
      $doctor->dataDeNascimento = $request->dataDeNascimento;
      if($request->idPatients)
      $doctor->idPatients = $request->idPatients;
      $doctor->save();
      return response()->json([$doctor]);
    }

    public function delete($id){
      Doctor::destroy($id);
      return response()->json(['DELETADO']);
    }

}
