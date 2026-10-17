#!/usr/bin/env bash
# Creates List/Create/Edit page classes for a resource: make-filament-pages.sh Folder Model [noCreate]
set -e
F=$1; M=$2; NC=$3
D=app/Filament/Resources/$F/Pages; mkdir -p $D
P=$(echo $M | sed -E 's/y$/ie/')s; [ "$M" = "Media" ] && P=Media
cat > $D/List$P.php <<PHP
<?php

namespace App\Filament\Resources\\$F\Pages;

use App\Filament\Resources\\$F\\${M}Resource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class List$P extends ListRecords
{
    protected static string \$resource = ${M}Resource::class;

    protected function getHeaderActions(): array
    {
        return $( [ -n "$NC" ] && echo "[]" || echo "[CreateAction::make()]" );
    }
}
PHP
[ -n "$NC" ] || cat > $D/Create$M.php <<PHP
<?php

namespace App\Filament\Resources\\$F\Pages;

use App\Filament\Resources\\$F\\${M}Resource;
use Filament\Resources\Pages\CreateRecord;

class Create$M extends CreateRecord
{
    protected static string \$resource = ${M}Resource::class;
}
PHP
cat > $D/Edit$M.php <<PHP
<?php

namespace App\Filament\Resources\\$F\Pages;

use App\Filament\Resources\\$F\\${M}Resource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class Edit$M extends EditRecord
{
    protected static string \$resource = ${M}Resource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
PHP
