<?php
require_once __DIR__. '/../helpers/LightORM.php';
class User extends LightORM
{
    // override table name if you want
    protected static $table = 'users';
    protected static $primaryKey = 'id';

    // properties correspond to columns; public so get_object_vars picks them up
    public $id;
    // public $name;
    public $email;
    public $password;
    public $role;
    public $created_at;
    // public $updated_at;

    // optional: if you want only these fields persisted
    // protected $fillable = ['name', 'email', 'created_at', 'updated_at'];

    // optional: if you want to prevent certain fields from being saved
    // protected $guarded = ['id'];
}
