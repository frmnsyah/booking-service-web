<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * The attributes for define of name table
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kategori'
    ];

    /**
     * [__construct description]
     * 
     */
    public function __construct ()
    {
        $this->table = 'categories';
    }
}
