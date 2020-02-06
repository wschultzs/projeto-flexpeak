<?php

namespace App\Http\Controllers;

use App\Contatos;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = DB::table('contatos')->orderBy('id', 'desc')->get();

        return view('home', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objeto = new Contatos;

        $objeto->primeiro_nome = $request->primeiro_nome;
        $objeto->sobrenome = $request->sobrenome;
        $objeto->telefone = $request->telefone;
        $objeto->email = $request->email;
        $objeto->descricao = $request->descricao;

        $files = $request->file('foto');
      
        $destinationPath = 'uploads/'; 
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $objeto->foto = $profileImage;
        
        $objeto->save();

        return back()->with('contact-added','Seu contato foi adicionado com sucesso!');
    }

    public function show($id)
    {
        $contact = Contatos::find($id);

        return view('details', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = Contatos::find($request->contato);

        $contact->primeiro_nome = $request->primeiro_nome;
        $contact->sobrenome = $request->sobrenome;
        $contact->telefone = $request->telefone;
        $contact->email = $request->email;
        $contact->descricao = $request->descricao;

        $files = $request->file('foto');
      
        $destinationPath = 'uploads/'; 
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $contact->foto = $profileImage;

        $contact->save();

        return back()->with('contact-edited','Seu contato foi atualizado com sucesso!');

    }

    public function destroy($id)
    {
        $contact = Contatos::find($id);
        $contact->delete();

        return back()->with('deleted-contact', 'Seu contato foi deletado com sucesso!');
    }
}
