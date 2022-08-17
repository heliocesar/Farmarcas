<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Salario
 * 
 * @property int $id
 * @property float $salario
 * @property int $colaborador_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Colaborador $colaborador
 *
 * @package App\Models
 */
class Salario extends Model
{
	protected $table = 'salario';

	protected $casts = [
		'id' => 'int',
		'salario' => 'float',
		'colaborador_id' => 'int'
	];

	protected $fillable = [
		'salario',
		'colaborador_id'
	];

	public function colaborador()
	{
		return $this->belongsTo(Colaborador::class);
	}
}
