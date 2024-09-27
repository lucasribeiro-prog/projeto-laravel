<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function adicionar() {
        return view('app.fornecedor.adicionar');
    }

    public function listar() {
        return view('app.fornecedor.listar');
    }
}
