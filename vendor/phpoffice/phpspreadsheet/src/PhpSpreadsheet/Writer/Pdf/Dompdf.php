<?php

namespace PhpOffice\PhpSpreadsheet\Writer\pdf;

use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Writer\pdf;

class Dompdf extends pdf
{
    /**
     * Gets the implementation of external pdf library that should be used.
     *
     * @return \Dompdf\Dompdf implementation
     */
    protected function createExternalWriterInstance()
    {
        return new \Dompdf\Dompdf();
    }

    /**
     * Save Spreadsheet to file.
     *
     * @param string $pFilename Name of the file to save as
     *
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function save($pFilename)
    {
        $fileHandle = parent::prepareForSave($pFilename);

        //  Default pdf paper size
        $paperSize = 'LETTER'; //    Letter    (8.5 in. by 11 in.)

        //  Check for paper size and page orientation
        if ($this->getSheetIndex() === null) {
            $orientation = ($this->spreadsheet->getSheet(0)->getPageSetup()->getOrientation()
                == PageSetup::ORIENTATION_LANDSCAPE) ? 'L' : 'P';
            $printPaperSize = $this->spreadsheet->getSheet(0)->getPageSetup()->getPaperSize();
        } else {
            $orientation = ($this->spreadsheet->getSheet($this->getSheetIndex())->getPageSetup()->getOrientation()
                == PageSetup::ORIENTATION_LANDSCAPE) ? 'L' : 'P';
            $printPaperSize = $this->spreadsheet->getSheet($this->getSheetIndex())->getPageSetup()->getPaperSize();
        }

        $orientation = ($orientation == 'L') ? 'landscape' : 'portrait';

        //  Override Page Orientation
        if ($this->getOrientation() !== null) {
            $orientation = ($this->getOrientation() == PageSetup::ORIENTATION_DEFAULT)
                ? PageSetup::ORIENTATION_PORTRAIT
                : $this->getOrientation();
        }
        //  Override Paper Size
        if ($this->getPaperSize() !== null) {
            $printPaperSize = $this->getPaperSize();
        }

        if (isset(self::$paperSizes[$printPaperSize])) {
            $paperSize = self::$paperSizes[$printPaperSize];
        }

        //  Create pdf
        $pdf = $this->createExternalWriterInstance();
        $pdf->setPaper(strtolower($paperSize), $orientation);

        $pdf->loadHtml(
            $this->generateHTMLHeader(false) .
            $this->generateSheetData() .
            $this->generateHTMLFooter()
        );
        $pdf->render();

        //  Write to file
        fwrite($fileHandle, $pdf->output());

        parent::restoreStateAfterSave($fileHandle);
    }
}
