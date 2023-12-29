<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function index(){
      $user=User::all();
      
   }

   public function medico_paciente_index(){
      $doctor = User::find(Auth::user()->id);
      $pacientes = User::getPatientsDoctorId($doctor->id);
      // dd($pacientes);
      return view('pages.medico.paciente.index', compact('pacientes'));
   }
}
