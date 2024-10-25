<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'peserta';
    protected $guarded = ['id'];

    public function roadRace()
    {
        return $this->belongsTo(RoadRace::class, 'id_road_race');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
