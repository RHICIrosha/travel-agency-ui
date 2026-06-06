<?php

namespace App\Filament\Resources\Tours\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class TourForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('destination_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('duration_days')
                    ->required()
                    ->numeric(),
                FileUpload::make('image_url')
                    ->image(),
                TextInput::make('suitable_for')
                    ->placeholder('e.g., Family, Couple & Friends'),
                TagsInput::make('inclusions')
                    ->placeholder('e.g., Accommodation, Airport Pick-up'),
                TagsInput::make('themes')
                    ->placeholder('e.g., Beach, City Tours, Culture'),
                Repeater::make('itineraries')
                    ->relationship()
                    ->schema([
                        TextInput::make('day_number')
                            ->required()
                            ->numeric(),
                        TextInput::make('location_name')
                            ->required(),
                        TextInput::make('title')
                            ->required(),
                        Textarea::make('description')
                            ->columnSpanFull(),
                        TagsInput::make('activities')
                            ->placeholder('e.g., Airport pickup, Explore Fort')
                            ->columnSpanFull(),
                        FileUpload::make('image_url')
                            ->image(),
                        TextInput::make('travel_time')
                            ->placeholder('e.g., 4 Hrs Travel'),
                    ])
                    ->columnSpanFull()
                    ->defaultItems(1)
                    ->collapsible(),
            ]);
    }
}
