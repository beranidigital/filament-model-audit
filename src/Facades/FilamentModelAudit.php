<?php

namespace BeraniDigitalID\FilamentModelAudit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BeraniDigitalID\FilamentModelAudit\FilamentModelAudit
 */
class FilamentModelAudit extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \BeraniDigitalID\FilamentModelAudit\FilamentModelAudit::class;
    }
}
