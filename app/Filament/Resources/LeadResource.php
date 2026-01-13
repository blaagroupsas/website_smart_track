<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Filament\Resources\LeadResource\RelationManagers;
use App\Models\Lead;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'Solicitudes';
    
    protected static ?string $modelLabel = 'Solicitud';
    
    protected static ?string $pluralModelLabel = 'Solicitudes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Información de Contacto')
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('empresa')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('telefono')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('tamaño_flota')
                            ->options([
                                '1-10' => '1-10 vehículos',
                                '11-50' => '11-50 vehículos',
                                '50+' => '+50 vehículos',
                            ])
                            ->placeholder('No especificado'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Gestión')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->required()
                            ->options([
                                'nuevo' => 'Nuevo',
                                'contactado' => 'Contactado',
                                'calificado' => 'Calificado',
                                'convertido' => 'Convertido',
                                'descartado' => 'Descartado',
                            ])
                            ->default('nuevo'),
                        Forms\Components\Textarea::make('notas')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('empresa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->searchable()
                    ->copyable(),
                Tables\Columns\TextColumn::make('tamaño_flota')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'gray' => 'nuevo',
                        'info' => 'contactado',
                        'warning' => 'calificado',
                        'success' => 'convertido',
                        'danger' => 'descartado',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'nuevo' => 'Nuevo',
                        'contactado' => 'Contactado',
                        'calificado' => 'Calificado',
                        'convertido' => 'Convertido',
                        'descartado' => 'Descartado',
                    ]),
                Tables\Filters\SelectFilter::make('tamaño_flota')
                    ->options([
                        '1-10' => '1-10 vehículos',
                        '11-50' => '11-50 vehículos',
                        '50+' => '+50 vehículos',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}
