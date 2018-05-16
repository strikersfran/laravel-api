<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //buscar todos los registros
        $clientes=Client::where(function ($query) use ($request) {
                        $query->where('name','like','%'.$request->search.'%')
                              ->orWhere('description','like','%'.$request->search.'%')
                              ->orWhere('status','like','%'.$request->search.'%');
                    })
                    ->orderBy((empty($request->sort)?'name':$request->sort),(empty($request->order)?'ASC':$request->order))
                    ->paginate(config('numreg'));

        return view('client/index')->with(['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Update el status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request,$id)
    {
        $client=Client::find($id);
        
        if($client->status=='ACTIVO'){
            $client->status='INACTIVO';
        }
        else{
            $client->status='ACTIVO';
        }
        
        $client->update();
        
        return redirect()->back();
    }
}
