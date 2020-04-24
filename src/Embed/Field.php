<?php


namespace Alish\Discord\Embed;


use Illuminate\Contracts\Support\Arrayable;

/**
 * @method self name(string $string)
 * @method self value(string $string)
 * @method self inline(bool $bool)
 */
class Field implements Arrayable
{
    use SetProperty, PropertyToArray;

    protected array $toArrayProperties = [
        'name',
        'value',
        'inline'
    ];

    protected string $name;

    protected string $value;

    protected bool $inline;

}
