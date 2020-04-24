<?php


namespace Alish\Discord\Embed;


use Illuminate\Contracts\Support\Arrayable;

/**
 * @method self text(string $string)
 * @method self iconUrl(string $string)
 * @method self proxyIconUrl(string $string)
 */
class Footer implements Arrayable
{
    use SetProperty, PropertyToArray;

    protected array $toArrayProperties = [
        'text',
        'iconUrl',
        'proxyIconUrl'
    ];

    protected string $text;

    protected string $iconUrl;

    protected string $proxyIconUrl;
}
