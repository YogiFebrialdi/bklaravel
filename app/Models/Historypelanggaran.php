<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Historypelanggaran extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "historypelanggaran";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama', 'bentuk pelanggaran', 'bobot', 'oleh', 'tgl'];

    public $sortable = [
        'id', 'nama', 'bentuk pelanggaran', 'bobot', 'oleh', 'tgl'
    ];
}
