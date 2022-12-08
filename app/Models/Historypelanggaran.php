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
        'id', 'siswa_id', 'kelas', 'benpel_id', 'guru_id', 'tgl', 'bobot'];

    public $sortable = [
        'id', 'siswa_id', 'kelas', 'benpel_id', 'guru_id', 'tgl', 'bobot'
    ];

    // public function kelas(){
    //     return $this->belongsTo(Kelas::class);
    // }

    public function benpel(){
        return $this->belongsTo(Benpel::class, 'benpel_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", "guru_id", "id");
    }

    public function siswa()
    {
        return $this->belongsTo("App\Models\Datasiswa", "siswa_id", "id");
    }
}
