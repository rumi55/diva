<?php

namespace App\Filament\Resources\Shop;

use App\Filament\Resources\Shop\BrandResource\RelationManagers\ProductsRelationManager;
use App\Filament\Resources\Shop\ProductResource\Pages;
use App\Filament\Resources\Shop\ProductResource\Pages\CreateProduct;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Livewire\Component;
use Filament\Forms\Components\Tabs;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Forms\Components\Toggle;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $slug = 'shop/products';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'Каталог';
    protected static ?string $label = 'Товары ';

    protected static ?string $navigationIcon = 'heroicon-o-duplicate';

    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form
            ->schema(static::getFormSchema(Forms\Components\Card::class))
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(static::getTableColumns())
            ->filters([
                //
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];


        if ($record->category) {
            $details['Категория'] = $record->category->title;
        }

        return $details;
    }

    // protected static function getGlobalSearchEloquentQuery(): Builder
    // {
    //     return parent::getGlobalSearchEloquentQuery()->with(['brand']);
    // }

    public static function getFormSchema(string $layout = Forms\Components\Grid::class): array
    {
        return [



            Tabs::make('Heading')
    ->tabs([
        Tabs\Tab::make('Основная информация')
            ->schema([
                Forms\Components\TextInput::make('title')
                ->label('Название')
                ->required()
                ->reactive()
                ->afterStateUpdated(function ($state, callable $set, $livewire){
                                
                    if ($livewire instanceof CreateProduct){
                        $set('slug',Str::slug($state) );
                    } 
            }),
            
            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(Product::class, 'slug', fn ($record) => $record),
                RichEditor::make('content')
                ->label('Контент')
                ->columnSpan([
                    'sm' => 2,
                ]),
                RichEditor::make('content2')
                ->label('Контент (дополнительно)')
                ->columnSpan([
                    'sm' => 2,
                ]),
            ]),
            
            
        Tabs\Tab::make('SEO')
            ->schema([
                Forms\Components\TextInput::make('seo_title'),
                Forms\Components\Textarea::make('seo_description')
                ->rows(2),
            ]),
       
            Tabs\Tab::make('Фотографии')
            ->schema([
                Forms\Components\FileUpload::make('gallery')
                                ->multiple()
                                ->image()
                                ->imageCropAspectRatio('1:1')
                                ->enableReordering()
                                ->label('Фотографии')
                                ->placeholder('<span class="filepond--label-action">Выбрать файл</span>')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
               
            ]),
            Tabs\Tab::make('Сертификаты')
            ->schema([
                
                Repeater::make('attachment')
                ->label(' ')
    ->schema([
        Forms\Components\TextInput::make('name')
        ->label('Название (кнопка)')
        ->columnSpan([
            'sm' => 2,
        ]),
        Forms\Components\FileUpload::make('link')
                                ->label('Сертификат')
                                ->placeholder('<span class="filepond--label-action">Выбрать файл</span>')
                                ->acceptedFileTypes(['application/pdf'])
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
        
            
    ])
    ->columns(2)
                
            ]),
        ])->columnSpan(2),

        
                

               



            Forms\Components\Group::make()
                ->schema([
                    $layout::make()
                        ->schema([
                            Forms\Components\BelongsToSelect::make('shop_category_id')
                                ->label('Категория')
                                ->placeholder('Выбрать')
                                ->relationship('category', 'title')
                                ->required()
                                ->columnSpan([
                                    'sm' => 4,
                                ]),
                                Toggle::make('featured')
                                ->inline(false)
                                ->label('Выращиваем')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                Forms\Components\TextInput::make('position')
                                ->label('Позиция')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                               
                                Forms\Components\FileUpload::make('preview')
                                ->label('Основное фото')
                                ->placeholder('<span class="filepond--label-action">Выбрать фото</span>')
                                ->disk('public')
                                ->columnSpan([
                                    'sm' => 4,
                                ]),
                                
                           
                        ])
                        ->columns(4),
                   
                       
                       
                ])
                ->columnSpan(1),
                
        ];
    }

    public static function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->extraAttributes(['class' => 'text-sm'])
                ->label('Название')
                ->searchable()
                ->sortable(),
            
            Tables\Columns\TextColumn::make('category.title')
            ->extraAttributes(['class' => 'text-sm'])
                ->label('Категория')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('slug')
            ->extraAttributes(['class' => 'text-sm'])
                ->getStateUsing(function($record) {
                    $record = collect([
                        ['slug' => $record->category['slug']],
                        ['slug' => $record->slug],
                    ]);
                     
                    
                    return $record->implode('slug', '/');
                })

                ->label('Slug')
                ->sortable(),
            Tables\Columns\TextColumn::make('position')
                ->label('Позиция')
                ->extraAttributes(['class' => 'text-sm'])
                ->sortable(),
            
        ];
    }
}
