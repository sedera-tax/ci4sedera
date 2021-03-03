<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
	public function index()
	{
		return view('welcome_message');
	}

	public function view($page = 'home')
	{
		if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		echo view('templates/header', $data);
		echo view('pages/'.$page, $data);
		echo view('templates/footer', $data);
	}

	public function sendEmail()
    {
        $email = \Config\Services::email();

        $email->setFrom('sedera.aina@gmail.com', 'Yannick');
        $email->setTo('sedera.aina@gmail.com');
        $email->setCC('sedera.aina.mru@gmail.com');
        $email->setBCC('sedera.aina@yahoo.fr');

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');

        if ($x = $email->send())
        {
            die('Email already sent');
        }
        else
        {
            var_dump($x);
            die('Email not send');
        }
    }
}