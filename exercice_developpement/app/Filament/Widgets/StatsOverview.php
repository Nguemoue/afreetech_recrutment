<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\Tag;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Blogs', Blog::count())
                ->description('All Blogs')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),
            Stat::make('Total Categories', BlogCategory::count())
                ->description("All Categories")
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),
            Stat::make('Total Tags', Tag::count())
                ->color('danger')
                ->chart([1, 2, 10, 3, 1, 4, 7])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),
            Stat::make('Total Authors', BlogAuthor::count())
                ->color('warning')
                ->chart([27, 2, 10, 3, 14, 4, 17])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),
        ];
    }
}
