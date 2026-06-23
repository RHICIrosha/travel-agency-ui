<?php

namespace App\Filament\Resources\Homepage\Pages;

use App\Filament\Resources\Homepage\WhyUsItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWhyUsItems extends ListRecords
{
    protected static string $resource = WhyUsItemResource::class;

    protected function getHeaderActions(): array
    {
        return [CreateAction::make()];
    }
}
