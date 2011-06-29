<?php

namespace Zf2\Stdlib;

interface ResponseDescription extends MessageDescription
{
    public function __toString();
    public function fromString($string);

    // send? or emit?
    public function send();
}
