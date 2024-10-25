<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoadRace extends Model
{
    protected $table = 'road_race';
    protected $guarded = ['id'];
    public function peserta()
    {
        return $this->hasMany(Peserta::class, 'id_road_race');
    }

}
