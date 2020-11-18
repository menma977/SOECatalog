<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Promotion
 * @package App\Models
 * @property integer id
 * @property string name
 * @property string description
 * @property string start_at
 * @property string end_at
 * @property integer usage_limit
 * @property string code
 * @property string created_at
 * @property string updated_at
 */
class Promotion extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'description',
    'start_at',
    'end_at',
    'usage_limit',
    'code',
    'created_at',
    'updated_at',
  ];

  public function order()
  {
    return $this->belongsTo(Order::class, 'promotion_id', 'id');
  }
}
