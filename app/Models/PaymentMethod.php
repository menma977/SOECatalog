<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PaymentMethod
 * @package App\Models
 * @property integer id
 * @property string type
 * @property string name
 * @property string description
 * @property string active
 * @property string created_at
 * @property string updated_at
 */
class PaymentMethod extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'type',
    'name',
    'description',
    'active',
    'created_at',
    'updated_at',
  ];

  public function payment()
  {
    $this->hasOne(Payment::class, 'payment_method_id', 'id');
  }
}
