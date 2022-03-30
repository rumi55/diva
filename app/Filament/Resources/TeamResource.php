<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Filament\Resources\TeamResource\RelationManagers;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Livewire\Component;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $label = 'Сотрудники ';

    protected static ?string $recordTitleAttribute = 'title';

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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }

    public static function getFormSchema(string $layout = Forms\Components\Grid::class): array
    {
        return [
            Forms\Components\Group::make()
                ->schema([
                    $layout::make()
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->label('Имя')
                                ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                                Forms\Components\TextInput::make('description')
                            ->label('Должность')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                            Forms\Components\TextInput::make('phone')
                            ->label('Телефон')
                           ->tel(),
                            Forms\Components\TextInput::make('email')
                            ->label('Электронная почта')
                            ->email(),
                            RichEditor::make('content')
                                ->label('Контент')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                            
                           
                                
                                
                        ])->columns([
                            'sm' => 2,
                        ]),
                   
                    
                    

                    
                        
                ])->columnSpan(2),
                

               



            Forms\Components\Group::make()
                ->schema([
                    $layout::make()
                        ->schema([

                            Forms\Components\FileUpload::make('preview')
                                ->label('Фото сотрудника')
                                ->placeholder('<span class="filepond--label-action">Выбрать фото</span>')
                                ->disk('public')
                                // ->required()
                                ->columnSpan([
                                    'sm' => 2,
                                ]),

                           
                                Forms\Components\TextInput::make('position_main')
                                ->label('Позиция')
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                              
                                    Forms\Components\Toggle::make('active')
                                        ->label('Статус')
                                        // ->helperText('Активный')
                                        ->default(false)
                                        ->columnSpan([
                                            'sm' => 1,
                                        ]),
                                   
                                
                                        
                                        // Forms\Components\TextInput::make('position_second')
                                        // ->label('Позиция на странице О нас'),
                                
                           
                        ])->columns([
                            'sm' => 2,
                        ]),
                        
                    
                ])
                ->columnSpan(1),
                
        ];
    }
    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }

    public static function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->label('Имя')
                ->searchable()
                ->sortable(),
            Tables\Columns\BooleanColumn::make('active')
                ->label('Статус')
                ->sortable(),
            Tables\Columns\TextColumn::make('position_main')
                ->label('Позиция(главная)')
                ->default('-'),
            Tables\Columns\TextColumn::make('position_second')
                ->label('Позиция(о нас)')
                ->default('-'),
                
            
            
        ];
    }
}
