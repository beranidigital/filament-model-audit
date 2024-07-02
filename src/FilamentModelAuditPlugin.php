<?php

namespace BeraniDigitalID\FilamentModelAudit;

use Filament\Contracts\Plugin;
use Filament\Panel;

class FilamentModelAuditPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-model-audit';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            Resources\AuditTrailResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
