<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 * @package App\Models
 * @property integer id
 * @property string first_name
 * @property string last_name
 * @property string address
 */
class Profile extends Model
{
  use HasFactory, SoftDeletes;

  protected $with = ['user'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'first_name',
    'last_name',
    'address',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'profile_id');
  }
}
