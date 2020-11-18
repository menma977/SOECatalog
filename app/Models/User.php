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
 * @property string email
 * @property string username
 * @property string password
 * @property string avatar
 * @property string phone
 * @property integer profile_id
 * @property boolean suspended
 */
class User extends Authenticatable
{
  use HasFactory, Notifiable, HasApiTokens, SoftDeletes;

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
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'profile_id',
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];


  public function profile()
  {
    $this->hasOne(Profile::class, 'id', 'profile_id');
  }
}
