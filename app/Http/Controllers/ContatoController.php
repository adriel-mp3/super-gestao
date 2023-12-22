<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
   public function contato(Request $request)
   {
      $motivo_contatos = MotivoContato::all();
      
      return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
   }

   public function salvar(Request $request)
   {
      $request->validate([
         'nome' => 'required|min:3|max:40',
         'telefone' =>'required',
         'email'=> 'required',
         'motivo_contato' => 'required',
         'mensagem' => 'required'
      ]);

      SiteContato::create($request->all());
   }
}
