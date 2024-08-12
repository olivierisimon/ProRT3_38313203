<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface{
    public function before(RequestInterface $request, $arguments = null)
    {$session=session();
        //Si el usuario no esta logueado 
        if($session->id_tipoUsuario!=(1)){
            //Entonces redirecciona a la pagina de login
            return redirect()->to('/login');
        }
    }
    //---------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null){
        //Do something here
    }

}
