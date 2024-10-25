<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $guarded = ['id'];

    // Relasi dengan model Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
