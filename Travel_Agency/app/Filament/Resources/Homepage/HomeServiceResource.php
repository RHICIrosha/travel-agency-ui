<?php

namespace App\Filament\Resources\Homepage;

use App\Filament\Resources\Homepage\Pages\CreateHomeService;
use App\Filament\Resources\Homepage\Pages\EditHomeService;
use App\Filament\Resources\Homepage\Pages\ListHomeServices;
use App\Models\HomeService;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HomeServiceResource extends Resource
{
    protected static ?string $model = HomeService::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;
    protected static ?string $navigationLabel = 'Our Services';
    public static function getNavigationGroup(): ?string { return 'Homepage CMS'; }
    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('icon')->label('Icon (emoji)')->required()->default('🌴'),
            TextInput::make('title')->required(),
            TextInput::make('sort_order')->numeric()->default(0),
            Textarea::make('description')->required()->columnSpanFull()->rows(3),
            FileUpload::make('image_upload')
                ->label('Service Image (File Upload)')
                ->image()
                ->directory('services')
                ->columnSpanFull()
                ->requiredWithout('image_url')
                ->helperText('Upload an image OR enter a URL below'),
            TextInput::make('image_url')
                ->label('Image URL (External Link)')
                ->url()
                ->columnSpanFull()
                ->requiredWithout('image_upload')
                ->helperText('Paste a full https:// URL if not uploading a file above'),
            Toggle::make('is_active')->label('Active')->default(true)->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('icon')->label('Icon'),
                ImageColumn::make('image_url')->label('Image'),
                TextColumn::make('title')->searchable(),
                TextColumn::make('sort_order')->label('Order')->sortable(),
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
            'index'  => ListHomeServices::route('/'),
            'create' => CreateHomeService::route('/create'),
            'edit'   => EditHomeService::route('/{record}/edit'),
        ];
    }
}
