<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @property integer id
 * @property string name
 * @property string description
 * @property string meta_title
 * @property string meta_description
 * @property string available_on
 * @property string discontinue_on
 * @property string slug
 * @property string meta_keywords
 * @property integer category_id
 * @property string created_at
 * @property string updated_at
 */
class Product extends Model
{
  use HasFactory, softDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'description',
    'meta_title',
    'meta_description',
    'available_on',
    'discontinue_on',
    'slug',
    'meta_keywords',
    'category_id',
    'created_at',
    'updated_at',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'category_id',
  ];

  public function category()
  {
    return $this->hasOne(Category::class, 'id', 'category_id');
  }

  public function price()
  {
    return $this->hasOne(Price::class, 'product_id', 'id');
  }

  public function order()
  {
    return $this->hasMany(Order::class, 'product_id', 'id');
  }

  public function image()
  {
    return $this->hasMany(ProductImage::class, 'product_id', 'id');
  }
}
