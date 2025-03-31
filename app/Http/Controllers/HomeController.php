<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;
// use RalphJSmit\Laravel\SEO\Support\SEO; // Perbaikan penulisan namespace

class HomeController extends Controller
{
    public function index()
    {
        // $seo = SEOData::make()->title('Sistem Penerimaan Murid Baru - SMP Plus Al-Qodiri Jember')
        //     ->description('Website Resmi Sistem Penerimaan Murid Baru SMP Plus Al-Qodiri Jember')
        //     ->keywords(["Al-Qodiri Jember", "Pondok Pesantren",]);
        // // ->author("Nama Temen-Temen");


        return view('landing', [
            'SEOData' => new SEOData(
                title: 'Sistem Penerimaan Murid Baru - SMP Plus Al-Qodiri Jember',
                description: 'Website Resmi Sistem Penerimaan Murid Baru SMP Plus Al-Qodiri Jember',
            )
        ]);
    }
}
