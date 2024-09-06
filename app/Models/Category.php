<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function books()
    {
        $this->hasMany(Book::class);
    }
    public function delete()
    {
        if(count($this->books)>0)
        {
            foreach ($this->books as $book)
            {
                $book->delete();
            }
        }
        return parent::delete();
    }
}
