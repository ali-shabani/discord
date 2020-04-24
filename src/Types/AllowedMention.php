<?php


namespace Alish\Discord\Types;

use Alish\Discord\Embed\PropertyToArray;
use Alish\Discord\Embed\SetProperty;
use Illuminate\Contracts\Support\Arrayable;

class AllowedMention implements Arrayable
{
    use SetProperty, PropertyToArray;

    protected array $toArrayProperties = [
        'parse',
        'roles',
        'users'
    ];

    protected array $parse;

    protected array $roles;

    protected array $users;

}
