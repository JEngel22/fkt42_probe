<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firmen extends Model
{
    use HasFactory;
   	/**
	 * @var array
	 */
    protected $table = "firmen";
	protected $fillable = ['firmenname'];
	public $timestamps = false;
}
