<?php
namespace App\Filament\Resources\Homepage\Pages;
use App\Filament\Resources\Homepage\FeaturedDestinationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
class ListFeaturedDestinations extends ListRecords
{
    protected static string $resource = FeaturedDestinationResource::class;
    protected function getHeaderActions(): array { return [CreateAction::make()]; }
}
