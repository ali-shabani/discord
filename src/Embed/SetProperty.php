<?php


namespace Alish\Discord\Embed;


trait SetProperty
{

    public function __call($name, $arguments)
    {

        if (property_exists($this, $name)) {
            $this->$name = $arguments[0];
        }

        return $this;
    }

    public static function __callStatic($name, $arguments)
    {
        $concrete = new self();

        return $concrete->$name(...$arguments);
    }

}
