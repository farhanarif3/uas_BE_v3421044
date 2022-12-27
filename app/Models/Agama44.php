<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama44 extends Model
{
    use HasFactory;

    public $table = 'agama44';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_agama'
    ];

    public function detail()
    {
        return $this->hasMany(Data44::class, 'id_agama', 'id');
    }
}
