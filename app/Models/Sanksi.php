<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    protected $table = "sanksi";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'kriteria', 'keterangan', 'bobot'];
}
