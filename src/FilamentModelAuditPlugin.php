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

    public function setResourceModel(string $model): static
    {
        Resources\AuditTrailResource::$model = $model;

        return $this;
    }

    public function setResourceNavigationGroup(?string $group): static
    {
        Resources\AuditTrailResource::$navigationGroup = $group;

        return $this;
    }

    public function setResourceNavigationSort(?int $sort): static
    {
        Resources\AuditTrailResource::$navigationSort = $sort;

        return $this;
    }

    public function setResourceNavigationIcon(?string $icon): static
    {
        Resources\AuditTrailResource::$navigationIcon = $icon;

        return $this;
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
