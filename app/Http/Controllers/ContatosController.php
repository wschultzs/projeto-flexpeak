<?php

namespace App\Http\Controllers;

use App\Contatos;
use App\Todo;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ContatosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = DB::table('contatos')->orderBy('id', 'desc')->paginate(10);

        return view('home', compact('contacts'));
    }

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

        $todo = Todo::where('contato_id', $id)->orderBy('id', 'desc')->get();
        return view('details', compact('contact', 'todo'));
    }

    public function update(Request $request)
    {
        $contact = Contatos::find($request->contato);

        $contact->primeiro_nome = $request->primeiro_nome;
        $contact->sobrenome = $request->sobrenome;
        $contact->telefone = $request->telefone;
        $contact->email = $request->email;
        $contact->descricao = $request->descricao;

        if($request->file('foto')){
            $files = $request->file('foto');
            $destinationPath = 'uploads/'; 
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $contact->foto = $profileImage;
        }

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
