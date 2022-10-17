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
        'id', 'kelas'];
}
