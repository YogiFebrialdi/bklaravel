<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Daftarsiswa extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "datasiswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nis', 'nama', 'kelas_id', 'jk', 'ttl', 'alamat', 'walimurid', 'telepon'];

    public $sortable = [
        'id', 'nis', 'nama'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

}
