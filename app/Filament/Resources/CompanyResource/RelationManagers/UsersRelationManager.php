<?php

namespace App\Filament\Resources\CompanyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()->schema([
                    TextInput::make('name')->rules(['min:3', 'max:20'])->required(),
                    TextInput::make('email')->email()->required(),
                    TextInput::make('password')->password()->visibleOn('create')->required(),
                    FileUpload::make('profile_image')->disk('public')->directory('profileImages')->columnSpan(2),
                ])->columns(2)
            ])->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable()->toggleable(),
                TextColumn::make('name')->sortable()->searchable()->toggleable(),
                TextColumn::make('company.name')->sortable()->searchable()->toggleable(),
                TextColumn::make('email')->sortable()->searchable()->toggleable(),
                ImageColumn::make('profile_image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
