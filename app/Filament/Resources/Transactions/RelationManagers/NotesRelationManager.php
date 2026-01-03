<?php

namespace App\Filament\Resources\Transactions\RelationManagers;

use App\Enums\TransactionType;
use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Facades\Filament;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NotesRelationManager extends RelationManager
{
    protected static string $relationship = 'notes';

    protected static ?string $title = 'notes';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Textarea::make('note')
                ->required(),

            Select::make('type')
                ->options(TransactionType::class)
                ->default('outgoing')
                ->required(),

            Hidden::make('created_by')
                ->default(fn() => Filament::auth()->id()),
        ]);
    }


    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('note'),

                TextEntry::make('type')
                    ->badge(),

                TextEntry::make('creator.name'),

                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('note')
                    ->limit(50),

                TextColumn::make('type')
                    ->badge(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                CreateAction::make()->visible(fn() => true),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()->visible(
                    fn($record) =>
                    Filament::auth()->user()->id === $record->created_by
                        || Filament::auth()->user()->hasRole('Admin')
                ),

                DeleteAction::make(),
            ])->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);;
    }
}
