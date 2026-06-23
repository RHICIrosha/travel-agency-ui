<?php
namespace App\Filament\Resources\Homepage\Pages;
use App\Filament\Resources\Homepage\FeaturedDestinationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
class EditFeaturedDestination extends EditRecord
{
    protected static string $resource = FeaturedDestinationResource::class;
    protected function getHeaderActions(): array { return [DeleteAction::make()]; }
}
