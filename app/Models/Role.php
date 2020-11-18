<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 * @property integer id
 * @property string name
 * @property string created_at
 * @property string updated_at
 */
class Role extends Model
{
  use HasFactory;

  protected $with = ['user'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'role');
  }
}
