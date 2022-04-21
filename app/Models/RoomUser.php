<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 *
 * @property int $id
 * @property int $room_id
 * @property int $user_id
 * @property int $status_id
 *
 * @package App\Models
 */
class RoomUser extends Model
{
    use HasFactory;
    protected $table = 'room_user';
	protected $primaryKey = 'id';
	public $timestamps = false;

    protected $fillable = [
        'id','room_id','user_id','status_id'
    ];
}
