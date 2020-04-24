<?php


namespace Alish\Discord\Embed;


use Illuminate\Contracts\Support\Arrayable;


/**
 * @method self title(string $string)
 * @method self type(string $string)
 * @method self url(string $string)
 * @method self description(string $string)
 * @method self timestamp(int $int)
 * @method self color(int $int)
 * @method self footer(Footer $footer)
 * @method self image(Image $image)
 * @method self thumbnail(Thumbnail $thumbnail)
 * @method self video(Video $video)
 * @method self provider(Provider $provider)
 * @method self author(Author $author)
 * @method self fields(array $fields)
 */
class Embed implements Arrayable
{
    use SetProperty, PropertyToArray;

    /**
     * @var array|string[]
     */
    protected array $toArrayProperties = [
        'title',
        'type',
        'url',
        'description',
        'timestamp',
        'color',
        'footer',
        'image',
        'thumbnail',
        'video',
        'provider',
        'author',
        'fields',
    ];

    protected string $title;

    protected string $type;

    protected string $url;

    protected string $description;

    protected int $timestamp;

    protected int $color;

    protected Footer $footer;

    protected Image $image;

    protected Thumbnail $thumbnail;

    protected Video $video;

    protected Provider $provider;

    protected Author $author;

    protected array $fields;

    public function addField(Field $field)
    {
        if(!isset($this->fields)) {
            $this->fields = [];
        }

        $this->fields[] = $field;
        return $this;
    }

    public function hexColor(string $hex)
    {
        $this->color = hexdec($hex);
        return $this;
    }
}
