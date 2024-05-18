<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function Laravel\Prompts\password;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function signinCheck($signinData)
    {

        $checkEmail = User::query()
            ->where('email', $signinData['email'])
            ->get()[0];
        if (password_verify($signinData['password'], $checkEmail['password'])) return $checkEmail['id'];
        return false;
    }

    public function signupCheck($phone, $email): bool
    {
        $checkEmail = User::query()->where('email', $email)->exists();
        $checkPhone = User::query()->where('phone', $phone)->exists();
        if ($checkPhone) return false;
        if ($checkEmail) return false;
        return true;
    }

    public function signup($userData, $role = 'client'): bool
    {
        unset($userData['_token']);
        unset($userData['rePassword']);

        $userData['role'] = $role;
        $userData['created_at'] = date('Y-m-d H-i-s');
        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        if (User::query()->insert($userData)) return true;
        else return false;
    }

    public function getUserData($id)
    {
        return User::query()
            ->select('*')
            ->where('id', '=', $id)
            ->get()
            ->toArray()[0];
    }


}

