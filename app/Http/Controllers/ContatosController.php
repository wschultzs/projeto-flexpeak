<?php

namespace App\Http\Controllers;

use App\Contatos;
use App\Todo;
use Illuminate\Http\Request;
use DB;
use DataTables;

class ContatosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Recupera os contatos do banco e gera o código para mostrá-los em DataTable
        // Também cria os botões de ação

        if ($request->ajax()) {
            $contacts = Contatos::latest()->get();
            return Datatables::of($contacts)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a class="mr-2" href="'. route('detalhar.contato', $row->id) .'"><button class="btn btn-warning"><i class="fas fa-info"></i></button></a>';
                           $btn .= '<button class="btn btn-primary" class="ml-2" data-toggle="modal" data-target="#edit-contact" data-contato="'.$row->id.'" data-primeironome="'.$row->primeiro_nome.'" data-sobrenome="'.$row->sobrenome.'" data-telefone="'.$row->telefone.'" data-email="'.$row->email.'" data-foto="'.$row->foto.'" data-descricao="'.$row->descricao.'"><i class="fas fa-edit"></i></button>';
                           $btn .= '<a href="'. route('remover.contato', $row->id) .'" class="ml-2"><button class="btn btn-danger"><i class="far fa-trash-alt"></i></button></a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('home');
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
