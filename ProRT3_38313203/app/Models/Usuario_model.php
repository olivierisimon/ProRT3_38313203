<?php
namespace App\Models;
use CodeIgniter\Model;

class Usuario_model extends Model
{
	protected $table = 'usuario';//defino la variable de la tabla con los usuarios
    protected $primaryKey = 'id_usuario';//llave primaria id
    protected $allowedFields = ['nombre', 'apellido',  'email', 'contraseña','id_tipoUsuario','id_estado'];//campos de la tabla
}