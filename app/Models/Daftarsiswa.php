<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Daftarsiswa extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "datasiswas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nisn', 'nama', 'kelas', 'jk', 'ttl', 'alamat', 'walimurid', 'telepon'];

    public $sortable = [
        'id', 'nisn', 'nama', 'kelas', 'jk', 'ttl', 'alamat', 'walimurid', 'telepon'
    ];
    
}
