<?php

namespace App\Filament\Resources\Penawarans\Schemas;

use App\Models\Company;
use App\Models\Penawaran;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;
use Illuminate\Support\Carbon;

class PenawaranForm
{
    public static function configure(Schema $schema): Schema
    {
        $defaultTaxRate = (float) (Company::query()->value('tax_rate') ?? 0);

        return $schema
            ->components([
                Hidden::make('nomor_penawaran')
                    ->default(fn (): string => Penawaran::generateNomorPenawaran()),
                Select::make('klient_id')
                    ->label('Klient')
                    ->relationship('klient', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('bank_account_id')
                    ->label('Bank Account')
                    ->relationship('bankAccount', 'bank_name')
                    ->getOptionLabelFromRecordUsing(fn ($record): string => $record->bank_name.' - '.$record->account_number)
                    ->searchable()
                    ->preload()
                    ->required(),
                DatePicker::make('tanggal_pembuatan')
                    ->label('Tanggal Pembuatan')
                    ->default(now()->toDateString())
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state): void {
                        if (blank($state) || filled($get('tanggal_jatuh_tempo'))) {
                            return;
                        }

                        $set('tanggal_jatuh_tempo', Carbon::parse($state)->addDays(14)->toDateString());
                    })
                    ->required(),
                DatePicker::make('tanggal_jatuh_tempo')
                    ->label('Tanggal Jatuh Tempo')
                    ->default(now()->addDays(14)->toDateString())
                    ->required(),
                Toggle::make('is_ppn')
                    ->label('Gunakan PPN')
                    ->helperText('Tarif PPN mengikuti nilai tax rate dari data company.'.($defaultTaxRate > 0 ? ' Saat ini '.$defaultTaxRate.'%.' : ''))
                    ->default(false)
                    ->inline(false)
                    ->required(),
                Repeater::make('items')
                    ->label('Item Penawaran')
                    ->schema([
                        TextInput::make('title')
                            ->label('Kategori Item')
                            ->placeholder('Contoh: FITUR UMUM UNTUK PUBLIK')
                            ->required()
                            ->maxLength(255),
                        Repeater::make('sub_items')
                            ->label('Sub Item')
                            ->schema([
                                TextInput::make('deskripsi')
                                    ->label('Deskripsi Layanan')
                                    ->required()
                                    ->columnSpanFull(),
                                TextInput::make('jumlah')
                                    ->label('Jml')
                                    ->numeric()
                                    ->default(1)
                                    ->required(),
                                Hidden::make('jumlah_label')
                                    ->default('paket')
                                    ->dehydrateStateUsing(fn (): string => 'paket'),
                                Placeholder::make('jumlah_label_preview')
                                    ->label('Satuan')
                                    ->content('paket'),
                                TextInput::make('harga_satuan')
                                    ->label('Harga Satuan')
                                    ->mask(RawJs::make(<<<'JS'
                                        (() => {
                                            const digits = ($input ?? '').toString().replace(/\D/g, '')

                                            if (! digits.length) {
                                                return ''
                                            }

                                            return digits.replace(/\B(?=(\d{3})+(?!\d))/g, '.')
                                        })()
                                    JS))
                                    ->stripCharacters('.')
                                    ->dehydrateStateUsing(fn ($state): int => (int) preg_replace('/\D+/', '', (string) $state))
                                    ->numeric()
                                    ->inputMode('numeric')
                                    ->prefix('Rp')
                                    ->default(0)
                                    ->formatStateUsing(fn ($state): ?string => filled($state) ? number_format((float) $state, 0, ',', '.') : null)
                                    ->required(),
                                Placeholder::make('total_preview')
                                    ->label('Total')
                                    ->content(function (Get $get): string {
                                        $jumlah = (float) ($get('jumlah') ?? 0);
                                        $hargaSatuan = (float) preg_replace('/\D+/', '', (string) ($get('harga_satuan') ?? 0));

                                        return 'Rp '.number_format($jumlah * $hargaSatuan, 0, ',', '.');
                                    }),
                            ])
                            ->addActionLabel('Tambah Sub Item')
                            ->defaultItems(1)
                            ->columnSpanFull()
                            ->collapsible(),
                    ])
                    ->addActionLabel('Tambah Kategori Item')
                    ->defaultItems(1)
                    ->columnSpanFull()
                    ->collapsible(),
            ]);
    }
}
