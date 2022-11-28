<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Bimbingansiswa extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = "form";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','tglbim','nama','kelas','bimbingan','tanggapan','keterangan'];

    public $sortable = [
        'id','tglbim','keterangan'];
}
