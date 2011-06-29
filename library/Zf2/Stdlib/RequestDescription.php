<?php

namespace Zf2\Stdlib;

interface RequestDescription extends MessageDescription
{
    public function __toString();
    public function fromString($string);
}
