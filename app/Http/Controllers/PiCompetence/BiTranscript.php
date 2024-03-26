<?php

namespace App\Http\Controllers\PiCompetence;
use App\Http\Controllers\Controller;
use App\Services\BiService\BiService;
use PDF;

class BiTranscript extends Controller
{
    private $biService;

    public function __construct(
    BiService $biService,
    )
    {
        $this->biService = $biService;
    }

    public function index()
    {
        $data['bis'] = $this->biService->getAllBis();
        $pdf = PDF::loadView('bi_transcript/bi-transcript-pdf', $data);
        $fileName = 'bi.' . 'pdf';
        return $pdf->stream($fileName);
    }

    public function indexpi()
    {
        $data['bis'] = $this->biService->getAllBis();
        $pdf = PDF::loadView('bi_transcript/pi-transcript-pdf', $data);
        $fileName = 'bi.' . 'pdf';
        return $pdf->stream($fileName);
    }

    public function reportCard()
    {
        $imagePath = public_path('assets/images/report-top-img.jpeg');
        $logoPath  = public_path('assets/images/logo-noip.jpeg');
        $cap       = public_path('assets/images/graduation-cap.png');

        $data = [
            'bannarImagePath' => $imagePath,
            'logoPath' => $logoPath,
            'cap' => $cap,
        ];

        $pdf = PDF::loadView('bi_transcript/report-card-pdf', $data);
        $fileName = 'bi.' . 'pdf';
        return $pdf->stream($fileName);
    }




}
