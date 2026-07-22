<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages\ManageSiteSettings;
use App\Models\SiteSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;
    protected static ?string $navigationLabel = 'Site Settings';
    public static function getNavigationGroup(): ?string { return 'Settings'; }
    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Contact Information')
                ->description('Manage phone, email, and address for the contact page and footer.')
                ->collapsible()
                ->columns(2)
                ->schema([
                    TextInput::make('contact_phone')->label('Contact Phone')->required(),
                    TextInput::make('contact_email')->label('Contact Email')->email()->required(),
                    Textarea::make('contact_address')->label('Contact Address')->columnSpanFull()->rows(3)->required(),
                ]),

            Section::make('Footer Details')
                ->description('Manage text displayed in the website footer.')
                ->collapsible()
                ->columns(1)
                ->schema([
                    Textarea::make('footer_about_text')->label('Footer About Text')->rows(4)->required(),
                ]),

            Section::make('Social Links')
                ->description('Manage social media links (leave "#" if you do not have a link).')
                ->collapsible()
                ->columns(2)
                ->schema([
                    TextInput::make('social_facebook')->label('Facebook URL')->nullable(),
                    TextInput::make('social_twitter')->label('Twitter / X URL')->nullable(),
                    TextInput::make('social_instagram')->label('Instagram URL')->nullable(),
                    TextInput::make('social_linkedin')->label('LinkedIn URL')->nullable(),
                    TextInput::make('social_whatsapp')->label('WhatsApp URL')->nullable(),
                    TextInput::make('social_youtube')->label('YouTube URL')->nullable(),
                ]),

            Section::make('Destinations Page Hero')
                ->description('Manage the hero section content on the Destinations page.')
                ->collapsible()
                ->columns(2)
                ->schema([
                    TextInput::make('destinations_hero_subtitle')->label('Subtitle')->required(),
                    TextInput::make('destinations_hero_title')->label('Title')->required(),
                    \Filament\Forms\Components\FileUpload::make('destinations_hero_image')
                        ->label('Hero Image')
                        ->image()
                        ->directory('settings')
                        ->columnSpanFull()
                        ->nullable(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([])->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageSiteSettings::route('/'),
        ];
    }
}
