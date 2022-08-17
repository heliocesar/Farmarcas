<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SalarioRequest;
use App\Models\Colaborador;
use App\Models\Salario;
use App\Repositories\SalarioRepository;
use Illuminate\Http\Request;

class SalarioController extends Controller
{
    /**
     * @var SalarioRepository
     */
    private $salarioRepository;

    public function __construct(SalarioRepository $salarioRepository)
    {

        $this->salarioRepository = $salarioRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->salarioRepository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $colaborador = Colaborador::find($request->colaborador_id);
            
            if($colaborador === null){
                return response(['message' => 'Colaborador não existe'], 400);
            }
            
            $data = $request->all();
            /**Insert a new  in the table*/
            $salario = Salario::create($data);
            $success['salario'] = $salario;
            return response()->json(['success' => $success, 'message' => 'Created successfully'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'error'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Salario::find($id);
    }

}
