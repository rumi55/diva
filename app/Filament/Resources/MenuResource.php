<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Shop\Shopcategory;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $label = 'Меню ';

    protected static ?string $navigationGroup = 'Параметры';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Card::make()
                ->label('Параметры меню')
                ->schema([
                    TextInput::make('name')
                    ->required()
                    ->label('Название')
                    ->columnSpan([
                        'sm' => 3,
                    ]),
                    
                    Select::make('type')
                    ->required()
                    ->label('Тип')
                    ->options([
    
                        'top' => 'Верхнее меню',
                        'bottom' => 'Нижнее меню',
                        ]
                    )->columnSpan([
                        'sm' => 3,
                    ]),
                    TextInput::make('title')
                    ->label('Заголовок')
                    ->columnSpan([
                        'sm' => 5,
                    ]),
                    TextInput::make('position')
                    ->label('Позиция')
                    ->columnSpan([
                        'sm' => 1,
                    ]),
                ])->columns('6')
                ->columnSpan([
                    'sm' => 1,
                ]),
                
               
                Repeater::make('repeater')
                ->label('')
                    ->schema([
                        Forms\Components\TextInput::make('menu_title')
                        ->label('Название')
                        ->columnSpan([
                            'sm' => 1,
                        ]),
                        Forms\Components\TextInput::make('menu_slug')
                        ->label('Slug')
                        ->columnSpan([
                            'sm' => 1,
                        ]),
                        Repeater::make('subrep')
                        ->label('')
                        ->schema([
                            Forms\Components\TextInput::make('menu_subtitle')
                            ->label('Название')
                            ->columnSpan([
                                'sm' => 1,
                            ]),
                            
                            Forms\Components\TextInput::make('menu_subslug')
                            ->label('Slug')
                            ->columnSpan([
                                'sm' => 1,
                            ]),

                        ])->columnSpan([
                            'sm' => 2,
                        ])->columns('2'),
   
                    ])->columns('2')
                    ->columnSpan([
                        'sm' => 1,
                    ]),

            ])->columns('2');
            
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Название')
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('position')
                ->label('Позиция')
                ->default('-')
                ->sortable(),
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
