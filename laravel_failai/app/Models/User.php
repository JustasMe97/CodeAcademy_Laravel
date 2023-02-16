<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public const ROLE_ADMIN   = 'admin';
    public const ROLE_USER    = 'user';
    public const ROLE_MANAGER = 'manager';
    public const ROLE_PM      = 'prod_manager';

    public const ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_USER,
        self::ROLE_MANAGER,
        self::ROLE_PM,
    ];

    public const ROLE_DEFAULT = self::ROLE_USER;


    protected  $guarded = [
        'role',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function person(): HasMany
    {
        return $this->hasMany(Person::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function SetPasswordAttribute($password){
        if(trim($password)===''){
            return;
        }
        $this->attributes['password']=Hash::make($password);
    }
}





