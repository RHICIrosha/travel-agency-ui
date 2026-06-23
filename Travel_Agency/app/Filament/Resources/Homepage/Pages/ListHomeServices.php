<?php

namespace App\Filament\Resources\Homepage\Pages;

use App\Filament\Resources\Homepage\HomeServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomeServices extends ListRecords
{
    protected static string $resource = HomeServiceResource::class;
    protected function getHeaderActions(): array { return [CreateAction::make()]; }
}
