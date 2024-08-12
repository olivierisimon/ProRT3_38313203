<?php
namespace App\Controllers;
Use App\Models\Usuario_model;
use CodeIgniter\Controller;


class Usuario_controller extends Controller{
    
	public function __construct()
    {
        helper(['form', 'url']);
    }

    public function create() 
    {
        echo view('registro');   
            
    }
    
    public function formValidation() {/*Enviar formulario,"enviarform"*/
                
           $input = $this->validate([
               'nombre'   => 'required',
               'apellido' => 'required',
               'email'    => 'required|valid_email|is_unique[usuario.email]',
               'contraseña' => 'required'
            ],
           
             );
           $formModel = new Usuario_model();
        
           if (!$input) 
           {
            echo "<script>console.log('NoValidado');</script>";

                echo view('registro');
   
           } 
           else {
            echo "<script>console.log('Validado');</script>";


               $formModel->save([
                   'nombre' => $this->request->getVar('nombre'),
                   'apellido'=> $this->request->getVar('apellido'),
                   'email'=> $this->request->getVar('email'),
                   'contraseña' => $this->request->getVar('contraseña'),
               ]);  
                 //return $this->response->redirect(site_url(''));
   
               // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
                  session()->setFlashdata('success', 'Usuario registrado con exito');
                  return $this->response->redirect(site_url('/registro'));
         
           }}


        public function create2() {
                
            $dato['titulo']='Registrarse'; 
            echo view('front/navbar_view');
            echo view('front/head_view',$dato);
            echo view('back/crud/agregar_usuario_view');
            echo view('front/footer_view');
        }


        public function formValidation2() {/*Enviar formulario,"enviarform"*/
             
            $input = $this->validate([
                'nombre'   => 'required',
                'apellido' => 'required',
                'email'    => 'required|valid_email|is_unique[usuario.email]',
                'usuario'  => 'required',
                'perfil_id'  => 'required',
                'pass'     => 'required'
            ],
            
           );
            $formModel = new Usuario_model();
         
            if (!$input) {
                   $data['titulo']='Registrar Nuevo Usuario'; 
                    echo view('front/navbar_view');
                    echo view('front/head_view',$data);
                    //echo view('back/usuario/registrarse', ['validation' => $this->validator]);
                    echo view('back/crud/agregar_usuario_view', ['validation' => $this->validator]);
                    echo view('front/footer_view');
    
            } else {
                $formModel->save([
                    'nombre' => $this->request->getVar('nombre'),
                    'apellido'=> $this->request->getVar('apellido'),
                    'usuario'=> $this->request->getVar('usuario'),
                    'email'=> $this->request->getVar('email'),
                    'perfil_id'=> $this->request->getVar('perfil_id'),
                    'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
                  //  password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
                ]);  
                  //return $this->response->redirect(site_url(''));
    
                // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
                   session()->setFlashdata('success', 'Usuario registrado con exito');
                   return $this->response->redirect(site_url('/agregar_usuario'));
          
            }
        }


        public function listado_usuario(){
            $consulta_model = new Usuario_model();
            $datos['usuario'] = $consulta_model->orderBy('id_usuario','asc')->findAll();
            // $dato['titulo']='Usuarios';
            // echo view('front/navbar_view');
            // echo view('front/head_view',$dato);
            // echo view('back/crud/usuarios_view',$datos);
            echo view('listado_usuario',$datos);}
            


            public function eliminarUsuarioLogico($id_usuario){
                $usuarioModel=new Usuario_model();
                $data = $usuarioModel->where('id_usuario', $id_usuario)->first();
                $data['id_estado']=2;
                $usuarioModel->update($id_usuario, $data);
                session()->setFlashdata('success', 'Usuario Desactivado');
                return $this->response->redirect(site_url('listado_usuario')); 
            }


            


            public function devolverUsuarioLogico($id_usuario){
                $usuarioModel=new Usuario_model();
                $data = $usuarioModel->where('id_usuario', $id_usuario)->first();
                echo $data['id_estado']='1';
                $usuarioModel->update($id_usuario, $data);
                
                session()->setFlashdata('success', 'Usuario Reagregado!');
                return redirect()->back()->withInput();
            }


    public function usuariosInactivos(){
        $consulta_model = new Usuario_model();
        $datos['usuario'] = $consulta_model->orderBy('id','asc')->findAll();
        $dato['titulo']='Usuarios';
        echo view('front/navbar_view');
        echo view('front/head_view',$dato);
        echo view('back/crud/usuarios_inactivos_view',$datos);
        echo view('front/footer_view');
    }
        
    

  
    public function buscarUsuario(){
            
        $input =$this->validate([
            'apellido' =>'required[min_length[2]]'
        ]);
     
            if(!$input){
                $dato['titulo']='Buscar Usuario';
                echo view('front/navbar_view');
                echo view('front/head_view',$dato);
                echo view('back/crud/buscar_usuario');
                echo view('front/footer_view');
            }

            else{
                $Usuario = new Usuarios_model();
                $ap=$this->request->getVar('apellido');
                $data['user']= $Usuario->where('apellido',$ap)->first(); 
                if($data['user']){ 
                    
                    $dato['titulo']='Buscar Usuarios';
                    echo view('front/navbar_view');
                    echo view('front/head_view',$dato);
                    session()->setFlashdata('success', 'Usuario Encontrado!');
                    echo view('back/crud/usuarios_view_2',$data);
                    echo view('front/footer_view');    
                   
                }
                else{ 
                    $dato['titulo']='Buscar Usuario';
                    session()->setFlashdata('success', 'Usuario No Encontrado!');
                    return $this->response->redirect(site_url('buscar_usuario'));
                }}}
        
                

            public function cambiarCategoriaUsuario($id){
                $usuarioModel=new Usuario_model();
                $data = $usuarioModel->where('id', $id)->first();
                echo $data['categoria_id']=1;////
                $usuarioModel->update($id, $data);
                return $this->response->redirect(site_url('menu_usuarios ')); 
        }

       
        public function editarUser($dato): string
    {
        return view('editar_usuario',$dato);
    } 
        public function editarUsuario($id_usuario) {

            // Validar entrada
            $input = $this->validate([
                'nombre' => 'required',
                'apellido' => 'required',
                'email' => 'required',
               
            ]);
        
            $UsuarioModel = new Usuario_model();
        
            if (!$input) {

                $data['titulo'] = 'Editar usuario';
                $dato['usuario'] = $UsuarioModel->where('id_usuario', $id_usuario)->first();
                echo view('editar_user', $dato, ['validation' => $this->validator]);
            } else {
                $data = [
                    'nombre' => $this->request->getVar('nombre'),
                    'apellido' => $this->request->getVar('apellido'),
                    'email' => $this->request->getVar('email'),
                ];
                

        
                $UsuarioModel->update($id_usuario, $data);
                $session = session();
                $session->set($data);
                session()->setFlashdata('success', 'Usuario Editado!');
                return $this->response->redirect(site_url('/listado_usuario'));
            }
        }
        
        
        }
    
    
        ?>
    
   