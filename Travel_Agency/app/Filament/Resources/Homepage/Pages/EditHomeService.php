<?php

namespace App\Filament\Resources\Homepage\Pages;
use App\Filament\Resources\Homepage\HomeServiceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
class EditHomeService extends EditRecord
{
    protected static string $resource = HomeServiceResource::class;
    protected function getHeaderActions(): array { return [DeleteAction::make()]; }
}
