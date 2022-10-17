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
        'id', 'kategori', 'benpel', 'bobot'];

    public $sortable = [
        'id', 'kategori', 'benpel'
    ];
}
