<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Html;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SpreadsheetPage extends Controller
{
    protected Spreadsheet $spreadsheet;

    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
    }

    public function index()
    {
        $sheet = $this->spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        $sheet->setCellValue('A2', 'Nom');
        $sheet->setCellValue('B2', 'Prénom');
        $sheet->setCellValue('C2', 'Age');
        $sheet->setCellValue('A3', 'Rabe');
        $sheet->setCellValue('B3', 'Jean');
        $sheet->setCellValue('C3', '54');
        $sheet->setCellValue('A4', 'Ralambo');
        $sheet->setCellValue('B4', 'Jakoba');
        $sheet->setCellValue('C4', '38');
        $sheet->setAutoFilter('A2:C10');

        $writer = new Xlsx($this->spreadsheet);
        $fileName = 'sedera.xlsx';
        $writer->save($fileName);
        if (is_file(FCPATH . $fileName))
        {
            return 'Excel generated';
        }

        return 'Excel error';
    }

    public function html()
    {
        $firstHtmlString = '<table>
                  <tr>
                      <td>Hello World</td>
                  </tr>
              </table>';
        $secondHtmlString = '<table>
                  <tr>
                      <td>Hello World</td>
                  </tr>
              </table>';

        $reader = new Html();
        $spreadsheet = $reader->loadFromString($firstHtmlString);
        $reader->setSheetIndex(1);
        $spreadhseet = $reader->loadFromString($secondHtmlString, $spreadsheet);

        $writer = IOFactory::createWriter($spreadsheet, 'Xls');
        $writer->save('html.xls');

        return 'Excel generated';
    }
}