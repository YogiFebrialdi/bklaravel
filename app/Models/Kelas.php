<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Kelas extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "kelas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'kelas', 'siswa', 'pelanggaran', 'poin'];

    public $sortable = [
        'id', 'kelas', 'siswa', 'pelanggaran', 'poin'];

    public function datasiswa(){
        return $this->hasMany(Datasiswa::class);
    }

    public function daftarsiswa(){
        return $this->hasMany(Daftarsiswa::class);
    }

    public function inputpelanggaran(){
        return $this->hasMany(Inputpelanggaran::class);
    }

    public function historypelanggaran(){
        return $this->hasMany(Historypelanggaran::class);
    }
}
