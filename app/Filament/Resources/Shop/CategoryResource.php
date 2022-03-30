<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\CategoryResource\Pages;
use App\Filament\Resources\Shop\CategoryResource\Pages\CreateCategory;
use App\Filament\Resources\Shop\CategoryResource\RelationManagers;
use App\Models\Shopcategory;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Forms\Components\Tabs;

class CategoryResource extends Resource
{
    protected static ?string $model = Shopcategory::class;

    protected static ?string $slug = 'shop/categories';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'Каталог';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $label = 'Категории ';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Heading')
                ->tabs([
                    Tabs\Tab::make('Основная информация')
                        ->schema([
                            Forms\Components\TextInput::make('title')
                            ->label('Заголовок')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, $livewire){
                                
                                if ($livewire instanceof CreateCategory){
                                    $set('slug',Str::slug($state) );
                                } 
                        })
                            ->columnSpan([
                                'sm' => 1,
                            ]),
                Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(Shopcategory::class, 'slug', fn ($record) => $record)
                            ->columnSpan([
                                'sm' => 1,
                            ]),
                            Forms\Components\Textarea::make('description')
                        ->label('Описание')->columnSpan([
                            'sm' => 2,
                        ]),
                        ])->columns(2),
                    Tabs\Tab::make('Seo')
                        ->schema([
                            Forms\Components\TextInput::make('seo_title')
                                    
                            ->columnSpan([
                                'sm' => 6,
                            ]),
                            Forms\Components\Textarea::make('seo_description')
                            
                            ->columnSpan([
                                'sm' => 6,
                            ]),
                        ]),
                    Tabs\Tab::make('Контент')
                        ->schema([
                            RichEditor::make('content')
                            ->label('Контент')
                            ->columnSpan([
                                'sm' => 6,
                            ]),
                            RichEditor::make('content2')
                            ->label('Контент(дополнительный)')
                            ->columnSpan([
                                'sm' => 6,
                            ]),
                        ]),
                    ])
                    ->columns(6)
                    ->columnSpan(2),



                


                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\BelongsToSelect::make('parent_id')
                        ->label('Категория')
                        ->relationship('parent', 'title', fn (Builder $query) => $query->where('parent_id', null))
                        ->searchable()
                        ->placeholder('Выбрать')
                        ->columnSpan([
                            'sm' => 4,
                        ]),
                        Forms\Components\TextInput::make('position')
                        ->label('Позиция')->columnSpan([
                            'sm' => 2,
                        ]),
                        Forms\Components\FileUpload::make('preview')
                        ->label('Превью')
                        ->disk('public')
                        ->placeholder('<span class="filepond--label-action">Выбрать фото</span>')->columnSpan([
                            'sm' => 6,
                        ]),
                        Forms\Components\FileUpload::make('background')
                        ->label('Фон')
                        ->disk('public')
                        ->placeholder('<span class="filepond--label-action">Выбрать фото</span>')->columnSpan([
                            'sm' => 6,
                        ]),
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Создан')
                            ->content(fn (?Shopcategory $record): string => $record ? $record->created_at->diffForHumans() : '-')->columnSpan([
                                'sm' => 3,
                            ]),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Изменен')
                            ->content(fn (?Shopcategory $record): string => $record ? $record->updated_at->diffForHumans() : '-')->columnSpan([
                                'sm' => 3,
                            ]),
                    ])
                    ->columns(6)
                    ->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Название')
                    ->sortable()->extraAttributes(['class' => 'text-sm'])
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent.title')
                    ->label('Категория')
                    ->sortable()->extraAttributes(['class' => 'text-sm'])
                    ->default('-')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()->extraAttributes(['class' => 'text-sm'])
                    ->getStateUsing(function($record) {

                        if($record->parent){
                        $a = $record->parent['slug'];
                        $b = $record->slug;
                        $record = collect([
                            ['slug' => $a],
                            ['slug' => $b],
                        ]);
                        }
                        else{
                            $b = $record->slug;
                            $record = collect([
                                ['slug' => $b]
                            ]);
                        }
                      
                         
                        
                        return $record->implode('slug', '/');
                    }),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Обновлён')
                    ->sortable()->extraAttributes(['class' => 'text-sm'])
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\ProductsRelationManager::class,
        ];
    }
    public static function getGloballySearchableAttributes(): array
{
    return ['title'];
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
