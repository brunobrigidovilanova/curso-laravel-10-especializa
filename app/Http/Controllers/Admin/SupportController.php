<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index( Support $support)
    {

        $supports = $support->all();

        return view('admin/supports/index', compact('supports')); // Devolve todos os dados para a página
    }

    public function show(string|int $id) {
        if (!$support = Support::find($id)) {
            return back(); // "back()" Retorna a ultima rota acessada
        }

        return view('admin/supports/show', compact('support'));
    }

    public function create() // Cria o suporte
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateRequest $request, Support $support) // "Request" Obtem todos os daods da reposição, body, header...
    {
        // dd($request->only(['subject', 'body'])); // Obter campos selecionados
        // dd($request->body) "or" dd($request->get('body')); // Obter apenas um campo
        // dd($request->all()); // obtem todos os dados
        $data = $request->validated(); // Só o que está validado
        $data['status'] = 'a'; // Definindo manualmente o "status"

        $support = $support->create($data);

        return redirect()->route('supports.index'); // Manda paar o index os dados puxados
    }

    public function edit(Support $support, string|int $id) {
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }

        return view('admin/supports/edit', compact('support'));
    }

    public function update(StoreUpdateRequest $request, Support $support, string|int $id) {
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }

        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();

        $support->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id) {
        if (!$support = Support::find($id)) {
            return back();
        }
        $support->delete();

        return redirect()->route('supports.index');
    }
}
