<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $guarded = ['id'];

    // Relasi dengan model Page
    public function pages()
    {
        return $this->hasMany(Page::class, 'menu_id');
    }
}
