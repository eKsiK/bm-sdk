<?php

namespace BlueMedia\Common\ValueObject;

interface HashableInterface
{
    public function toArray(): array;

    public function getHash(): string;
}
