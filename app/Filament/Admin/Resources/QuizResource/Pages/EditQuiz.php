<?php

namespace App\Filament\Admin\Resources\QuizResource\Pages;

use App\Filament\Admin\Resources\QuizResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\CourseResource;

class EditQuiz extends EditRecord
{
    protected static string $resource = QuizResource::class;

        public function hasCombinedRelationManagerTabsWithContent(): bool
        {
            return true;
        }

        public function getBreadcrumbs(): array
    {
        return [
            CourseResource::getUrl('edit', [
                'record' => $this->record->session->course_id,
            ]) => 'Course',

            \App\Filament\Admin\Resources\SessionResource::getUrl('edit', [
                'record' => $this->record->session_id,
            ]) => 'Session',

            '#' => 'Quiz',

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
