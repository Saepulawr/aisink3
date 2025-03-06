<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class K3 extends Model
{

    use HasFactory;

    protected $table = 'k3s';

    protected $fillable = [
        'date',
        'labour_accident',
        'small_accident',
        'traffic_accident',
        'near_miss',
        'pak',
        'jumlah_pekerja',
        'jam_kerja_aman',
        'hari_kerja_aman',
        'running_text'
    ];
}
