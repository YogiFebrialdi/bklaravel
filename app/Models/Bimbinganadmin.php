<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Bimbinganadmin extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','tglbim','name','kelas','bimbingan','tanggapan','keterangan'];

        public $sortable = [
            'id','tglbim','keterangan'];
}
