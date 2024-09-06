<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable=['name','category_id'];

    protected $casts=[
        'category_id'=>'integer'
    ];

    public function category()
    {
        $this->belongsTo(Category::class);
    }

    public function authors()
    {
        $this->belongsToMany(Author::class,'book_authors','author_id','book_id');
    }


    public function delete()
    {
        return parent::delete();
    }
}
