<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'User';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $fillable = [
        'email', 'first_name','nick_name','middle_name','last_name','password','picture','is_admin','status_id','created_dtm','modified_dtm'
    ];
}
