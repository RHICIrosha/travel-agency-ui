<?php

namespace App\Filament\Resources\SiteSettingResource\Pages;

use App\Filament\Resources\SiteSettingResource;
use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class ManageSiteSettings extends EditRecord
{
    protected static string $resource = SiteSettingResource::class;

    protected static ?string $title = 'Site Settings';

    // Always edit record ID=1 (singleton pattern)
    public function mount(int|string|null $record = null): void
    {
        $setting = SiteSetting::getSettings();
        parent::mount($setting->id);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view_site')
                ->label('View Website')
                ->url('/')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->openUrlInNewTab()
                ->color('gray'),
        ];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Site settings saved successfully!';
    }
}
