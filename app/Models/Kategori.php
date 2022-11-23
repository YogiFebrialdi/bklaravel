<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Kategori extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "kategori";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'kategori', 'benpel'];

    public $sortable = [
        'id', 'kategori', 'benpel'
    ];
    public function benpel(){
        return $this->hasMany(Benpel::class);
    }
}