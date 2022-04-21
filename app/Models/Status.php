<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * 
 * @property int $Id
 * @property string $Name
 *
 * @package App\Models
 */
class Status extends Model
{
	protected $table = 'Status';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $fillable = [
		'Name'
	];
}
