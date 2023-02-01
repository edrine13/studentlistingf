<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Builder;

class Students extends Model
{
    // protected $fillable = ['first_name', 'last_name','age','email', 'gender'];
    protected $guarded = [];

    use HasFactory, Sortable;
    

    protected $fillable = ['first_name', 'last_name','gender','age', 'email'];

    public $sortable = ['first_name', 'last_name', 'age', 'email', 'created_at', 'gender']; 

    public function scopeSortable(Builder $query, string $sort = 'created_at', string $direction = 'desc')
    {
        return $query->orderBy($sort, $direction);
    }
}
