<?php

namespace BeraniDigitalID\FilamentModelAudit\Commands;

use Illuminate\Console\Command;

class FilamentModelAuditCommand extends Command
{
    public $signature = 'filament-model-audit';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
