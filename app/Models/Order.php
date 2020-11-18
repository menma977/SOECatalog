<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 * @property integer id
 * @property integer product_id
 * @property integer item_total
 * @property integer total
 * @property integer promotion_id
 * @property integer adjustment_total
 * @property integer user_id
 * @property string completed_at
 * @property integer bill_address_id
 * @property integer ship_address_id
 * @property integer payment_total
 * @property string shipment_state
 * @property string payment_state
 * @property string email
 * @property string special_instructions
 * @property string currency
 * @property string last_ip_address
 * @property integer shipment_total
 * @property integer promo_total
 * @property integer item_count
 * @property string approved_at
 * @property boolean confirmation_delivered
 * @property string canceled_at
 * @property string created_at
 * @property string updated_at
 */
class Order extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'product_id',
    'item_total',
    'total',
    'promotion_id',
    'adjustment_total',
    'user_id',
    'completed_at',
    'bill_address_id',
    'ship_address_id',
    'payment_total',
    'shipment_state',
    'payment_state',
    'email',
    'special_instructions',
    'currency',
    'last_ip_address',
    'shipment_total',
    'promo_total',
    'item_count',
    'approved_at',
    'confirmation_delivered',
    'canceled_at',
    'created_at',
    'updated_at',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'product_id',
    'user_id',
    'promotion_id',
  ];

  public function product()
  {
    $this->hasOne(Product::class, 'id', 'product_id');
  }

  public function user()
  {
    $this->hasOne(User::class, 'id', 'user_id');
  }

  public function payment()
  {
    $this->hasMany(Payment::class, 'order_id', 'id');
  }

  public function promotion() {
    $this->hasOne(Promotion::class, 'id', 'promotion_id');
  }
}
