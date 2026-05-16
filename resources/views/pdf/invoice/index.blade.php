<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $penawaran->nomor_penawaran }}</title>
    <style>
        @page {
            margin: 24px 28px 70px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #191c1e;
            background: #f7f9fb;
        }

        .page {
            background: #ffffff;
            border: 1px solid #c4c7c7;
            padding: 32px;
        }

        .footer {
            position: fixed;
            left: 28px;
            right: 28px;
            bottom: 20px;
            color: #747878;
            font-size: 10px;
            text-align: center;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .muted {
            color: #75859d;
        }

        .caps {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .headline-xl {
            font-size: 30px;
            line-height: 1.2;
            font-weight: 700;
            margin: 0;
        }

        .headline-lg {
            font-size: 22px;
            line-height: 1.3;
            font-weight: 700;
            margin: 0;
        }

        .top-space {
            margin-bottom: 28px;
        }

        .section-space {
            margin-bottom: 32px;
        }

        .logo {
            max-height: 56px;
            max-width: 150px;
            margin-bottom: 14px;
        }

        .header-left {
            float: left;
            width: 58%;
        }

        .header-right {
            float: right;
            width: 34%;
            text-align: right;
        }

        .header-right .caps {
            color: #0051d5;
        }

        .meta-grid {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0;
        }

        .meta-card {
            width: 48%;
            vertical-align: top;
            padding: 0;
        }

        .meta-card-box {
            background: #f2f4f6;
            padding: 18px 20px;
            min-height: 150px;
        }

        .meta-card-box.dark {
            background: #0b1c30;
            color: #ffffff;
        }

        .meta-title {
            margin: 0 0 10px;
            color: #0051d5;
        }

        .meta-card-box.dark .meta-title {
            color: #dbe1ff;
        }

        .meta-value {
            margin: 0;
            line-height: 1.7;
            white-space: pre-line;
        }

        .service-table {
            width: 100%;
            border-collapse: collapse;
        }

        .service-table thead th {
            padding: 14px 8px;
            border-bottom: 2px solid #000000;
            text-align: left;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .service-table tbody td {
            padding: 14px 8px;
            border-bottom: 1px solid #c4c7c7;
            vertical-align: top;
        }

        .service-table .section-row td {
            background: #e6e8ea;
            color: #0051d5;
            padding: 10px 8px;
            border-bottom: none;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .summary {
            width: 280px;
            margin-left: auto;
        }

        .summary-row {
            margin-bottom: 10px;
        }

        .summary-label {
            float: left;
            color: #858383;
        }

        .summary-value {
            float: right;
            text-align: right;
        }

        .summary-total {
            border-top: 2px solid #000000;
            padding-top: 12px;
            margin-top: 12px;
        }

        .summary-total .summary-label {
            color: #191c1e;
            font-size: 11px;
        }

        .summary-total .summary-value {
            color: #0051d5;
            font-size: 22px;
            font-weight: 700;
        }

        .footer-grid {
            width: 100%;
            border-top: 1px solid #c4c7c7;
            padding-top: 24px;
        }

        .footer-col {
            width: 48%;
            vertical-align: top;
        }

        ul {
            margin: 10px 0 0 18px;
            padding: 0;
        }

        li {
            margin-bottom: 6px;
            line-height: 1.6;
        }

        .signature-box {
            text-align: right;
        }

        .signature-space {
            height: 72px;
        }
    </style>
</head>

<body>
    <div class="footer">{{ $footerText }}</div>

    <main class="page">
        <section class="top-space clearfix">
            <div class="header-left">
                @if (filled($companyLogoPath))
                    <img class="logo" src="{{ $companyLogoPath }}" alt="{{ $company->name }}">
                @endif

                <p class="caps muted">Professional Billing Services</p>
                <p class="headline-lg">{{ $company?->name ?? 'Agency Digital Solutions' }}</p>
                <p class="meta-value muted">{{ $company?->address }}</p>
            </div>

            <div class="header-right">
                <p class="caps">Invoice</p>
                <h1 class="headline-xl">{{ $penawaran->nomor_penawaran }}</h1>
            </div>
        </section>

        <section class="section-space">
            <table class="meta-grid">
                <tr>
                    <td class="meta-card">
                        <div class="meta-card-box dark">
                            <p class="caps meta-title">Tagihan Untuk</p>
                            <p class="meta-value">{{ $penawaran->klient?->nama }}
                                {{ $penawaran->klient?->category?->nama ? 'Kategori: ' . $penawaran->klient->category->nama : '' }}
                                {{ $penawaran->klient?->deskripsi }}</p>
                        </div>
                    </td>
                    <td style="width: 4%;"></td>
                    <td class="meta-card">
                        <div class="meta-card-box">
                            <p class="caps meta-title">Detail Invoice</p>
                            <p class="meta-value">Tanggal Terbit: {{ $penawaran->tanggal_pembuatan?->format('d M Y') }}
                                Jatuh Tempo: {{ $penawaran->tanggal_jatuh_tempo?->format('d M Y') }}
                                Status Pajak: {{ $penawaran->is_ppn ? 'PPN Aktif' : 'Tanpa PPN' }}</p>
                        </div>
                    </td>
                </tr>
            </table>
        </section>

        <section class="section-space">
            <div class="meta-card-box">
                <p class="caps meta-title">Metode Pembayaran</p>
                <p class="meta-value">{{ $penawaran->bankAccount?->bank_name }}
                    No. Rek: {{ $penawaran->bankAccount?->account_number }}
                    A/N: {{ $penawaran->bankAccount?->account_holder_name }}
                    {{ $penawaran->bankAccount?->description }}</p>
            </div>
        </section>

        <section class="section-space">
            <table class="service-table">
                <thead>
                    <tr>
                        <th style="width: 50%;">Deskripsi Layanan</th>
                        <th class="text-center" style="width: 14%;">Jml</th>
                        <th class="text-right" style="width: 18%;">Harga Satuan</th>
                        <th class="text-right" style="width: 18%;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="section-row">
                            <td colspan="4" class="caps">{{ $item['title'] }}</td>
                        </tr>
                        @foreach ($item['sub_items'] as $subItem)
                            <tr>
                                <td>{{ $subItem['deskripsi'] }}</td>
                                <td class="text-center">
                                    {{ rtrim(rtrim(number_format((float) $subItem['jumlah'], 2, ',', '.'), '0'), ',') }}
                                    {{ $subItem['jumlah_label'] }}</td>
                                <td class="text-right">Rp.
                                    {{ number_format((float) $subItem['harga_satuan'], 0, ',', '.') }}</td>
                                <td class="text-right">Rp. {{ number_format((float) $subItem['total'], 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </section>

        <section class="section-space">
            <div class="summary">
                <div class="summary-row clearfix">
                    <span class="summary-label caps">Subtotal</span>
                    <span class="summary-value">Rp.
                        {{ number_format((float) $penawaran->subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="summary-row clearfix">
                    <span class="summary-label caps">Pajak
                        ({{ $penawaran->is_ppn ? rtrim(rtrim(number_format((float) ($company?->tax_rate ?? 0), 2, ',', '.'), '0'), ',') : '0' }}%)</span>
                    <span class="summary-value">Rp. {{ number_format((float) $penawaran->ppn, 0, ',', '.') }}</span>
                </div>
                <div class="summary-total clearfix">
                    <span class="summary-label caps">Total Tagihan</span>
                    <span class="summary-value">Rp.
                        {{ number_format((float) $penawaran->total_tagihan, 0, ',', '.') }}</span>
                </div>
            </div>
        </section>

        <footer class="footer-grid">
            <table style="width: 100%;">
                <tr>
                    <td class="footer-col">
                        <span class="caps muted">Syarat & Ketentuan</span>
                        <ul>
                            <li>Harap melakukan pembayaran dalam waktu 14 hari setelah menerima invoice ini.</li>
                            <li>Layanan diproses setelah pembayaran diterima sesuai kesepakatan kerja.</li>
                            <li>Sertakan nomor invoice {{ $penawaran->nomor_penawaran }} dalam keterangan pembayaran
                                Anda.</li>
                        </ul>
                    </td>
                    <td style="width: 4%;"></td>
                    <td class="footer-col signature-box">
                        <span class="caps muted">Hormat Kami</span>
                        <div class="signature-space"></div>
                        <strong>{{ $company?->name ?? 'Agency Digital Solutions' }}</strong>
                        <div class="muted">Finance & Billing</div>
                    </td>
                </tr>
            </table>
        </footer>
    </main>
</body>

</html>
