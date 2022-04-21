<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 *
 * @property int $id
 * @property int $room_id
 * @property int $sent_by
 * @property string $message
 * @property string $attachment
 * @property string $status_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 *
 * @package App\Models
 */
class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id','room_id','sent_by','message','attachment','status_id','created_at','updated_at'
    ];


}
