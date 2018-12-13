<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transacao;
use App\Categoria;
use App\User;
use Illuminate\Support\Facades\Auth;

class TransacaoController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $meses = array();
      $meses[] = '';
      $meses[] = 'Janeiro';
      $meses[] = 'Fevereiro';
      $meses[] = 'Março';
      $meses[] = 'Abril';
      $meses[] = 'Maio';
      $meses[] = 'Junho';
      $meses[] = 'Julho';
      $meses[] = 'Agosto';
      $meses[] = 'Setembro';
      $meses[] = 'Outubro';
      $meses[] = 'Novembro';
      $meses[] = 'Dezembro';

        return view('transacao.index')->with('user',User::find(Auth::user()->id))
        ->with('transacoes',Transacao::where('user_id','=',Auth::user()->id)->orderBy('data')->get())
        ->with('meses',$meses)
        ->with('filtromes','0')
        ->with('filtrocategoria','0')
        ->with('filtroano','0')
        ->with('categorias',Categoria::all());
    }

    public function indexFiltrado(Request $request){
      if($request['mes'] == '0' && $request['categoria']=='0' && $request['ano']=='0')
        return redirect()->route('transacao.index');
      $meses = array();
      $meses[] = '';
      $meses[] = 'Janeiro';
      $meses[] = 'Fevereiro';
      $meses[] = 'Março';
      $meses[] = 'Abril';
      $meses[] = 'Maio';
      $meses[] = 'Junho';
      $meses[] = 'Julho';
      $meses[] = 'Agosto';
      $meses[] = 'Setembro';
      $meses[] = 'Outubro';
      $meses[] = 'Novembro';
      $meses[] = 'Dezembro';
      $query = new Transacao;
      $query = $query->where('user_id','=',Auth::user()->id);
      if($request['categoria']!='0')
        $query = $query->where('categoria_id','=',$request['categoria']);
      if($request['mes'] != '0')
        $query = $query->whereMonth('data', '=', $request['mes']);
      if ($request['ano']!='0')
        $query = $query->whereYear('data', '=', $request['ano']);
      $transacoes = $query->orderBy('data')->get();


      return view('transacao.index')->with('user',User::find(Auth::user()->id))
      ->with('transacoes',$transacoes)
      ->with('meses',$meses)
      ->with('filtromes',$request['mes'])
      ->with('filtrocategoria',$request['categoria'])
      ->with('filtroano',$request['ano'])
      ->with('categorias',Categoria::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $user = User::find(Auth::user()->id);
      if($request->has('gasto')){
        return view('transacao.createGasto')
        ->with('user',$user)
        ->with('categorias',Categoria::all());
      }else {
        return view('transacao.createRenda')->with('user',User::find(Auth::user()->id))->with('categorias',Categoria::all());
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $t = new Transacao;
      $t->user_id = Auth::user()->id;
      if($request->has('gasto'))
        $t->tipo = 1;
      else $t->tipo = 0;

      $t->fill($request->all());
      $t->save();

      return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $transacao = Transacao::find($id);
      if($transacao->tipo==1){
        return view('transacao.editGasto')->with('categorias',Categoria::all())->with('user',User::find(Auth::user()->id))
        ->with('transacao',$transacao);
      }else {
        return view('transacao.editRenda')->with('categorias',Categoria::all())->with('user',User::find(Auth::user()->id))
        ->with('transacao',$transacao);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transacao = Transacao::find($id);
        $transacao->fill($request->all());
        $transacao->save();

        return redirect()->route('transacao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transacao = Transacao::find($id);
        $transacao->delete();
        return redirect()->route('transacao.index');
    }
}
