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
      $rules = [
         'nome' => 'required|min:3|max:40',
         'telefone' =>'required',
         'email'=> 'required|email',
         'motivo_contato_id' => 'required',
         'mensagem' => 'required'
      ];

      $message =  [
         'nome.required' => 'O campo nome precisa ser preenchido',
         'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
         'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
         'nome.unique' => 'O nome informado já está em uso',

         'telefone.required' => 'O campo telefone precisa ser preenchido',

         'email.required' => 'O campo email precisa ser preenchido',
         'email.email' => 'O campo email está incorreto',

         'motivo_contato_id.required' => 'O campo motivo contato precisa ser preenchido',

         'mensagem.required' => 'O campo mensagem precisa ser preenchido',

         'required' => 'O campo :attribute deve ser preenchido',
      ];
      
      $request->validate($rules, $message);

      SiteContato::create($request->all());
      
      return redirect()->route('site.index');
   }
}
