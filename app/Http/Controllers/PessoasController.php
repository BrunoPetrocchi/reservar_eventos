<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PessoaRequest;
use App\Models\Pessoa;
use App\Models\Celebracao;

use Illuminate\Support\Facades\DB;

class PessoasController extends Controller
{

    public function store(Request $request)
    {
        $celebracao = Celebracao::all();
        $pessoa = new Pessoa();
        $pessoa->celebracao_id = $request->input('celebracao_id');
        $pessoa->nome = $request->input('nome');
        $pessoa->sobrenome = $request->input('sobrenome');
        $pessoa->quantidade = $request->input('vagas');
        $pessoa->local = $request->input('local');
        $pessoa->email = $request->input('email');
        $pessoa->telefone = $request->input('telefone');
        //echo '<pre>';        print_r ($pessoa);        echo '</pre>';
        $pessoa->save();
        return redirect('participante/'.$pessoa->id);
    }


    public function show($id)
    {
        $celebracao = Celebracao::all();
        $pessoa = Pessoa::find($id); 
          if(isset($pessoa)){      
            return view('participante.show', compact('pessoa','celebracao',));
        }
    }


    public function edit($id)
    {
        $pessoa = Pessoa::all();       
        $celebracao = Celebracao::find($id);     
        $val = $celebracao->quantidade;
      
     //   echo '<pre>';        print_r ($val);        echo '</pre>';
        if(isset($celebracao)){              
            return view('participante.edit', compact('pessoa','celebracao','val'));
        }
            return route('participante.index');
    }

 
    public function update(PessoaRequest $request, $id)
    {
        $pessoa = Pessoa::find($id);
      
        if(isset($pessoa)){
        $pessoa->local = $request->input('local');
        $pessoa->vagas = $request->input('vagas');
        $pessoa->nome = $request->input('nome');
        $pessoa->sobrenome = $request->input('sobrenome');
        $pessoa->email = $request->input('email');
        $pessoa->telefone = $request->input('telefone');
        $pessoa->save();
       
        }
        return redirect()->route('reserva.index',compact('pessoa'));
    }

}
