<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
// use function PHPUnit\Framework\returnArgument;

class Note extends Model
{
    protected $table = "notes";
    protected $fillable = ["title", "content", "tags", "user_id"];

    protected $casts = [
        'tags' => 'array',
    ];

    protected function users()
    {
        return $this->belongsTo(User::class);
    }

}
