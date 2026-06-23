<?php

namespace App\Filament\Resources\Homepage;

use App\Filament\Resources\Homepage\Pages\ManageHomepageSettings;
use App\Models\HomepageSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;

class HomepageSettingResource extends Resource
{
    protected static ?string $model = HomepageSetting::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;
    protected static ?string $navigationLabel = 'Homepage Settings';
    public static function getNavigationGroup(): ?string { return 'Homepage CMS'; }
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('🦸 Hero Section')
                ->description('Controls the main banner at the top of the homepage.')
                ->collapsible()
                ->columns(2)
                ->schema([
                    TextInput::make('hero_badge')->label('Badge Text')->columnSpanFull(),
                    TextInput::make('hero_heading_line1')->label('Heading Line 1 (white)'),
                    TextInput::make('hero_heading_highlight')->label('Heading Highlight (gold)'),
                    TextInput::make('hero_heading_line2')->label('Heading Line 2 (white)'),
                    Textarea::make('hero_subtext')->label('Subtext paragraph')->columnSpanFull()->rows(3),
                    FileUpload::make('hero_image_1')->label('Hero Image 1 (Tall)')->image()->directory('homepage')->columnSpan(1),
                    FileUpload::make('hero_image_2')->label('Hero Image 2 (Top Right)')->image()->directory('homepage')->columnSpan(1),
                    FileUpload::make('hero_image_3')->label('Hero Image 3 (Bottom Right)')->image()->directory('homepage')->columnSpan(1),
                    TextInput::make('hero_cta_primary_label')->label('Primary Button Label'),
                    TextInput::make('hero_cta_primary_url')->label('Primary Button URL'),
                    TextInput::make('hero_cta_secondary_label')->label('Secondary Button Label'),
                    TextInput::make('hero_cta_secondary_url')->label('Secondary Button URL'),
                    TextInput::make('hero_stat1_value')->label('Stat 1 Value'),
                    TextInput::make('hero_stat1_label')->label('Stat 1 Label'),
                    TextInput::make('hero_stat2_value')->label('Stat 2 Value'),
                    TextInput::make('hero_stat2_label')->label('Stat 2 Label'),
                    TextInput::make('hero_stat3_value')->label('Stat 3 Value'),
                    TextInput::make('hero_stat3_label')->label('Stat 3 Label'),
                ]),

            Section::make('👋 About Us Section')
                ->description('Controls the About Us section content.')
                ->collapsible()
                ->columns(2)
                ->schema([
                    TextInput::make('about_badge')->label('Badge Text'),
                    TextInput::make('about_heading_line1')->label('Heading Line 1 (white)'),
                    TextInput::make('about_heading_highlight')->label('Heading Highlight (green)'),
                    TextInput::make('about_heading_line2')->label('Heading Line 2 (white)'),
                    Textarea::make('about_paragraph1')->label('Paragraph 1')->columnSpanFull()->rows(3),
                    Textarea::make('about_paragraph2')->label('Paragraph 2')->columnSpanFull()->rows(3),
                    Textarea::make('about_paragraph3')->label('Paragraph 3')->columnSpanFull()->rows(3),
                    FileUpload::make('about_image_1')->label('About Image 1 (Tall Left)')->image()->directory('homepage')->columnSpan(1),
                    FileUpload::make('about_image_2')->label('About Image 2 (Top Right)')->image()->directory('homepage')->columnSpan(1),
                    FileUpload::make('about_image_3')->label('About Image 3 (Bottom Right)')->image()->directory('homepage')->columnSpan(1),
                    TextInput::make('about_cta_primary_label')->label('CTA Button Label'),
                    TextInput::make('about_cta_primary_url')->label('CTA Button URL'),
                    TextInput::make('about_since_year')->label('Since Year Badge'),
                    TextInput::make('about_experience_label')->label('Experience Label'),
                ]),

            Section::make('🤝 Our Promise Section')
                ->description('Controls the closing promise/CTA section.')
                ->collapsible()
                ->columns(2)
                ->schema([
                    TextInput::make('promise_badge')->label('Badge Text'),
                    TextInput::make('promise_heading_line1')->label('Heading Line 1 (white)'),
                    TextInput::make('promise_heading_highlight')->label('Heading Highlight (gold)'),
                    Textarea::make('promise_text1')->label('Promise Paragraph 1')->columnSpanFull()->rows(3),
                    Textarea::make('promise_text2')->label('Promise Paragraph 2')->columnSpanFull()->rows(2),
                    FileUpload::make('promise_bg_image')->label('Background Image')->image()->directory('homepage')->columnSpanFull(),
                    TextInput::make('promise_pillar1_icon')->label('Pillar 1 Icon (emoji)'),
                    TextInput::make('promise_pillar1_title')->label('Pillar 1 Title'),
                    TextInput::make('promise_pillar1_desc')->label('Pillar 1 Description'),
                    TextInput::make('promise_pillar2_icon')->label('Pillar 2 Icon (emoji)'),
                    TextInput::make('promise_pillar2_title')->label('Pillar 2 Title'),
                    TextInput::make('promise_pillar2_desc')->label('Pillar 2 Description'),
                    TextInput::make('promise_pillar3_icon')->label('Pillar 3 Icon (emoji)'),
                    TextInput::make('promise_pillar3_title')->label('Pillar 3 Title'),
                    TextInput::make('promise_pillar3_desc')->label('Pillar 3 Description'),
                    TextInput::make('promise_cta_label')->label('CTA Button Label'),
                    TextInput::make('promise_cta_url')->label('CTA Button URL'),
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
            'index' => ManageHomepageSettings::route('/'),
        ];
    }
}
