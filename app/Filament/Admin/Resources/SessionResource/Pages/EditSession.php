<?php

namespace App\Filament\Admin\Resources\SessionResource\Pages;

use App\Filament\Admin\Resources\SessionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\CourseResource;

class EditSession extends EditRecord
{
    protected static string $resource = SessionResource::class;

    public function hasCombinedRelationManagerTabsWithContent(): bool
    {
        return true;
    }

    protected function getRedirectUrl(): string
    {
        return CourseResource::getUrl('edit', [
            'record' => $this->record->course_id,
        ]);
    }

    public function getBreadcrumbs(): array
    {
        return [
            CourseResource::getUrl('edit', [
                'record' => $this->record->course_id,
            ]) => 'Course',

            '#' => 'Session',

            '' => 'Edit',
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
