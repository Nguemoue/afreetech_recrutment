<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers\TagsRelationManager;
use App\Models\Blog;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $slug = 'blogs';

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = "Articles";
    protected static ?string $navigationGroup = "Administration";

    public static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('title')
                    ->maxValue(255)
                    ->columnSpanFull()
                    ->required(),

                Grid::make()->schema([
                    Select::make('blog_author_id')
                        ->relationship('blogAuthor', 'name')
                        ->createOptionForm([
                            TextInput::make('name')
                                ->required(),
                            TextInput::make('surname')
                                ->required(),
                        ])
                        ->native(false)
                        ->searchable()
                        ->preload()
                        ->createOptionModalHeading("Create Author")
                        ->required(),

                    Select::make('blog_category_id')
                        ->relationship('blogCategory', 'label')
                        ->createOptionForm([
                            TextInput::make('label')
                                ->required(),
                        ])
                        ->native(false)
                        ->searchable()
                        ->preload()
                        ->createOptionModalHeading("Create category")
                        ->required(),

                    DatePicker::make('published_at')
                        ->native(false)
                        ->label('Published Date'),
                ])->columns(3),

                RichEditor::make('content')
                    ->columnSpanFull()
                    ->required(),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?Blog $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?Blog $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('blogAuthor.name'),

                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('blogCategory.label'),

                TextColumn::make('published_at')
                    ->label('Published Date')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    EditAction::make(),
                    \Filament\Tables\Actions\ViewAction::make(),
                    DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TagsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }
}
