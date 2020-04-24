<?php


namespace Alish\Discord\Embed;


use Illuminate\Contracts\Support\Arrayable;

trait PropertyToArray
{

    public function toArray()
    {
        $result = [];

        foreach ($this->toArrayProperties as $property) {
            if (!isset($this->$property)) {
                continue;

            }

            $result[$property] = $this->convertToArray($this->$property);
        }

        return $result;
    }

    protected function convertToArray($props)
    {
        if (!is_array($props)) {
            return $props instanceof Arrayable ? $props->toArray() : $props;
        }

        $result = [];
        foreach ($props as $prop) {
            if (is_array($prop)) {
                $result[] = $this->convertToArray($prop);
                continue;
            }

            $result[] = $prop instanceof Arrayable ? $prop->toArray() : $prop;
        }

        return $result;
    }

}
