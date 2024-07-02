<?php

namespace BeraniDigitalID\FilamentModelAudit\Resources\AuditTrailResource\Pages;

use BeraniDigitalID\FilamentModelAudit\Resources\AuditTrailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuditTrail extends EditRecord
{
    protected static string $resource = AuditTrailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
