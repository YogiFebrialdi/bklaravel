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
        'id', 'nama', 'kelas', 'benpel_id', 'bobot_id', 'level_id', 'tgl'];

    public $sortable = [
        'id', 'nama', 'kelas', 'benpel_id', 'bobot_id', 'level_id', 'tgl'
    ];

    // public function kelas(){
    //     return $this->belongsTo(Kelas::class);
    // }

    public function benpel(){
        return $this->belongsTo(Benpel::class, 'benpel_id', 'id');
    }

    public function akunguru(){
        return $this->belongsTo(Akunguru::class, 'level_id', 'id');
    }
}
