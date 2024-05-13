<?php

namespace App\Http\Repositories;

use chillerlan\QRCode\Output\QRCodeOutputException;
use chillerlan\QRCode\Output\QRGdImagePNG;

class QRImageWithLogo extends QRGdImagePNG
{
    /**
     * Dump the QR code image with a logo.
     *
     * @param  string|null  $file  Optional file path to save the image to.
     * @param  string|null  $logoPath  Path to the logo image file.
     * @return string Returns the image data as a string.
     *
     * @throws \chillerlan\QRCode\Output\QRCodeOutputException If the logo file is invalid or cannot be read.
     */
    public function dump(?string $file = null, ?string $logoPath = null): string
    {
        $this->options->returnResource = true;
        if (!is_file($logoPath) || !is_readable($logoPath)) {
            throw new QRCodeOutputException('Invalid logo file');
        }

        parent::dump($file);
        $im = imagecreatefrompng($logoPath);
        $w = imagesx($im);
        $h = imagesy($im);
        $lw = (($this->options->logoSpaceWidth - 2) * $this->options->scale);
        $lh = (($this->options->logoSpaceHeight - 2) * $this->options->scale);
        $ql = ($this->matrix->getSize() * $this->options->scale);
        imagecopyresampled($this->image, $im, (($ql - $lw) / 2), (($ql - $lh) / 2), 0, 0, $lw, $lh, $w, $h);
        $imageData = $this->dumpImage();

        return $imageData;
    }
}


