<?php

namespace App;

use App\Models\User;
use Carbon\Carbon;
use GUMP;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\Filesystem\Filesystem;

/**
- Composer
- SwiftMailer - отправка писем
- Шаблонизатор Twig
- Парсинг HTML (Symfony Crawler)
- Symfony FileSystem
- Carbon - работа со временем
- Symfony DotEnv - работа с переменными окружения
 * Class Courses
 * @package App
 */
class Courses extends MainController
{

    public function carbon()
    {
        $davno= Carbon::now()

//            ->subDay()
//            ->subMonth(2)
//            ->addYear()
//            ->addHour()
            ->subMinutes(15)
        ;
        Carbon::setLocale('ru');
//
//        echo Carbon::now()->formatLocalized('%A %d %B %Y');
        echo $davno->diffForHumans(Carbon::now());

    }

    public function php()
    {
        echo 'PHP IS HERE';
    }

    public function index()
    {
        $userModel = new User();
        $users = $userModel->all();
        $data = [
            'users' => $users
        ];
        $data['moredata'] = 'moredata';

        $this->view->render('course_users', $data);
    }

    public function crawler()
    {
        $html = file_get_contents('https://bash.im');
        $crawler = new Crawler($html);
        $parsedContent = $crawler->filter('.quote .id');
        $quotes = [];
        foreach ($parsedContent as $parsed) {
            $quotes[]= $parsed->getAttribute('href');

//            $quotes[] = $parsed->textContent;
        }

        echo json_encode($quotes);
    }

    public function swift()
    {
        $transport = (new Swift_SmtpTransport('smtp.mail.ru', 587, 'tls'))
            ->setUsername('sadasddddddddddddddd111@mail.ru')
            ->setPassword('qwerty1234')
        ;

        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message('Subj'))
            ->setFrom(['sadasddddddddddddddd111@mail.ru' => 'Ivan Ivanov'])
            ->setTo(['itvrd2@yandex.ru' => 'name'])
            ->attach(\Swift_Attachment::fromPath(APPLICATION_PATH.'/../debug')->setFilename('test.pdf'))
            ->setBody('Привет, вот твоя презентация')
        ;

        $result = $mailer->send($message);
        print_r($result);
    }

    public function twig()
    {
        $this->view->twigLoad('test', ['test' => 'asd', 'isTest' => true]);
//        $this->view->render('test', ['test' => 'asd', 'isTest' => true]);
    }

    public function fs()
    {
        $fs = new Filesystem();
        $fs->mkdir(APPLICATION_PATH.'testdir');
        $fs->touch(APPLICATION_PATH.'test');
        $fs->exists(APPLICATION_PATH.'test');
        $fs->copy(APPLICATION_PATH. 'test', APPLICATION_PATH. 'test2');
//
        $fs->remove(APPLICATION_PATH.'testdir');
        $fs->remove(APPLICATION_PATH.'test');
        $fs->remove(APPLICATION_PATH.'test2');
        echo 'ALL DONE';
    }

    public function env()
    {
        echo getenv('DB_HOST').':'.getenv('DB_PASSWORD');
    }

}