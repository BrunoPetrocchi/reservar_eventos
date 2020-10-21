<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CelebracaoRequest;
use App\Models\Celebracao;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;

class CelebracaoController extends Controller
{
    
    public function index()
    {
        
        $celebracao = Celebracao::all();
      
        $pessoa = DB::table('pessoas')  
         ->select(DB::raw('count(pessoas.celebracao_id) as celeb,
         pessoas.celebracao_id, celebracaos.id '))
         ->join('celebracaos', 'pessoas.celebracao_id', '=', 'celebracaos.id')
         ->groupBy('pessoas.celebracao_id')  
         ->get();
      
        
       // echo '<pre>';  print_r ($pessoa); echo '</pre>';
        return view('index', compact('celebracao','pessoa'));
    }

    
    public function create()
    {
        $celebracao = Celebracao::all();
        return view('create', compact('celebracao'));
    }

    
    public function store(CelebracaoRequest $request)
    {
      $celebracao = new Celebracao();
      $celebracao->igreja = $request->input('igreja');
      $celebracao->horario = $request->input('horario');
      $celebracao->quantidade = $request->input('quantidade');
      $celebracao->save();
      return redirect()->route('reserva.index');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $celebracao = Celebracao::find($id);
        if(isset($celebracao)){
            return view('edit',compact('celebracao'));
        }
            return route('reserva.index');
    }

    
    public function update(CelebracaoRequest $request, $id)
    {
        $celebracao = Celebracao::find($id);
      
        if(isset($celebracao)){
        $celebracao->igreja = $request->input('igreja');
        $celebracao->horario = $request->input('horario');
        $celebracao->quantidade = $request->input('quantidade');
        $celebracao->save();
       
        }
        //echo '<pre>';        print_r ($celebracao);        echo '</pre>';
        return redirect()->route('reserva.index',compact('celebracao'));
    }

    
    public function destroy($id)
    {
        $celebracao = Celebracao::find($id);
        if(isset($celebracao)){
            $celebracao->delete();
        }
        return redirect()->route('reserva.index');
    }
}
