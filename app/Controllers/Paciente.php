<?php

namespace App\Controllers;
use App\Models\PacienteModel;
use \PhpMqtt\Client\MqttClient;
require('../../vendor/autoload.php');


class Paciente extends BaseController
{
    public function registerPatient(){
            $empleadoModel = new PacienteModel();
            $name = $this->request->getPost("patientName");
            $surname = $this->request->getPost("patientFirstSurname");
            $secondSurname = $this->request->getPost("patientSecondSurname");
            $birthdate = $this->request->getPost("patientBirthdate");
            $gender = $this->request->getPost("patientGender");
            $ci = $this->request->getPost("patientIdentity");
            $data = [
                'names'=>$name,
                'surname'=>$surname,
                'secondSurname'=>$secondSurname,
                'birthdate'=>$birthdate,
                'gender'=>$gender,
                'ci'=>$ci
            ];
            $empleadoModel->insert($data);
            $data['pacientes'] = $empleadoModel->findAll();
            return redirect()->to('/registrar');
    }
    public function deletePatient($id)
    {
        $empleadoModel = new PacienteModel();
        $empleadoModel->delete($id);
        return redirect()->to('/registrar');
    }
    public function recibirDatos($id)
    {
        $server = '192.168.1.6';
        $port = 1883;
        $mqtt = new MqttClient($server,$port);
        $mqtt->connect();
        // Mensaje a enviar
        // Publicar el mensaje en un tópico
        $mqtt->publish('id', $id);
        $mqtt->publish('stop', 1);
        // Desconectar el cliente MQTT
        $mqtt->disconnect();
        $pacienteModel = new PacienteModel();
        $departamentos = $pacienteModel->obtenerDatos($id);
        $data['pacientes'] = $departamentos;

        return view('view_monitoreo', $data);
    }
    public function pararMonitoreo(){
    
        $server = '192.168.1.6';
        $port = 1883;
        $mqtt = new MqttClient($server,$port);
        $mqtt->connect();
    // Mensaje a enviar
    // Publicar el mensaje en un tópico
        $mqtt->publish('stop', 0);
    // Desconectar el cliente MQTT
        $mqtt->disconnect();
        $empleadoModel = new PacienteModel();
        $data['pacientes'] = $empleadoModel->findAll();
        return view('view_registerpatient', $data);
    }
    
}