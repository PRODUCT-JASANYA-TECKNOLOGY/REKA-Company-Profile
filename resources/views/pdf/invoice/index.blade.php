<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $penawaran->nomor_penawaran }}</title>
    <style>
        @page {
            margin: 40px 50px 70px;
        }

        * { 
            box-sizing: border-box; 
        }

        body {
            font-family: DejaVu Sans, 'Inter', sans-serif;
            color: #191c1e;
            background: #ffffff;
            margin: 0;
            padding: 0;
            font-size: 13px;
        }

        /* Utility */
        .text-on-surface-variant { color: #444748; }
        .text-on-primary-container { color: #858383; }
        .text-secondary { color: #0051d5; }
        .border-outline-variant { border-color: #c4c7c7; }
        .uppercase { text-transform: uppercase; }

        /* Typography */
        .font-headline-xl { font-size: 28px; line-height: 1.2; font-weight: bold; letter-spacing: -0.02em; }
        .font-headline-lg { font-size: 20px; line-height: 1.3; font-weight: bold; }
        .font-label-caps { font-size: 10px; line-height: 1.2; font-weight: bold; letter-spacing: 0.05em; text-transform: uppercase; }
        .font-body-md { font-size: 13px; line-height: 1.6; }
        .font-body-sm { font-size: 11px; line-height: 1.5; }
        .font-table-header { font-size: 11px; line-height: 1.4; font-weight: bold; text-transform: uppercase; }

        /* Alignment */
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .text-left { text-align: left; }

        /* Spacing */
        .mb-1 { margin-bottom: 4px; }
        .mb-2 { margin-bottom: 8px; }
        .mb-3 { margin-bottom: 12px; }
        .mb-4 { margin-bottom: 16px; }
        .mb-8 { margin-bottom: 32px; }
        .mb-12 { margin-bottom: 48px; }
        .mt-1 { margin-top: 4px; }
        .mt-2 { margin-top: 8px; }

        table { width: 100%; border-collapse: collapse; }
        
        .layout-table { border: none; padding: 0; margin-bottom: 32px; }
        .layout-table td { vertical-align: top; border: none; padding: 0; }

        /* Payment Card */
        .payment-card {
            background: #f2f4f6;
            padding: 16px 20px;
            border-radius: 4px;
        }

        /* Service Table */
        .service-table th {
            padding: 12px 8px;
            border-bottom: 2px solid #000000;
        }
        .service-table td {
            padding: 12px 8px;
            border-bottom: 1px solid #c4c7c7;
        }
        .service-table .category-row td {
            background: #e6e8ea;
            color: #0051d5;
            padding: 8px;
            border-bottom: none;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        /* Summary Table */
        .summary-container { width: 100%; margin-bottom: 48px; border: none; }
        .summary-container td { border: none; padding: 0; vertical-align: top; }
        .summary-table { width: 100%; border-collapse: collapse; }
        .summary-table td { padding: 6px 0; border: none; }
        .summary-total { border-top: 2px solid #000000; padding-top: 12px !important; margin-top: 12px; }

        /* Footer & Signature */
        .terms-list { margin: 0; padding-left: 16px; }
        .terms-list li { margin-bottom: 4px; line-height: 1.5; }
        .signature-line { border-bottom: 1px solid #191c1e; width: 180px; margin-bottom: 16px; margin-left: auto; }

        /* Absolute Footer */
        .page-footer {
            position: fixed;
            bottom: -30px;
            left: 0;
            right: 0;
            border-top: 1px solid #c4c7c7;
            padding-top: 8px;
            font-size: 10px;
            color: #858383;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
    </style>
</head>
<body>

<div class="page-footer">
    <table style="width: 100%; border: none; padding: 0;">
        <tr>
            <td style="text-align: left; border: none; padding: 0;">&copy; {{ date('Y') }} {{ $company?->name ?? 'Professional Billing Services' }}</td>
            <td style="text-align: right; border: none; padding: 0;">Halaman 1 dari 1</td>
        </tr>
    </table>
</div>

<div class="invoice-canvas">

    <!-- Header Section -->
    <table class="layout-table">
        <tr>
            <td style="width: 55%;">
                @if (filled($companyLogoPath))
                    <div style="margin-bottom: 16px;">
                        <img src="{{ $companyLogoPath }}" alt="Logo" width="120">
                    </div>
                @endif
                <div class="font-headline-xl uppercase">INVOICE LAYANAN DIGITAL</div>
                <div class="text-on-surface-variant font-body-sm mt-1">Digital Solutions Professional Agency</div>
            </td>
            <td style="width: 45%; text-align: right;">
                <div class="mb-4">
                    <div class="font-label-caps text-on-primary-container">NOMOR INVOICE</div>
                    <div class="font-headline-lg">#{{ $penawaran->nomor_penawaran }}</div>
                </div>
                <table style="width: 100%; border: none; padding: 0;">
                    <tr>
                        <td style="text-align: right; padding-right: 24px; border: none;">
                            <div class="font-label-caps text-on-primary-container">TANGGAL TERBIT</div>
                            <div class="font-body-md">{{ $penawaran->tanggal_pembuatan?->translatedFormat('d F Y') ?? $penawaran->tanggal_pembuatan?->format('d M Y') ?? '-' }}</div>
                        </td>
                        <td style="text-align: right; border: none;">
                            <div class="font-label-caps text-on-primary-container">JATUH TEMPO</div>
                            <div class="font-body-md">{{ $penawaran->tanggal_jatuh_tempo?->translatedFormat('d F Y') ?? $penawaran->tanggal_jatuh_tempo?->format('d M Y') ?? '-' }}</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Bill To Section -->
    <table class="layout-table">
        <tr>
            <td style="width: 50%; padding-right: 32px;">
                <div class="font-label-caps text-on-primary-container mb-3">DITAGIHKAN KEPADA</div>
                <div class="font-body-md" style="font-size: 18px; font-weight: bold;">
                    {{ $penawaran->klient?->nama }}
                </div>
                <div class="font-body-md mt-1">
                    {{ $penawaran->klient?->deskripsi }}
                </div>
            </td>
            <td style="width: 50%;">
                <div class="payment-card">
                    <div class="font-label-caps text-secondary mb-2">
                        METODE PEMBAYARAN
                    </div>
                    <div class="font-body-md">
                        {{ $penawaran->bankAccount?->bank_name ?? '-' }}<br/>
                        No. Rek: {{ $penawaran->bankAccount?->account_number ?? '-' }}<br/>
                        A/N: {{ $penawaran->bankAccount?->account_holder_name ?? '-' }}
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <!-- Service Table -->
    <div style="margin-bottom: 32px;">
        <table class="service-table">
            <thead>
                <tr>
                    <th class="font-table-header text-left" style="width: 50%;">Deskripsi Layanan</th>
                    <th class="font-table-header text-center" style="width: 10%;">Jml</th>
                    <th class="font-table-header text-right" style="width: 20%;">Harga Satuan</th>
                    <th class="font-table-header text-right" style="width: 20%;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr class="category-row">
                        <td colspan="4">{{ $item['title'] }}</td>
                    </tr>
                    @foreach ($item['sub_items'] as $subItem)
                        <tr>
                            <td class="font-body-md">{{ $subItem['deskripsi'] }}</td>
                            <td class="font-body-md text-center">
                                {{ rtrim(rtrim(number_format((float) $subItem['jumlah'], 2, ',', '.'), '0'), ',') }} {{ $subItem['jumlah_label'] }}
                            </td>
                            <td class="font-body-md text-right">
                                Rp. {{ number_format((float) $subItem['harga_satuan'], 0, ',', '.') }}
                            </td>
                            <td class="font-body-md text-right">
                                Rp. {{ number_format((float) $subItem['total'], 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Summary Section -->
    <table class="summary-container">
        <tr>
            <td style="width: 55%;"></td>
            <td style="width: 45%;">
                <table class="summary-table">
                    <tr>
                        <td class="font-label-caps text-on-primary-container text-left" style="width: 45%;">SUBTOTAL</td>
                        <td class="font-body-md text-right" style="width: 55%;">Rp. {{ number_format((float) $penawaran->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="font-label-caps text-on-primary-container text-left">PAJAK ({{ $penawaran->is_ppn ? rtrim(rtrim(number_format((float) ($company?->tax_rate ?? 0), 2, ',', '.'), '0'), ',') : '0' }}%)</td>
                        <td class="font-body-md text-right">Rp. {{ number_format((float) $penawaran->ppn, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="font-label-caps uppercase summary-total text-right" style="font-size: 12px; padding-bottom: 4px; border-bottom: none;">TOTAL TAGIHAN</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="font-headline-lg text-secondary text-right" style="font-size: 22px; padding-top: 0; border: none;">Rp. {{ number_format((float) $penawaran->total_tagihan, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Footer & Signature -->
    <table class="layout-table" style="border-top: 1px solid #c4c7c7; padding-top: 48px; margin-top: 64px; margin-bottom: 0;">
        <tr>
            <td style="width: 60%; padding-right: 32px;">
                <div class="font-label-caps text-on-primary-container mb-3">SYARAT &amp; KETENTUAN</div>
                <ul class="font-body-sm text-on-surface-variant terms-list">
                    <li>Harap melakukan pembayaran dalam waktu 14 hari setelah menerima invoice ini.</li>
                    <li>Layanan diproses setelah pembayaran diterima sesuai kesepakatan kerja.</li>
                    <li>Sertakan nomor invoice {{ $penawaran->nomor_penawaran }} dalam keterangan pembayaran Anda.</li>
                </ul>
            </td>
            <td style="width: 40%; text-align: right; vertical-align: bottom;">
                <div class="font-label-caps text-on-primary-container mb-12">TANDA TANGAN RESMI</div>
                <div style="height: 60px;"></div>
                <div class="signature-line"></div>
                <div class="font-body-md" style="font-weight: bold; margin-bottom: 4px;">{{ $company?->name ?? 'Agency Digital Solutions' }}</div>
                <div class="font-body-sm text-on-surface-variant">Finance &amp; Billing</div>
            </td>
        </tr>
    </table>

</div>
</body>
</html>
