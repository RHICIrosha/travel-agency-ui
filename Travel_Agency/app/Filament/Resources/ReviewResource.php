<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages\ListReviews;
use App\Filament\Resources\ReviewResource\Pages\ViewReview;
use App\Models\Review;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Placeholder;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;
    protected static ?string $navigationLabel = 'Reviews';
    protected static ?int $navigationSort = 5;

    public static function getNavigationGroup(): ?string
    {
        return 'Content';
    }

    /**
     * Show a badge with the count of pending reviews.
     */
    public static function getNavigationBadge(): ?string
    {
        $count = Review::pending()->count();
        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Reviewer Details')
                ->columns(2)
                ->schema([
                    Placeholder::make('reviewer_name')
                        ->label('Name')
                        ->content(fn ($record) => $record?->reviewer_name ?? '—'),

                    Placeholder::make('reviewer_email')
                        ->label('Email')
                        ->content(fn ($record) => $record?->reviewer_email ?? '—'),

                    Placeholder::make('tour_name')
                        ->label('Tour')
                        ->content(fn ($record) => $record?->tour_name ?? '—'),

                    Placeholder::make('rating')
                        ->label('Rating')
                        ->content(fn ($record) => $record
                            ? str_repeat('★', $record->rating) . str_repeat('☆', 5 - $record->rating)
                            : '—'),

                    Placeholder::make('mood_emoji')
                        ->label('Mood')
                        ->content(fn ($record) => $record?->mood_emoji ?? '—'),

                    Placeholder::make('status')
                        ->label('Status')
                        ->content(fn ($record) => $record ? ucfirst($record->status) : '—'),
                ]),

            Section::make('Review Content')
                ->schema([
                    Placeholder::make('review_text')
                        ->label('Review Text')
                        ->content(fn ($record) => $record?->review_text ?? '—'),
                ]),

            Section::make('Submitted Images')
                ->schema([
                    Placeholder::make('images_preview')
                        ->label('Images')
                        ->content(function ($record) {
                            if (empty($record?->images)) {
                                return 'No images submitted.';
                            }
                            $html = '<div style="display:flex;gap:8px;flex-wrap:wrap;">';
                            foreach ($record->images as $path) {
                                $url = asset('storage/' . $path);
                                $html .= "<a href='{$url}' target='_blank'>"
                                       . "<img src='{$url}' style='width:120px;height:100px;object-fit:cover;border-radius:8px;border:1px solid #ccc;'>"
                                       . "</a>";
                            }
                            $html .= '</div>';
                            return new \Illuminate\Support\HtmlString($html);
                        }),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reviewer_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tour_name')
                    ->label('Tour')
                    ->default('—')
                    ->limit(25),

                TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(fn ($state) => str_repeat('★', $state) . str_repeat('☆', 5 - $state))
                    ->sortable(),

                TextColumn::make('mood_emoji')
                    ->label('Mood')
                    ->default('—'),

                TextColumn::make('review_text')
                    ->label('Review')
                    ->limit(55)
                    ->tooltip(fn ($record) => $record->review_text),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default     => 'warning',
                    }),

                TextColumn::make('created_at')
                    ->label('Submitted')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending'  => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),

                Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Approve this review?')
                    ->modalDescription('This review will become visible on the public website.')
                    ->action(function (Review $record) {
                        $record->update(['status' => 'approved']);
                        Notification::make()
                            ->title('Review approved!')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (Review $record) => $record->status !== 'approved'),

                Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Reject this review?')
                    ->modalDescription('This review will not appear on the public website.')
                    ->action(function (Review $record) {
                        $record->update(['status' => 'rejected']);
                        Notification::make()
                            ->title('Review rejected.')
                            ->danger()
                            ->send();
                    })
                    ->visible(fn (Review $record) => $record->status !== 'rejected'),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReviews::route('/'),
            'view'  => ViewReview::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
