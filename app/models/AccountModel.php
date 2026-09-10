<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AccountModel extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'role',
        'is_active',
    ];
}