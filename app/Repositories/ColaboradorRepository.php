<?php

namespace App\Repositories;

use App\Models\Colaborador;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ColaboradorRepository
{
    public function getAll()
    {
        return Colaborador::orderBy('created_at', 'ASC')->get();
    }

    public function getAllFiltered($id = null, $cpf = null)
    {
        $query = Colaborador::whereNotNull('id');
        
        if($id !== null){
            $query->where('id', "{$id}");
        }
        
        if($cpf !== null){
            $query->where('cpf', "{$cpf}");
        }

        return $query->first();
    }

    public function getById($id)
    {
        return Colaborador::findOrFail($id);
    }

  
    public function update($id, $newDetails)
    {
        try {
            DB::beginTransaction();
            $colaborador = Colaborador::find($id);
            $colaborador->update($newDetails->all());
            DB::commit();
            return $colaborador;
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Erro ao atualizar: ' . $exception->getMessage());
            dd($exception->getMessage());
        }
    }


}
