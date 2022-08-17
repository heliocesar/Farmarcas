<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Colaborador
 * 
 * @property int $id
 * @property string|null $email
 * @property string|null $nome_completo
 * @property string|null $cpf
 * @property string|null $rg
 * @property string|null $data_nascimento
 * @property string|null $cep
 * @property string|null $logradouro
 * @property string|null $numero
 * @property string|null $cidade
 * @property string|null $estado
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Salario[] $salarios
 *
 * @package App\Models
 */
class Colaborador extends Model
{
	protected $table = 'colaborador';

	protected $fillable = [
		'email',
		'nome_completo',
		'cpf',
		'rg',
		'data_nascimento',
		'cep',
		'logradouro',
		'numero',
		'cidade',
		'estado'
	];

	public function salarios()
	{
		return $this->hasMany(Salario::class);
	}
}
