<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'user_name',
        'cpf',
        'phone_number',
        'email'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_code', 'code');
    }
}
