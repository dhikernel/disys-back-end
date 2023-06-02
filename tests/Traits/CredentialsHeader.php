<?php

namespace Tests\Traits;

trait CredentialsHeader
{
    public function getContentType(): string
    {
        return 'application/json';
    }

    public function getBearer(): string
    {
        return '2|B79clU3VmPASb6lMjTVxMmBSniYW5FFNvKXm8F1s';
    }

    public function getCredentials(): array
    {
        return [
            'Content-Type' => $this->getContentType(),
            'bearer' => $this->getBearer(),
        ];
    }
}
