<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Note;

class User extends Authenticatable
{

    use Notifiable;
    protected $table = "users";
    protected $fillable = ["username", "email", "password"];

    public function notes()
    {
        return $this->hasMany(Note::class, "user_id");
    }

}
