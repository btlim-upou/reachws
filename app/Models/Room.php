<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $status_id
 *
 * @package App\Models
 */
class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','name','description','status_id'
    ];
}
