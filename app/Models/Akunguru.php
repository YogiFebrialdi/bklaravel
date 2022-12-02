<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Akunguru extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'name',  'level', 'email', 'password'];

    public $sortable = [
        'id', 'name'];

        public function historypelanggaran(){
            return $this->hasMany(Historypelanggaran::class);
        }
}
