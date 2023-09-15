<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class FillPDFController extends Controller
{   
    public function process(Request $request){
        $user = auth()->user();
        $name = $user->fullname;
        $outputfile = public_path().'sertif.pdf';
        $this->fillPDF(public_path().'\certificate\sertif.pdf',$outputfile,$name);

        return response()->file($outputfile);
    }

    public function fillPDF($file, $outputfile, $nama){
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($template);
        $top = 90;
        $right = 120;
        $name = $nama;
        $fpdi->SetFont('Helvetica','B','17');
        $fpdi->SetTextColor(25,25,25);
        $fpdi->Text($right, $top, $name);
        
        return $fpdi->Output($outputfile, 'F');
    }
}
