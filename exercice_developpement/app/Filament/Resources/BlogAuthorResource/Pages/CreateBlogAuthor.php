<?php

namespace App\Filament\Resources\BlogAuthorResource\Pages;

use App\Filament\Resources\BlogAuthorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogAuthor extends CreateRecord
{
    protected static string $resource = BlogAuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
