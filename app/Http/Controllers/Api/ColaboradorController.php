<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ColaboradorRequest;
use App\Models\Colaborador;
use App\Repositories\ColaboradorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColaboradorController extends Controller
{
    /**
     * @var ColaboradorRepository
     */
    private $colaboradorRepository;

    public function __construct(ColaboradorRepository $colaboradorRepository)
    {

        $this->colaboradorRepository = $colaboradorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->colaboradorRepository->getAll();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColaboradorRequest $request)
    {
        try {
            $data = $request->all();

            /**Insert a new  in the table*/
            $colaborador = Colaborador::create($data);

            $success['colaborador'] = $colaborador;
            return response()->json(['success' => $success, 'message' => 'Created successfully'], 200);
        } catch (\Throwable $th) {

            return response()->json([
                'message' => 'Operation Failed!',
                'status' => 'error',
                'code' => 400
            ]);
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
        return Colaborador::find($id);
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
     * @return \Illuminate\Http\Response
     */
    public function update(ColaboradorRequest $request, $id)
    {
        $colaborador = $this->colaboradorRepository->update($id, $request);

        if ($colaborador) {
            $success['colaborador'] = $colaborador;
            return response()->json(['success' => $success, 'message' => 'Update successfully'], 200);
        } else {

            return response()->json([
                'message' => 'Update Operation Failed!',
                'status' => 'error',
                'code' => 400
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colaborador = Colaborador::find($id);
        // deleted product data
        $colaborador->delete();
        // Return Response json data deleted success

        if ($colaborador) {
            return response()->json([
                'message' => 'Colaborador deleted Successfully',
                'status' => 'success',
                'code' => 200
            ]);
        } else {

            return response()->json([
                'message' => 'Delete Operation Failed!',
                'status' => 'error',
                'code' => 400
            ]);
        }
    }

    /**
     * Search for a name
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if ($request->id === null && $request->cpf === null) {
            return response()->json([
                'message' => 'é necessario passar o id ou cpf na busca',
                'status' => 'error',
                'code' => 400
            ]);
        }
        $colaborador = $this->colaboradorRepository->getAllFiltered($request->id, $request->cpf);

        if ($colaborador === null) {
            return response()->json([
                'message' => 'nenhum registro foi localizado',
                'status' => 'error',
                'code' => 400
            ]);
        }

        $data['colaborador'] = $colaborador;
        $data['colaborador']['salarios'] = $colaborador->salarios;

        return response()->json([
            $data,
            'status' => 'success',
            'code' => 200
        ]);
    }
}
