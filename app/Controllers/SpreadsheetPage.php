<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Html;
use PhpOffice\PhpSpreadsheet\IOFactory;

class SpreadsheetPage extends Controller
{
    protected Spreadsheet $spreadsheet;
    protected array $persons;

    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
        $this->persons = [
            [
                'name' => 'Cristiano Ronaldo',
                'age' => 35,
                'category' => 'Football'
            ],
            [
                'name' => 'Lebron James',
                'age' => 36,
                'category' => 'Basketball'
            ],
            [
                'name' => 'Rafael Nadal',
                'age' => 34,
                'category' => 'Tennis'
            ],
            [
                'name' => 'Usain Bolt',
                'age' => 34,
                'category' => 'Athletisme'
            ],
            [
                'name' => 'Michael Phelps',
                'age' => 35,
                'category' => 'Natation'
            ]
        ];
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
        $writer->save('excel/' . $fileName);
        if (is_file(FCPATH . 'excel/' . $fileName))
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
        $writer->save('excel/html.xls');

        return 'Excel generated';
    }

    public function custom()
    {
        $sheet = $this->spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1','Nom');
        $sheet->setCellValue('B1','Age');
        $sheet->setCellValue('C1','Catégorie');

        $i = 2;
        foreach ($this->persons as $person) {
            $sheet->setCellValue('A'.$i,$person['name']);
            $sheet->setCellValue('B'.$i,$person['age']);
            $sheet->setCellValue('C'.$i,$person['category']);
            $i++;
        }

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);

        $sheet->getStyle('A1:C1')->applyFromArray(
            [
                'font' => [
                    'name' => 'Arial',
                    'bold' => true,
                    'color' => ['rgb' => 'FF0000'],
                ],
                /*'fill' => [
                    'fillType'  => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '000000'],
                ],*/
            ]
        );

        $sheet->getStyle('A1:C1')->getFill()->applyFromArray(
            [
                'fillType' => Fill::FILL_SOLID,
                'color' => ['rgb' => '000000']
            ]
        );

        $sheet->getStyle('A1:C'.$i)->getBorders()->applyFromArray(
            array(
                'allBorders' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array(
                        'rgb' => '000000'
                    )
                )
            )
        );

        $writer = new Xlsx($this->spreadsheet);
        $fileName = 'custom.xlsx';
        $writer->save('excel/' . $fileName);
        if (is_file(FCPATH . 'excel/' . $fileName))
        {
            return 'Excel generated';
        }

        return 'Excel error';
    }
}