<?php

namespace App\Repositories;

use App\Models\Colaborador;
use App\Models\Salario;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SalarioRepository
{
    public function getAll()
    {
        return Salario::orderBy('created_at', 'ASC')->get();
    }

}
