<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Passport\HasApiTokens;
use Illuminate\Auth\Authenticatable;

class People extends Model implements AuthenticatableContract
{
    use Authenticatable, HasApiTokens;

    protected $connection= 'sqlsrv';
    protected $table = 'people';
    protected $fillable = ['id', 'name'];
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = false;
}
