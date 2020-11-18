<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 * @package App\Models
 * @property integer id
 * @property integer role_id
 * @property string email
 * @property string username
 * @property string password
 * @property string avatar
 * @property string phone
 * @property integer profile_id
 * @property boolean suspended
 * @property string created_at
 * @property string updated_at
 */
class User extends Authenticatable
{
  use HasFactory, Notifiable, HasApiTokens, SoftDeletes;

  protected $with = ['role', 'profile'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'email',
    'username',
    'password',
    'avatar',
    'phone',
    'suspended',
    'created_at',
    'updated_at',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'role_id',
    'profile_id',
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  /**
   * protected $casts = [
   * 'email_verified_at' => 'datetime',
   * ];
   */

  public function role()
  {
    return $this->hasMany(Role::class, 'id', 'role_id');
  }

  public function profile()
  {
    return $this->hasOne(Profile::class, 'id', 'profile_id');
  }

  public function order()
  {
    return $this->hasOne(Order::class, 'user_id', 'id');
  }
}
