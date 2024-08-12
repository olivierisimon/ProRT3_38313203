<?php



namespace App\Controllers;
Use App\Models\Producto_model;
Use App\Models\Categoria_model;
use CodeIgniter\Controller;


class Producto_controller extends Controller{
    
	public function __construct(){
        helper(['form', 'url']);
        }
 

public function store(){
    
    $input =$this->validate([
        'nombre_prod' =>'required|min_length[3]',
        'categoria_id'=>'required|min_length[1]',
        'precio'=>'required|min_length[1]',
        'precio_vta'=>'required|min_length[1]',
        'stock'=>'required|min_length[1]',
        'stock_min'=>'required|min_length[1]'
        ]);
        $productoModel=new Producto_Model();
 
        if(!$input){
            $dato['titulo']='Alta';
            echo view('front/navbar_view');
            echo view('front/head_view',$dato);
            echo view('back/crud/alta_producto_view', [
                'validation'=>$this->validator]);
            echo view('front/footer_view');}
        else{
            $img=$this->request->getFile('imagen_file');
            $nombre_aleatorio=$img->getRandomName();    
            $img->move(ROOTPATH.'assets/uploads',$nombre_aleatorio);

            $data=[
                'nombre_prod'=>$this->request->getVar('nombre_prod'),
                'imagen'=>$img->getName(),
                'categoria_id'=>$this->request->getVar('categoria_id'),
                'precio'=>$this->request->getVar('precio'),
                'precio_vta'=>$this->request->getVar('precio_vta'),
                'stock'=>$this->request->getVar('stock'),
                'stock_min'=>$this->request->getVar('stock_min')];
                $producto=new Producto_Model();
                $producto->insert($data);
                session()->setFlashdata('success', 'Producto Agregado!');
                return $this->response->redirect(site_url('nuevo_producto'));

                }
        }
        
        public function menuProductos(){
            $consulta_model = new Producto_model();
            $datos['productos'] = $consulta_model->orderBy('id','asc')->findAll();
            $categoria_model = new Categoria_model();
            $datoscat['categorias'] = $categoria_model->orderBy('id','asc')->findAll();
            $dato['titulo']='Productos';
            echo view('front/navbar_view');
            echo view('front/head_view',$dato);
            echo view('back/crud/productos_views',$datos+$datoscat);
            echo view('front/footer_view');}

        public function menuProductosInactivos(){
                $consulta_model = new Producto_model();
                $datos['productos'] = $consulta_model->orderBy('id','asc')->findAll();
                $categoria_model = new Categoria_model();
                $datoscat['categorias'] = $categoria_model->orderBy('id','asc')->findAll();
                $dato['titulo']='Productos';
                echo view('front/navbar_view');
                echo view('front/head_view',$dato);
                echo view('back/crud/productos_inactivos_views',$datos+$datoscat);
                echo view('front/footer_view');}
            
        public function menuProductosSinStock(){
                $consulta_model = new Producto_model();
                $datos['productos'] = $consulta_model->orderBy('id','asc')->findAll();
                $categoria_model = new Categoria_model();
                $datoscat['categorias'] = $categoria_model->orderBy('id','asc')->findAll();
                $dato['titulo']='Productos';
                echo view('front/navbar_view');
                echo view('front/head_view',$dato);
                echo view('back/crud/productos_sin_stock_view',$datos+$datoscat);
                echo view('front/footer_view');}





        public function buscarProducto(){
            
            $input =$this->validate([
                'nombre_prod' =>'required[min_length[2]]'
            ]);
         
                if(!$input){
                    $dato['titulo']='Buscar Producto';
                    echo view('front/navbar_view');
                    echo view('front/head_view',$dato);
                    echo view('back/crud/buscarProducto');
                    echo view('front/footer_view');
                }

                else{
                    
                    
                    $ProductoModel = new Producto_model();
                    $nom=$this->request->getVar('nombre_prod');
                    $categoria_model = new Categoria_model();
                $datoscat['categorias'] = $categoria_model->orderBy('id','asc')->findAll();
                    $data['prod']= $ProductoModel->where('nombre_prod',$nom)->first(); 
                    if($data['prod']){
                        $dato['titulo']='Buscar Producto';
                        echo view('front/navbar_view');
                        echo view('front/head_view',$dato);
                        session()->setFlashdata('success', 'Producto Encontrado!');
                        echo view('back/crud/productos_view_2',$data+$datoscat);
                        echo view('front/footer_view');
                        
                    }
                    else{ 
                        $dato['titulo']='Buscar Producto';
                        session()->setFlashdata('success', 'Producto No Encontrado!');
                        return $this->response->redirect(site_url('buscar_producto'));
                    }}}
            
            
    

        public function eliminarProductoLogico($id){
            $ProductoModel=new Producto_Model();
            $data = $ProductoModel->where('id', $id)->first();
            echo $data['eliminado']='SI';
            $ProductoModel->update($id, $data);
            session()->setFlashdata('msg', 'Producto Eliminado de lista!');
			return $this->response->redirect(site_url('menu_productos ')); 
        }

        public function devolverProductoLogico($id){
            $ProductoModel=new Producto_Model();
            $data = $ProductoModel->where('id', $id)->first();
            echo $data['eliminado']='NO';
            $ProductoModel->update($id, $data);
            session()->setFlashdata('msg', 'Producto Agregado a Lista!');
			return $this->response->redirect(site_url('menu_productos ')); 
}

        public function eliminarProducto($id){
            $ProductoModel=new Producto_Model();
            $data = $ProductoModel->where('id', $id)->first();
            $ProductoModel->delete($id);
            session()->setFlashdata('success', 'Producto Eliminado!');
            return $this->response->redirect(site_url('menu_productos ')); 
        }

        
        public function editarProducto($id){
            $input =$this->validate([
                'nombre_prod' =>'required',
                'categoria_id'=>'required',
                'precio'=>'required',
                'precio_vta'=>'required',
                'stock'=>'required',
                'stock_min'=>'required',
                ]);
                $productoModel=new Producto_Model();
         
                if(!$input){
                    $ProductoModel = new Producto_model();
                    $dato['titulo']='Editar Productos';
                    $data['producto'] = $ProductoModel->where('id', $id)->first();
                    echo view('front/navbar_view');
                    echo view('front/head_view',$dato);
                    echo view('back/crud/editar_producto_view',$data, ['validation'=>$this->validator]);
                    echo view('front/footer_view');
                 }

                else{
                    
        
                    $data=[
                        'nombre_prod'=>$this->request->getVar('nombre_prod'),
                        'categoria_id'=>$this->request->getVar('categoria_id'),
                        'precio'=>$this->request->getVar('precio'),
                        'precio_vta'=>$this->request->getVar('precio_vta'),
                        'stock'=>$this->request->getVar('stock'),
                        'stock_min'=>$this->request->getVar('stock_min')];
                        $producto=new Producto_Model();
                        $producto->update($id,$data);
                        session()->setFlashdata('success', 'Producto Editado!');
                        return $this->response->redirect(site_url('menu_productos'));}}
                
                }
                
        

               
    
    
    
    
        ?>
    
   