<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LookupValues extends Model
{
    /**
     * The attributes for define of name table
     * @var string
     */
    protected $table;

    protected $fillable = [
        'type', 'values'
    ];

    /**
     * [__construct description]
     * 
     */
    public function __construct ()
    {
        $this->table = 'lookup_values';
    }
}
