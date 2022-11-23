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
        'id', 'nama', 'kelas_id', 'benpel_id', 'bobot_id', 'oleh', 'tgl'];

    public $sortable = [
        'id', 'nama', 'kelas_id', 'benpel_id', 'bobot_id', 'oleh', 'tgl'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function benpel(){
        return $this->belongsTo(Benpel::class);
    }
}
