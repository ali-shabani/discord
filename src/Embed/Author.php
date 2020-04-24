<?php


namespace Alish\Discord\Embed;


use Illuminate\Contracts\Support\Arrayable;

/**
 * @method self name(string $string)
 * @method self iconUrl(string $string)
 * @method self url(string $string)
 * @method self proxyIconUrl(string $string)
 */
class Author implements Arrayable
{
    use SetProperty, PropertyToArray;

    protected array $toArrayProperties = [
        'name',
        'iconUrl',
        'url',
        'proxyIconUrl',
    ];

    protected string $name;

    protected string $url;

    protected string $iconUrl;

    protected string $proxyIconUrl;

}
