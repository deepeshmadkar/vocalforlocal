<?php

namespace App\Models;

use Zapp\Domain\User\States\UserOnboardingState;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\ModelStates\HasStates;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasStates;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phoneno',
        'parcel',
        'has_blocked',
        'has_deleted',
        'is_active',
        'social_id',
        'social_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => UserOnboardingState::class,
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isBlocked()
    {
        return (bool) $this->has_blocked;
    }

    public function isDeleted()
    {
        return (bool) $this->has_deleted;
    }

    public function isVerified()
    {
        return !in_array(false, [!$this->isBlocked(), !$this->isDeleted(), (bool) $this->is_active]);
    }

    public function assignRole()
    {
        if($this->role->name() == 'unassigned'){
            $this->role->transitionTo($this->usertype);
            $this->usertype = $this->role->name();
            $this->update();
        }
    }

    public function usermanager()
    {
        return $this->hasOne(Usermanager::class);
    }

    public function userIsOfType()
    {
        return $this->role->name();
    }

    public function details() {
        return $this->role->details();
    }

    public function zId() {
        return $this->details()->id ?? null;
    }
}
