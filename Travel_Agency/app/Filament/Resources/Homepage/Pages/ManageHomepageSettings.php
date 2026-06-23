<?php

namespace App\Filament\Resources\Homepage\Pages;

use App\Filament\Resources\Homepage\HomepageSettingResource;
use App\Models\HomepageSetting;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class ManageHomepageSettings extends EditRecord
{
    protected static string $resource = HomepageSettingResource::class;

    protected static ?string $title = 'Homepage Settings';

    // Always edit record ID=1 (singleton pattern)
    public function mount(int|string|null $record = null): void
    {
        $setting = HomepageSetting::getSettings();
        parent::mount($setting->id);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view_homepage')
                ->label('View Homepage')
                ->url('/')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->openUrlInNewTab()
                ->color('gray'),
        ];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Homepage settings saved successfully!';
    }
}
