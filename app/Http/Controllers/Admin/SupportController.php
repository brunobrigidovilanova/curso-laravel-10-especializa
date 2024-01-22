<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index( Support $support)
    {

        $supports = $support->all();

        return view('admin/supports/index', compact('supports')); // Devolve todos os dados para a página
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(Request $request, Support $support) // "Request" Obtem todos os daods da reposição, body, header...
    {
        // dd($request->only(['subject', 'body'])); // Obter campos selecionados
        // dd($request->body) "or" dd($request->get('body')); // Obter apenas um campo
        // dd($request->all()); // obtem todos os dados
        $data = $request->all();
        $data['status'] = 'a'; // Definindo manualmente o "status"

        $support = $support->create($data);

        return redirect()->route('supports.index');
    }
}
