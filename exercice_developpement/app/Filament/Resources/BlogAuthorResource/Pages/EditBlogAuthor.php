<?php

namespace App\Filament\Resources\BlogAuthorResource\Pages;

use App\Filament\Resources\BlogAuthorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBlogAuthor extends EditRecord
{
    protected static string $resource = BlogAuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
