<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Inputpelanggaran extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "datasiswas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nisn', 'nama', 'kelas'];

    public $sortable = [
        'id', 'nisn', 'nama', 'kelas'
    ];
}
