<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General')
                ->description('this is description')
                ->schema([
                    Grid::make()
                        ->schema([
                            TextInput::make('name')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                            ->readOnly()
                        ]),
                        TextInput::make('sku')
                            ->required()
                            ->live(onBlur: true),
                        Textarea::make('excerpt')
                        ->autosize()
                        ->rows(10),
                        Textarea::make('body')
                        ->autosize()
                        ->rows(10),
                        Select::make('category_id')
                            ->required()
                            ->relationship('category', 'name'),
                ])
                ->aside(),
            Section::make('Pricing')
                ->description('this is description')
                ->schema([
                    TextInput::make('price')
                    ->numeric()
                    ->minValue(0),
                    // Checkbox::make('stock_status')
                    // ->default(Product::STATUS_OUT_OF_STOCK)
                    // ->live(),

                    TextInput::make('manage_stock')
                    ->numeric()
                    ->minValue(0)
                    ->hidden(fn (Get $get): bool => ! $get('stock_status')),
                ])
                ->aside()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('category.name')->searchable()->sortable(),
                TextColumn::make('price')->sortable()->money('idr'),
                TextColumn::make('status')
                ->formatStateUsing(fn (string $state): string => Product::STATUSSES[$state])
            ])
            ->filters([
                //
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            // 'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
