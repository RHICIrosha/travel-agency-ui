<?php

namespace App\Filament\Resources\Homepage;

use App\Filament\Resources\Homepage\Pages\CreateWhyUsItem;
use App\Filament\Resources\Homepage\Pages\EditWhyUsItem;
use App\Filament\Resources\Homepage\Pages\ListWhyUsItems;
use App\Models\WhyUsItem;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WhyUsItemResource extends Resource
{
    protected static ?string $model = WhyUsItem::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;
    protected static ?string $navigationLabel = 'Why Choose Us';
    public static function getNavigationGroup(): ?string { return 'Homepage CMS'; }
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('icon')->label('Icon (emoji)')->required()->default('✨'),
            TextInput::make('title')->required(),
            TextInput::make('sort_order')->numeric()->default(0),
            Textarea::make('description')->required()->columnSpanFull()->rows(3),
            Toggle::make('is_active')->label('Active')->default(true)->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('icon')->label('Icon'),
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
            'index'  => ListWhyUsItems::route('/'),
            'create' => CreateWhyUsItem::route('/create'),
            'edit'   => EditWhyUsItem::route('/{record}/edit'),
        ];
    }
}
