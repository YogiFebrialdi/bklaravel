<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Historypelanggaran extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "datasiswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','nis', 'nama', 'kelas', 'bentuk pelanggaran', 'bobot', 'oleh', 'tgl'];

    public $sortable = [
        'id','nis', 'nama', 'kelas', 'bentuk pelanggaran', 'bobot', 'oleh', 'tgl'
    ];
}
