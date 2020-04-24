<?php


namespace Alish\Discord\Embed;


use Illuminate\Contracts\Support\Arrayable;

/**
 * @method self url(string $string)
 * @method self proxyUrl(string $string)
 * @method self height(int $int)
 * @method self width(int $int)
 */
class Thumbnail implements Arrayable
{
    use SetProperty, PropertyToArray;

    protected array $toArrayProperties = [
        'url',
        'proxyUrl',
        'height',
        'width'
    ];

    protected string $url;

    protected string $proxyUrl;

    protected int $height;

    protected int $width;

}
