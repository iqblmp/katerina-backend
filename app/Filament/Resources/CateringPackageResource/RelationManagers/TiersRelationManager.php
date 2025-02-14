<?php

namespace App\Filament\Resources\CateringPackageResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TiersRelationManager extends RelationManager
{
    protected static string $relationship = 'tiers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->required(),

                Forms\Components\TextInput::make('tagLine')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),

                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->prefix('People'),

                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->numeric()
                    ->prefix('Days'),

                Forms\Components\Repeater::make('benefits')
                    ->relationship('benefits')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required(),
                    ])

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\ImageColumn::make('photo'),

                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('duration'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
