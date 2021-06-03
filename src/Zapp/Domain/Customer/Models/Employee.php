<?php

namespace Zapp\Domain\Employee\Models;

use Zapp\Domain\Globals\States\EntityOnboarding;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

class Employee extends Model
{
    use HasFactory;
    use HasStates;

    protected $guarded = ['id'];

    protected $casts = [
        'progress' => EntityOnboarding::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isAdmin()
    {
        return (bool) $this->is_admin;
    }

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


}
