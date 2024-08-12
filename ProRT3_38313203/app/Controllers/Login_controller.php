<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario_model;
  
class Login_controller extends BaseController
{

    public function index()
    {
        helper(['form','url']);
      
        echo view('login');
        
    } 
  
    public function auth()
    {   $session = session();
        $email=$_POST['email'];
        $password=$_POST['contraseña'];
        $model=new Usuario_model();
        $data = $model->where('email', $email)->first();
        if($data){
            $baja=$data['id_estado'];
            if($baja==2){
                echo 'Usuario dado de baja';
                return redirect()->to('/login');
            }
            $pass=$data["contraseña"];
            if($password==$pass){
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido'=> $data['apellido'],
                    'email' =>  $data['email'],
                    'id_tipoUsuario' => $data['id_tipoUsuario'],
                    'contraseña' => $data['contraseña'],
                    'id_estado' => $data['id_estado'],
                    
                ];
                $session->set($ses_data);
                 session()->setFlashdata('success', 'Bienvenido Usuario: '.$session->email,);
                 return redirect()->to('/principal');        
        }
        
       }
    else{
        $session->setFlashdata('msg', 'No Existe el Email o es Incorrecto');
        return redirect()->to('/login');
        //return redirect()->to('/login_controller');
  }
        
    
  }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
} 
