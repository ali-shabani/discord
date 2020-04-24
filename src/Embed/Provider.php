<?php


namespace Alish\Discord\Embed;


use Illuminate\Contracts\Support\Arrayable;

/**
 * @method self url(string $string)
 * @method self name(string $string)
 */
class Provider implements Arrayable
{
    use SetProperty, PropertyToArray;

    protected array $toArrayProperties = [
        'url',
        'name'
    ];

    protected string $url;

    protected string $name;
}
