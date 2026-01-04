<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

  protected $fillable = [
        'user_id','first_name','last_name','company','address',
        'city','country','postcode','mobile','email','total_amount'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
