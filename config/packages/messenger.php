<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // When execute `symfony server:start` command
    if ($containerConfigurator->env() === 'local') {
        $containerConfigurator->extension('framework', [
            'messenger' => [
                'transports' => [
                    'async_priority_normal'
                ],
            ],
        ]);

        return;
    }

    $containerConfigurator->extension('framework', [
        'messenger' => [
            'transports' => [
                'async' => '%env(MESSENGER_TRANSPORT_DSN)%',
            ],
            'routing' => [
                \App\Message\RequestCapture::class => 'async',
            ],
        ],
    ]);
};
