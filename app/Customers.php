<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
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
        'user_id',
        'nama',
        'alamat',
        'no_hp'
    ];

    /**
     * [__construct description]
     * 
     */
    public function __construct ()
    {
        $this->table = 'customers';
    }
}
