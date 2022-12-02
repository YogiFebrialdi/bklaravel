<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Profile extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'name', 'email', 'password'];

    public $sortable = [
        'id', 'name'
    ];
}
