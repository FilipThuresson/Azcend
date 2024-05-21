<?php

namespace Azcend\Models;

class User extends Model
{
    public function __construct($primaryKey = 'id', $id = null)
    {
        parent::__construct("users", $primaryKey, $id);
    }
}