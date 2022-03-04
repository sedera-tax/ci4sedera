<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode as QrCodeLib;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;

class Qrcode extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $ext = '.svg';

        if ($this->request->getMethod() === 'post'
            && $this->validate([
                'url' => 'trim|required|valid_url'
            ]))
        {
            $url = trim($this->request->getVar('url'));
            if (!$this->valid_url($url)) {
                return $this->fail('Error : url not valid');
            }

            $name = $this->request->getVar('name') ?? null;
            $textLabel = $this->request->getVar('text') ?? null;
            $type = $this->request->getVar('type') ?? null;
            if ($type == 'svg')
            {
                $writer = new SvgWriter();
            }
            else
            {
                $writer = new PngWriter();
                $ext = '.png';
            }

            try {
                // Create QR code
                $qrCode = QrCodeLib::create($url)
                    ->setEncoding(new Encoding('UTF-8'))
                    ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
                    ->setSize(300)
                    ->setMargin(10)
                    ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
                    ->setForegroundColor(new Color(0, 0, 0))
                    ->setBackgroundColor(new Color(255, 255, 255));

                // Create generic logo
                /*$logo = Logo::create(FCPATH.'assets/images/ggfg.jpg')
                    ->setResizeToWidth(50);*/
                $logo = null;

                // Create generic label
                $label = null;
                if (!empty($textLabel)) {
                    $label = Label::create($textLabel)
                        ->setTextColor(new Color(255, 0, 0));
                }

                $result = $writer->write($qrCode, $logo, $label);
                // Directly output the QR code
                //header('Content-Type: '.$result->getMimeType());
                //echo $result->getString();

                $fileName = time();
                if (!empty($name)) {
                    $fileName = $name;
                }
                // Save it to a file
                $result->saveToFile(FCPATH.'qrcode/'.$fileName.$ext);
                $response = [
                    'status'   => 201,
                    'error'    => null,
                    'messages' => [
                        'success' => 'Qrcode Saved'
                    ]
                ];
                return $this->respondCreated($response);
            } catch (\Exception $exception) {
                return $this->fail('Error : ' . $exception->getMessage());
            }
        }
        else
        {
            return $this->failValidationError("Invalid Qrcode");
        }
    }

    public function valid_url($str)
    {
        return (filter_var($str, FILTER_VALIDATE_URL) !== FALSE);
    }
}