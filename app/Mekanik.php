<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mekanik extends Model
{
    /**
     * The attributes for define of name table
     * @var string
     */
    protected $table;

    protected $fillable = [
        'nama', 'no_mekanik'
    ];
    /**
     * [__construct description]
     * 
     */
    public function __construct ()
    {
        $this->table = 'mekaniks';
    }
}
