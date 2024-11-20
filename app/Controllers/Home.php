<?php

namespace App\Controllers;
use App\Models\PacienteModel;
class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function monitoreo(){
        return view('view_monitoreo');
    }
    public function registro(){
        $empleadoModel = new PacienteModel();
        $data['pacientes'] = $empleadoModel->findAll();
        return view('view_registerpatient', $data);
    }
}
