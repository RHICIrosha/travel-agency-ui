<?php

namespace App\Filament\Resources\ReviewResource\Pages;

use App\Filament\Resources\ReviewResource;
use Filament\Resources\Pages\ListRecords;

class ListReviews extends ListRecords
{
    protected static string $resource = ReviewResource::class;

    protected static ?string $title = 'Customer Reviews';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
