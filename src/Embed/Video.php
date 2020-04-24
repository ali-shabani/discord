<?php


namespace Alish\Discord\Embed;


use Illuminate\Contracts\Support\Arrayable;

/**
 * @method self url(string $string)
 * @method self height(int $int)
 * @method self width(int $int)
 */
class Video implements Arrayable
{
    use SetProperty, PropertyToArray;

    protected array $toArrayProperties = [
        'url',
        'height',
        'width'
    ];

    protected string $url;

    protected int $height;

    protected int $width;

}
