<?php


namespace Alish\Discord;


use Alish\Discord\Embed\Embed;
use Alish\Discord\Types\AllowedMention;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class WebhookMessage
{

    protected string $type;

    protected string $content;

    protected string $username;

    protected string $avatarUrl;

    protected bool $tts;

    protected string $file;

    protected array $embeds;

    protected string $payloadJson;

    protected AllowedMention $allowedMention;

    protected function __construct($arg, string $type)
    {
        $this->type = $type;

        switch ($type) {
            case 'content':
                $this->content = $arg;
                break;
            case 'embeds':
                $this->embeds = $arg;
                break;
            case 'file':
                $this->file = $arg;
                break;
        }
    }

    public static function content(string $content): self
    {
        return new self($content, 'content');
    }

    public static function embeds(array $embeds): self
    {
        return new self($embeds, 'embeds');
    }

    public static function file(string $file): self
    {
        return new self($file, 'file');
    }

    public function username(string $username)
    {
        $this->username = $username;
    }

    public function avatarUrl(string $avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;
    }

    public function tts(bool $tts): void
    {
        $this->tts = $tts;
    }

    public function allowedMention(AllowedMention $allowedMention): void
    {
        $this->allowedMention = $allowedMention;
    }

    public function payloadJson(array $payload)
    {
        $this->payloadJson = json_encode($payload);
    }

    public function send(string $webhook)
    {
        $method = 'send'.Str::studly($this->type);

        if (method_exists($this, $method)) {
            return $this->$method($webhook);
        }
    }

    protected function toJson($props): array
    {
        $result = [];

        foreach ($props as $prop) {
            if (!isset($this->$prop)) {
                continue;
            }

            $result[$prop] = $this->$prop instanceof Arrayable ? $this->$prop->toArray() : $this->$prop;
        }

        return $result;
    }

    protected function sendContent(string $webhook)
    {
        return Http::post($webhook, $this->toJson([
            'content',
            'username',
            'avatar_url',
            'tts',
            'allowed_mentions'
        ]));
    }

    protected function sendEmbeds(string $webhook)
    {
        $data = $this->toJson([
            'username',
            'avatar_url',
            'tts',
            'allowed_mentions'
        ]);

        $data['embeds'] = $this->arrayEmbeds();

        return Http::post($webhook, $data);
    }

    protected function sendFile(string $webhook)
    {
        Http::attach(
            'file', file_get_contents($this->file)
        )->post($webhook, [
            'username' => $this->username,
            'avatar_url' => $this->avatarUrl,
            'tts' => $this->tts,
            'payload_json' => $this->payloadJson
        ]);
    }

    protected function arrayEmbeds()
    {
        return collect($this->embeds)->map(function (Embed $embed) {
            return $embed->toArray();
        })->toArray();
    }

}
