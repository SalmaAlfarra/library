<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'year',
    //     'price',
    //     'quntity',
    //     'active'
    // ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function publisher(){
        return $this->belongsTo(Publisher::class, 'publisher_id','id');
    }

    public function author()
    {
        return $this->belongsToMany(Author::class, 'author_id', 'id');
    }

    public function getActiveStatusAttribute(){

        return $this->active?'Active':'Inactive';
    }
}
