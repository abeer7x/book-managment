<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Books extends Model

{
    use HasFactory;
    protected $fillable =['title', 'publish_year', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}