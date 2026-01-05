<?php

namespace App\Filament\Resources\Transactions\RelationManagers;

use App\Enums\TransactionType;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AttachmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'attachments';
    protected static ?string $title = 'المرفقات';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('file_path')
                    ->label('الملف')
                    ->disk('public')
                    ->directory('attachments')
                    ->preserveFilenames()
                    ->downloadable()
                    ->openable()
                    ->required(),

                Select::make('type')
                    ->label('نوع المعاملة')
                    ->options(TransactionType::class)
                    ->default('outgoing')
                    ->required(),

                Hidden::make('uploaded_by')
                    ->default(fn() => Filament::auth()->id()),
            ]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('file_path')
                    ->label('الملف')
                    ->url(fn($record) => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(),

                TextEntry::make('type')
                    ->label('نوع المعاملة')
                    ->badge(),

                TextEntry::make('uploader.name')
                    ->label('أنشئت بواسطة'),

                TextEntry::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->placeholder('-'),

                TextEntry::make('updated_at')
                    ->label('آخر تعديل')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('المرفقات')
            ->columns([
                TextColumn::make('file_path')
                    ->label('الملف')
                    ->url(fn($record) => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(),

                TextColumn::make('type')
                    ->label('نوع المعاملة')
                    ->badge(),

                TextColumn::make('uploader.name')
                    ->label('أنشئت بواسطة')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('آخر تعديل')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                CreateAction::make()->label('إضافة مرفق'),
                AssociateAction::make()->label('ربط مرفق')->visible(
                fn($record) =>
                Filament::auth()->id() === Filament::auth()->user()?->hasRole('Admin')
            ),
            ])
            ->recordActions([
                ViewAction::make()->label('عرض'),
                EditAction::make()->label('تعديل')->visible(
                fn($record) =>
                Filament::auth()->id() === $record->uploaded_by
                    || Filament::auth()->user()?->hasRole('Admin')
            ),
                DissociateAction::make()->label('إلغاء الربط')->visible(
                fn($record) =>
                Filament::auth()->id() === Filament::auth()->user()?->hasRole('Admin')
            ),
                DeleteAction::make()->label('حذف'),
            ]);
    }
}
