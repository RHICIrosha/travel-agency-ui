<?php

namespace App\Filament\Resources\Homepage;

use App\Filament\Resources\Homepage\Pages\CreateFeaturedDestination;
use App\Filament\Resources\Homepage\Pages\EditFeaturedDestination;
use App\Filament\Resources\Homepage\Pages\ListFeaturedDestinations;
use App\Models\FeaturedDestination;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FeaturedDestinationResource extends Resource
{
    protected static ?string $model = FeaturedDestination::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;
    protected static ?string $navigationLabel = 'Featured Destinations';
    public static function getNavigationGroup(): ?string { return 'Homepage CMS'; }
    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required(),
            TextInput::make('badge_label')->required()->default('Featured'),
            TextInput::make('tagline')->columnSpanFull(),
            Select::make('badge_color')
                ->options([
                    'yellow'  => '🟡 Yellow (Gold)',
                    'emerald' => '🟢 Emerald (Green)',
                    'amber'   => '🟠 Amber (Orange)',
                    'blue'    => '🔵 Blue',
                ])
                ->required()
                ->default('yellow'),
            TextInput::make('sort_order')->numeric()->default(0),
            FileUpload::make('image_upload')
                ->label('Destination Image (File Upload)')
                ->image()
                ->directory('destinations')
                ->columnSpanFull()
                ->requiredWithout('image_url')
                ->helperText('Upload an image OR enter an external URL below'),
            TextInput::make('image_url')
                ->label('Image URL (External Link)')
                ->url()
                ->columnSpanFull()
                ->requiredWithout('image_upload')
                ->helperText('Paste a full https:// URL if not uploading a file above'),
            Toggle::make('is_featured_large')
                ->label('Large Feature Card (shows as the big left card)')
                ->helperText('Only one card should be large at a time.')
                ->columnSpanFull(),
            Toggle::make('is_active')->label('Active')->default(true)->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')->label('Image'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('badge_label')->label('Badge'),
                TextColumn::make('sort_order')->label('Order')->sortable(),
                IconColumn::make('is_featured_large')->label('Large Card')->boolean(),
                IconColumn::make('is_active')->label('Active')->boolean(),
            ])
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListFeaturedDestinations::route('/'),
            'create' => CreateFeaturedDestination::route('/create'),
            'edit'   => EditFeaturedDestination::route('/{record}/edit'),
        ];
    }
}
