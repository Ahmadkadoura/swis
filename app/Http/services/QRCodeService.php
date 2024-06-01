<?php

namespace App\Http\services;

use App\Http\Repositories\QRImageWithLogo;
use App\Http\Repositories\transactionRepository;
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use Illuminate\Support\Facades\Storage;

class QRCodeService
{
    private transactionRepository $transactionRepository;

    public function generateQRCode($transaction)
    {
        $data = 'http://127.0.0.1:8000/api/transactions/' . $transaction['id'];

        $logoPath = Storage::disk('assets')->path('logo.png');
        $options = new QROptions();
        $options->version = 10;
        $options->outputBase64 = false;
        $options->scale = 6;
        $options->imageTransparent = false;
        $options->drawCircularModules = true;
        $options->circleRadius = 0.45;
        $options->keepAsSquare = [
            QRMatrix::M_FINDER,
            QRMatrix::M_FINDER_DOT,
        ];
        $options->eccLevel = EccLevel::H;
        $options->addLogoSpace = true;
        $options->logoSpaceWidth = 13;
        $options->logoSpaceHeight = 13;
        $qrcode = new QRCode($options);
        $qrcode->addByteSegment($data);

        $qrOutputInterface = new QRImageWithLogo($options, $qrcode->getQRMatrix());
        $imageData = $qrOutputInterface->dump(null, $logoPath);
        $fileName = 'QR_Transaction_' . $transaction['id'] . '.png';
        $imagePath = 'Transaction/qr_code/' . $fileName;
        Storage::disk('transactions')->put($imagePath, $imageData);

        return $imagePath;
    }
}
