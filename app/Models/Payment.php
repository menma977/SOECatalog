<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * @package App\Models
 * @property integer id
 * @property integer amount
 * @property integer order_id
 * @property integer payment_method_id
 * @property string state
 * @property string response_code
 * @property string avs_response
 * @property string cvv_response_code
 * @property string cvv_response_message
 * @property string created_at
 * @property string updated_at
 */
class Payment extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'amount',
    'order_id',
    'payment_method_id',
    'state',
    'response_code',
    'avs_response',
    'cvv_response_code',
    'cvv_response_message',
    'created_at',
    'updated_at',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'order_id',
    'payment_method_id',
  ];

  public function order()
  {
    $this->hasOne(Order::class, 'id', 'order_id');
  }

  public function paymentMethod()
  {
    $this->hasOne(PaymentMethod::class, 'id', 'payment_method_id');
  }
}
