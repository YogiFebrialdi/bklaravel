<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Benpel extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "benpel";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'kategori_id', 'benpel', 'bobot'];

    public $sortable = [
        'id', 'kategori_id', 'benpel'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function historypelanggaran(){
        return $this->hasMany(Historypelanggaran::class);
    }
}
