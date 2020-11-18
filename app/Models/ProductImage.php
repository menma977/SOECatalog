<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductImage
 * @package App\Models
 * @property integer id
 * @property integer product_id
 * @property string file
 * @property string created_at
 * @property string updated_at
 */
class ProductImage extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'product_id',
    'file',
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
  ];

  public function product()
  {
    return $this->belongsTo(Product::class, 'id');
  }
}
