<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @property integer id
 * @property string name
 * @property string description
 * @property string created_at
 * @property string updated_at
 */
class Category extends Model
{
  use HasFactory, SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'description',
    'created_at',
    'updated_at',
  ];

  public function product()
  {
    return $this->belongsTo(Product::class, 'category_id');
  }
}
