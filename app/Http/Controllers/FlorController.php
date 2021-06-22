<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlorController extends Controller
{
    private $flor =[
        ['id' => 1, 'nome'=>'Rosa'],
        ['id' => 2, 'nome'=>'Cravo'],
        ['id' => 3, 'nome'=>'Papoula'],
        ['id' => 4, 'nome'=>'Crisantemo']
    ];
    public function __construct(){
        $flor = session('flor');
        if(!isset($flor)) {
            session(['flor' => $this->flor]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $flor = session('flor');
       $titulo = 'Floricultura';
      // return view('flor.index', compact(['flor', 'titulo']));
       return view('flor.index', ['flor'=>$flor, 'titulo'=>$titulo]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flor = session('flor');
        $id = count($flor) + 1;
        $nome = $request->nome;
        $dados = ['id' =>$id, 'nome'=>$nome];
        $flor[] = $dados;
        session(['flor' => $flor]);
        return redirect()->route('flor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flor = session('flor');
        $flor = $flor[$id - 1];
        return view('flor.info', compact(['flor']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $flor = session('flor');
        $index = $this->getIndex($id, $flor);
        $flor = $flor[$index];
        return view('flor.edit', compact(['flor']));
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
        $flor = session('flor');
        $index = $this->getIndex($id, $flor);
        $flor[$index]['nome'] = $request->nome;
        session(['flor' => $flor]);
        return redirect()->route('flor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flor = session('flor');
        $index = $this->getIndex($id, $flor);
        array_splice($flor, $index, 1);
        session(['flor' => $flor]);
        return redirect()->route('flor.index');
    }

    private function getIndex($id, $flor){
        $ids = array_column($flor, 'id');
        $index = array_search($id, $ids);
        return $index;
    }
}
