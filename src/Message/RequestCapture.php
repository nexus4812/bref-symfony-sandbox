<?php

namespace App\Message;

readonly class RequestCapture
{
    public function __construct(
        public string $path,
        public array $header,
        public array $query,
    )
    {
    }
}
