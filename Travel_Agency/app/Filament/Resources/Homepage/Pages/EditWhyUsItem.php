<?php

namespace App\Filament\Resources\Homepage\Pages;

use App\Filament\Resources\Homepage\WhyUsItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWhyUsItem extends EditRecord
{
    protected static string $resource = WhyUsItemResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
