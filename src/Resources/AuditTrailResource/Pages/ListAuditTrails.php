<?php

namespace BeraniDigitalID\FilamentModelAudit\Resources\AuditTrailResource\Pages;

use BeraniDigitalID\FilamentModelAudit\Resources\AuditTrailResource;
use Filament\Resources\Pages\ListRecords;

class ListAuditTrails extends ListRecords
{
    protected static string $resource = AuditTrailResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
