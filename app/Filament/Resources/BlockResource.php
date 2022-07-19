<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlockResource\Pages;
use App\Filament\Resources\BlockResource\RelationManagers;
use App\Models\Block;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use App\Models\User;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class BlockResource extends Resource
{
    protected static ?string $model = Block::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-grid-add';
    protected static ?string $label = 'Инфоблоки ';

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
            'index' => Pages\ListBlocks::route('/'),
            'create' => Pages\CreateBlock::route('/create'),
            'edit' => Pages\EditBlock::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(string $layout = Forms\Components\Grid::class): array
    {
        return [

            Tabs::make('Heading')
            ->tabs([
            Tabs\Tab::make('Основная информация')
            ->schema([
                Forms\Components\TextInput::make('title')
                                ->required()
                                ->label('Название')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                Forms\Components\TextInput::make('name')
                                ->label('Заголовок')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                RichEditor::make('content')
                                ->label('Контент')
                                // ->showMenuBar()
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                RichEditor::make('content2')
                                ->label('Контент (дополнительно)')
                                
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                
            ]),
            Tabs\Tab::make('Повторяющиеся элементы')
            ->schema([
                Repeater::make('repeater')
                ->label('')
                ->schema([
                    FileUpload::make('picture')
                    ->label('Фото')
                    ->placeholder('<span class="filepond--label-action">Выбрать фото</span>')
                    ->columnSpan(6)
                    ,
                    
                   
                    TextInput::make('title')
                    ->label('Заголовок')
                    ->columnSpan(5)
                    ,
                    TextInput::make('number')
                    ->label('Номер')
                    ->columnSpan(1),
                    
                    RichEditor::make('description')
                    ->label('Описание')
                    ->columnSpan(6)
                    ,
                    
                    
                ])->columnSpan(6),
            ])->columns(6),
            Tabs\Tab::make('Галерея')
            ->schema([
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
        ])->columnSpan(2),



           
                

               



            Forms\Components\Group::make()
                ->schema([
                    $layout::make()
                        ->schema([
                            Forms\Components\Select::make('type')
                            ->label('Тип')
                            ->required()
                            ->options([
                                'about' => 'О нас',
                                'logo' => 'Партнеры',
                                'factors' => 'Факторы',
                                'stages' => 'Этапы',
                                'experience' => 'Опыт',
                                'map' => 'Карта (контакты)',
                                'map_production' => 'Карта (производство)',
                                'strategy' => 'Стратегия развития',
                                'team_full' => 'Сотрудники (все)',
                                // 'team_short' => 'Сотрудники (избранное)',
                                'products' => 'Ассортимент',
                                'files' => 'Файлы',
                                'form_first' => 'Связаться с нами',
                                'form_second' => 'Обратный звонок',
                            ])
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                           

                            Forms\Components\FileUpload::make('preview')
                                ->label('Превью')
                                ->disk('public')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                             

                           
                           
                        ])->columns([
                            'sm' => 2,
                        ]),
                       
                        
                    
                ])
                ->columnSpan(1),
                
                
                
        ];
        
    }

    public static function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->label('Название')
                ->getStateUsing(function($record) {
                    $record = strip_tags($record->title);

                    return $record;
                })
                ->searchable()
                ->extraAttributes(['class' => 'text-sm'])
                ->sortable(),
            Tables\Columns\TextColumn::make('type')->enum([
                // 'about' => 'О нас',
                // 'partners' => 'Партнеры',
                // 'secret' => 'Секрет успеха',
                // 'stages' => 'Этапы',
                // 'agricultural' => 'Производитель сельхозпродукции',
                // 'plan' => 'План расширения',
                // 'contact' => 'Контакты',
                // 'strategy' => 'Стратегия развития',
                // 'factors' => 'Факторы',
                // 'contat-form-1' => 'Связаться с нами',
                // 'contat-form-2' => 'Обратный звонок',
                ])
            
                ->label('Тип')
               ->extraAttributes(['class' => 'text-sm'])
                ->searchable()
                ->sortable(),
                
        ];
    }
}
