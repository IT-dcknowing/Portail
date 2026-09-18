<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Guide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $creationServices = Service::active()->byCategory('creation')->take(4)->get();
        $testimonials = [
            [
                'name' => 'Sara Fellaquine',
                'position' => 'GM France Urban',
                'content' => "J'avais besoin de créer mon entreprise rapidement. J'ai été accompagné de bout en bout et le service client était très sympathique. Je recommande à tous ceux qui ne veulent pas se prendre la tête avec le juridique.",
            ],
            [
                'name' => 'Adrien Mennillo',
                'position' => 'Fondateur de uTip',
                'content' => "Simple et efficace, plus besoin de dépenser une fortune pour créer sa société. J'ai déjà recommandé LegalPlace à plusieurs amis.",
            ],
            [
                'name' => 'Ahmad Chamseddine',
                'position' => 'Co-fondateur de ThaleTech',
                'content' => "J'avais besoin de modifier mes statuts et je ne savais pas à qui m'adresser. L'équipe a été très réactive et a su traiter mon dossier rapidement. Je repasserai par les services de LegalPlace.",
            ],
        ];
        
        return view('home', compact('creationServices', 'testimonials'));
    }

    
    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        return view('faq');
    }
    public function showSARLF()
    {
        return view('showSARLF');
    }
     public function showSAF()
    {
        return view('showSAF');
    }
    
      public function showSNCF()
    {
        return view('showSNCF');
    }
    
     public function showSCSF()
    {
        return view('showSCSF');
    }
    
      public function showSARLUF()
    {
        return view('showSARLUF');
    }
    
      public function showSEPF()
    {
        return view('showSEPF');
    }
    
       public function showONGF()
    {
        return view('showONGF');
    }
    
       public function showSCIF()
    {
        return view('showSCIF');
    }
       public function showFONDATIONF()
    {
        return view('showFONDATIONF');
    }
      public function showSCOOPSF()
    {
        return view('showSCOOPSF');
    }
      public function showEIF()
    {
        return view('showEIF');
    }
      public function showSASUF()
    {
        return view('showSASUF');
    }
     
       public function showFILIALEF()
    {
        return view('showFILIALEF');
    }
    
        public function simulateur()
    {
        return view('simulateur');
    }
   
}
    