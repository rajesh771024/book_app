<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable=['first_name','last_name'];

    public function books()
    {
        $this->belongsToMany(Book::class,'book_authors','book_id','author_id');
    }

    public function delete()
    {

        return parent::delete();
    }
}
