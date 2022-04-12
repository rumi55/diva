<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\Pages\CreateCategory;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;


    protected static ?string $label = 'Категории ';

    protected static ?string $recordTitleAttribute = 'title';
    
    protected static ?string $navigationGroup = 'Услуги';
    
   

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Tabs::make('Heading')
                ->tabs([
                    Tabs\Tab::make('Основная информация')
                        ->schema([
                            Forms\Components\TextInput::make('title')
                            ->label('Название')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, $livewire){
                                
                                if ($livewire instanceof CreateCategory){
                                    $set('slug',Str::slug($state) );
                                } 
                        }),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(Category::class, 'slug', fn ($record) => $record),
                        Forms\Components\Textarea::make('description')
                            ->label('Описание')
                            ->rows(4)
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                        ]),
                    Tabs\Tab::make('SEO')
                        ->schema([
                            // ...

                            Forms\Components\TextInput::make('seo_title')
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                            Forms\Components\Textarea::make('seo_description')
                            ->rows(4)
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                        ]),
                    Tabs\Tab::make('Контент')
                        ->schema([
                            RichEditor::make('content')
                        ->label('Контент (основной)')
                        ->columnSpan([
                            'sm' => 2,
                        ]),
                        RichEditor::make('content2')
                        ->label('Контент (дополнительно)')
                        ->columnSpan([
                            'sm' => 2,
                        ]),
                        ]),
                    ])->columnSpan(2),
                    Forms\Components\Card::make()
                    ->schema([
                    Forms\Components\BelongsToSelect::make('parent_id')
                            ->label('Категория')
                            ->relationship('parent', 'title', fn (Builder $query) => $query->where('parent_id', null))
                            ->options(Category::all()->pluck('title', 'id'))
                            ->searchable()
                            ->placeholder('Выбрать')->columnSpan([
                                'sm' => 2,
                            ]),
                            
                            

                            Forms\Components\TextInput::make('position')
                        ->label('Позиция')->columnSpan([
                            'sm' => 1,
                        ]),
                        
               
                        Forms\Components\FileUpload::make('preview')
                        ->label('Превью')
                        ->disk('public')
                        ->placeholder('<span class="filepond--label-action">Выбрать фото</span>')->columnSpan([
                            'sm' => 3,
                        ]),
                        Forms\Components\FileUpload::make('background')
                        ->label('Фон')
                        ->disk('public')
                        ->placeholder('<span class="filepond--label-action">Выбрать фото</span>')->columnSpan([
                            'sm' => 3,
                        ]),
                        

                        

                        
                            
                    ])->columns(3)
                    ->columnSpan(1),
                    


            ])
            ->columns(3);
           
           
                
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               
                Tables\Columns\TextColumn::make('title')
                ->extraAttributes(['class' => 'text-sm'])
                ->label('Заголовок')
                    ->searchable()
                    ->sortable(),
               
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->extraAttributes(['class' => 'text-sm'])
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
                    Tables\Columns\TextColumn::make('parent.title')
                    ->extraAttributes(['class' => 'text-sm'])
                        ->label('Категория'),
                Tables\Columns\TextColumn::make('updated_at')
                ->extraAttributes(['class' => 'text-sm'])
                    ->label('Обновлён')
                    ->date()
                
                    
                    
            ])
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
