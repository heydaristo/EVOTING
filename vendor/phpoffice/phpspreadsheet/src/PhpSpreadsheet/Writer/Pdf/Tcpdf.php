<?php

namespace PhpOffice\PhpSpreadsheet\Writer\pdf;

use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Writer\pdf;

class Tcpdf extends pdf
{
    /**
     * Gets the implementation of external pdf library that should be used.
     *
     * @param string $orientation Page orientation
     * @param string $unit Unit measure
     * @param string $paperSize Paper size
     *
     * @return \TCpdf implementation
     */
    protected function createExternalWriterInstance($orientation, $unit, $paperSize)
    {
        return new \TCpdf($orientation, $unit, $paperSize);
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
            $printMargins = $this->spreadsheet->getSheet(0)->getPageMargins();
        } else {
            $orientation = ($this->spreadsheet->getSheet($this->getSheetIndex())->getPageSetup()->getOrientation()
                == PageSetup::ORIENTATION_LANDSCAPE) ? 'L' : 'P';
            $printPaperSize = $this->spreadsheet->getSheet($this->getSheetIndex())->getPageSetup()->getPaperSize();
            $printMargins = $this->spreadsheet->getSheet($this->getSheetIndex())->getPageMargins();
        }

        //  Override Page Orientation
        if ($this->getOrientation() !== null) {
            $orientation = ($this->getOrientation() == PageSetup::ORIENTATION_LANDSCAPE)
                ? 'L'
                : 'P';
        }
        //  Override Paper Size
        if ($this->getPaperSize() !== null) {
            $printPaperSize = $this->getPaperSize();
        }

        if (isset(self::$paperSizes[$printPaperSize])) {
            $paperSize = self::$paperSizes[$printPaperSize];
        }

        //  Create pdf
        $pdf = $this->createExternalWriterInstance($orientation, 'pt', $paperSize);
        $pdf->setFontSubsetting(false);
        //    Set margins, converting inches to points (using 72 dpi)
        $pdf->SetMargins($printMargins->getLeft() * 72, $printMargins->getTop() * 72, $printMargins->getRight() * 72);
        $pdf->SetAutoPageBreak(true, $printMargins->getBottom() * 72);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();

        //  Set the appropriate font
        $pdf->SetFont($this->getFont());
        $pdf->writeHTML(
            $this->generateHTMLHeader(false) .
            $this->generateSheetData() .
            $this->generateHTMLFooter()
        );

        //  Document info
        $pdf->SetTitle($this->spreadsheet->getProperties()->getTitle());
        $pdf->SetAuthor($this->spreadsheet->getProperties()->getCreator());
        $pdf->SetSubject($this->spreadsheet->getProperties()->getSubject());
        $pdf->SetKeywords($this->spreadsheet->getProperties()->getKeywords());
        $pdf->SetCreator($this->spreadsheet->getProperties()->getCreator());

        //  Write to file
        fwrite($fileHandle, $pdf->output($pFilename, 'S'));

        parent::restoreStateAfterSave($fileHandle);
    }
}
