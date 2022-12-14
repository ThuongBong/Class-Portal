<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassesUser extends Model
{
    use HasFactory;
    protected $table = 'classes_users';
    protected $primaryKey = 'id';
    protected $keyType ='integer';

    protected $fillable = [
        'user_id', 'class_id'
    ];

    public function student()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
