<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Penawaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class PenawaranPdfController extends Controller
{
    public function __invoke(Penawaran $penawaran): Response
    {
        $penawaran->loadMissing(['klient.category', 'bankAccount']);

        $company = Company::query()->latest('id')->first();
        $companyLogoPath = $this->resolvePdfLogoPath($company?->logo);

        $pdf = Pdf::loadView('pdf.invoice.index', [
            'company' => $company,
            'companyLogoPath' => $companyLogoPath,
            'penawaran' => $penawaran,
            'items' => $penawaran->normalized_items,
            'footerText' => '© 2024 Professional Billing Services.',
        ])
            ->setPaper('a4')
            ->setOption([
                'dpi' => 96,
                'defaultFont' => 'DejaVu Sans',
                'isRemoteEnabled' => false,
            ]);

        return $pdf->stream($penawaran->nomor_penawaran.'.pdf');
    }

    private function resolvePdfLogoPath(?string $logo): ?string
    {
        if (blank($logo)) {
            return null;
        }

        $path = public_path('storage/' . ltrim($logo, '/'));

        if (! is_file($path)) {
            $path = storage_path('app/public/' . ltrim($logo, '/'));
        }

        if (! is_file($path)) {
            return null;
        }

        $maxFileSize = 2 * 1024 * 1024;
        $imageSize = @getimagesize($path);

        if ($imageSize === false) {
            return null;
        }

        [$width, $height] = $imageSize;
        $pixelCount = $width * $height;

        if (filesize($path) > $maxFileSize || $pixelCount > 6_000_000) {
            return null;
        }

        return $path;
    }
}
