<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\PostResource\Pages\CreatePost;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\RichEditor;
use App\Models\Category;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\MultiSelect;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Block;
use Filament\Forms\Components\BelongsToManyCheckboxList;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\HasManyRepeater;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Услуги';

    protected static ?string $label = 'Материал';

    protected static ?string $pluralLabel = 'Материалы';

    protected static ?string $recordTitleAttribute = 'title';
    
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        {
            return $form
                ->schema([

                    Tabs::make('Heading')
    ->tabs([
        Tabs\Tab::make('Основное')
            ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $set, $livewire){
                                    
                                    if ($livewire instanceof CreatePost){
                                        $set('slug',Str::slug($state) );
                                    } 
                            }),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->unique(Post::class, 'slug', fn ($record) => $record),
                                Forms\Components\TextInput::make('name')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                Forms\Components\Textarea::make('description')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                RichEditor::make('content')
                                ->label('Контент (основной)')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                RichEditor::make('content2')
                                ->label('Контент (дополнительный)')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                RichEditor::make('content3')
                                ->label('Контент (дополнительный)')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
            ]),
        Tabs\Tab::make('SEO')
            ->schema([
                                Forms\Components\TextInput::make('seo_title')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                Forms\Components\Textarea::make('seo_description')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
            ]),
        Tabs\Tab::make('Фото')
            ->schema([
                Forms\Components\TextInput::make('gallery_name')
                ->label('Заголовок галереи')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                Textarea::make('gallery_description')
                ->label('Описание галереи')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                Forms\Components\FileUpload::make('gallery')
                ->label('Фотоальбом')
                ->placeholder('<span class="filepond--label-action">Выбрать фото</span>')
                ->multiple()
                ->enableReordering()
                ->disk('public')
                ->columnSpan([
                    'sm' => 2,
                ]),
            ]),
            Tabs\Tab::make('Блоки')
            ->schema([
                BelongsToManyMultiSelect::make('select')
                ->label('Выбрать блоки')
                    ->relationship('blocks', 'title')
                    ->options(Block::all()->pluck('title', 'id'))
                
                
            ]),
        ])->columnSpan(2),

                   
                    Forms\Components\Card::make()
                        ->schema([
                            Forms\Components\BelongsToSelect::make('category_id')
                                ->label('Категория')
                                ->placeholder('Выбрать')
                                ->relationship('category', 'title')
                                ->options(Category::all()->pluck('title', 'id'))
                                ->searchable()->columnSpan([
                                    'sm' => 6,
                                ]),
                            Forms\Components\Select::make('type')
                            ->label('Шаблон')
                            ->default('main')
                            ->options([
                               'main' => 'Обычный',
                               'news' => 'Новость',
                                'about' => 'О нас',
                                'contacts' => 'Контакты'
                                ])->columnSpan([
                                    'sm' => 4,
                                ]),
                                Forms\Components\TextInput::make('position')
                                ->label('Позиция')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                
                            
                                    Forms\Components\FileUpload::make('preview')
                                    ->disk('public')
                                    ->placeholder('<span class="filepond--label-action">Выбрать фото</span>')
                                    ->columnSpan([
                                        'sm' => 6,
                                    ]),
                                    Forms\Components\FileUpload::make('background')
                                    ->disk('public')
                                    ->placeholder('<span class="filepond--label-action">Выбрать фото</span>')
                                    ->columnSpan([
                                        'sm' => 6,
                                    ]),
                        
                                
                        ])
                        ->columns(6)
                        ->columnSpan(1),
                        
                        
                ])
                ->columns(3);
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable()
                    ->extraAttributes(['class' => 'text-sm'])
                    ->sortable(),
                    Tables\Columns\TextColumn::make('slug')
                    ->getStateUsing(function($record) {

                    if($record->category){
                    $a = $record->category['slug'];
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
                })
                    ->searchable()
                    ->extraAttributes(['class' => 'text-sm'])
                    ->sortable(),
               
                Tables\Columns\TextColumn::make('category.title')
                ->label('Категория')
                ->extraAttributes(['class' => 'text-sm'])
                    ->searchable()
                    ->sortable(),
               
            ])
            ->filters([
               
            ]);
    
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
    
}
