<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function principal(): string
    {
        return view('principal');
    }

    public function acerca_de(): string
    {
        return view('acerca_de');
    }

    public function login(): string
    {
        return view('login');
    }

    public function quienes_somos(): string
    {
        return view('quienes_somos');
    }

    public function registro(): string
    {
        return view('registro');
    }


    
}
