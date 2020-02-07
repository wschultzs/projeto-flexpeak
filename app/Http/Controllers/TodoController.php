<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contatos;
use App\Todo;

class TodoController extends Controller
{
    // Armazena uma nova tarefa no banco de dados e retorna para a página anterior com uma mensagem de sucesso
    public function store(Request $request) {
        $todo = new Todo;
        $todo->descricao = $request->task;
        $todo->contato_id = $request->contato_id;

        $todo->save();

        return back()->with('task-added', 'Tarefa adicionada com sucesso!');

    }

    // Remove uma tarefa do banco de dados e retorna para a página anterior com uma mensagem de sucesso
    public function destroy($id) {
        $todo = Todo::find($id);
        $todo->delete();

        return back()->with('deleted-task', 'Tarefa deletado com sucesso!');
    }
}
