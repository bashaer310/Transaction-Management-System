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

    protected static ?string $title = 'الملاحظات';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Textarea::make('note')
                ->label('الملاحظة')
                ->required(),

            Select::make('type')
                ->label('نوع الملاحظة')
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
                TextEntry::make('note')
                    ->label('الملاحظة'),

                TextEntry::make('type')
                    ->label('نوع الملاحظة')
                    ->badge(),

                TextEntry::make('creator.name')
                    ->label('أنشئت بواسطة'),

                TextEntry::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('آخر تحديث')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('note')
                    ->label('الملاحظة')
                    ->limit(50)
                    ->tooltip(fn($record) => $record->note),

                TextColumn::make('type')
                    ->label('نوع الملاحظة')
                    ->badge(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('آخر تحديث')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                CreateAction::make()->visible(fn() => true),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
