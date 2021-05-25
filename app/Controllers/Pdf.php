<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf extends Controller
{
    protected Dompdf $pdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $this->pdf = new Dompdf($options);
    }

    public function index()
    {
        return view('pdf/pdfhtml');
    }

    public function htmlToPDF()
    {
        $this->pdf->loadHtml(view('pdf/pdfhtml'));

        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $this->pdf->render();

        // Output the generated PDF to Browser
        $this->pdf->stream('sedera_'.time().'.pdf');
    }

    public function generatePdf()
    {
        $options = $this->pdf->getOptions();
        $options->setDefaultFont('Roboto');
        /*$options->setIsHtml5ParserEnabled(true);
        $options->setIsRemoteEnabled(true);*/
        $this->pdf->setOptions($options);

        /*$context = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed'=> TRUE
            ]
        ]);
        $this->pdf->setHttpContext($context);*/

        $this->pdf->loadHtml(view('pdf/template'));

        // Render the HTML as PDF
        $this->pdf->render();

        // Output the generated PDF to Browser
        $this->pdf->stream('sedera_'.time().'.pdf');
    }

    public function downloadPdf()
    {
        $options = $this->pdf->getOptions();
        $options->setDefaultFont('Roboto');
        $this->pdf->setOptions($options);

        $this->pdf->loadHtml(view('pdf/template1'));

        // Render the HTML as PDF
        $this->pdf->render();

        $filePath = FCPATH . 'pdf/' . 'sedera_'.time().'.pdf';

        $output = $this->pdf->output();
        file_put_contents($filePath, $output);

        return 'PDF généré';
    }
}