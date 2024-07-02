<?php

namespace BeraniDigitalID\FilamentModelAudit\Resources;

use BeraniDigitalID\FilamentModelAudit\Resources\AuditTrailResource\Pages;
use BeraniDigitalID\LaravelModelAudit\Models\AuditTrail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AuditTrailResource extends Resource
{
    protected static ?string $model = AuditTrail::class;

    protected static ?string $navigationGroup = 'settings';

    protected static ?int $navigationSort = 3;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('auditable_type')
                    ->searchable()
                    ->getStateUsing(fn (AuditTrail $record) => class_basename($record->auditable_type)),
                Tables\Columns\TextColumn::make('auditable_id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('diff')
                    ->label(__('Difference'))
                    ->getStateUsing(fn (AuditTrail $record) => count($record->getDiff())),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('updated_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make('Diff')
                    ->disabled(fn ($record) => $record->old_values == null && $record->new_values == null)
                    ->form([
                        Forms\Components\Repeater::make('diff')
                            ->hiddenLabel()
                            ->schema([
                                Forms\Components\Section::make()
                                    ->columns(3)
                                    ->schema([
                                        Forms\Components\TextInput::make('key')
                                            ->disabled(),
                                        Forms\Components\TextInput::make('old')
                                            ->disabled(),
                                        Forms\Components\TextInput::make('new')
                                            ->disabled(),
                                    ]),
                            ]),
                    ])
                    ->mutateRecordDataUsing(function (AuditTrail $record, array $data) {
                        $data['diff'] = $record->getDiff();

                        return $data;
                    })
                    ->disabledForm(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\Section::make()
                    ->columns()
                    ->schema([

                        Forms\Components\TextInput::make('auditable_type')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('auditable_id')
                            ->numeric(),
                    ]),
                Forms\Components\Section::make(__('data'))
                    ->label(__('data'))
                    ->columns(2)
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\KeyValue::make('old_values')->disabled(),
                        Forms\Components\KeyValue::make('new_values')->disabled(),
                    ]),

                Forms\Components\KeyValue::make('author_additional_data')->disabled(),
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
            'index' => Pages\ListAuditTrails::route('/'),
            'edit' => Pages\EditAuditTrail::route('/{record}/edit'),
        ];
    }
}
