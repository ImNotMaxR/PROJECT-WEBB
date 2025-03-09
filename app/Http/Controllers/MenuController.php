<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
      
    /**  
     * Display the contact-us page.  
     */  
    public function contactUs()  
    {  
        $data['link'] = route('home');
        $data['main'] = 'Kelola Kategori';
        $data['sub'] = 'Dashboard';
        $data['sub1'] = 'Kategori Home';
        return view('menu.contact-us');  
    }  
  
    /**  
     * Display the faq page.  
     */  
    public function faq()  
    {  
        $data['link'] = route('home');
        $data['main'] = 'Kelola Kategori';
        $data['sub'] = 'Dashboard';
        $data['sub1'] = 'Kategori Home';
        return view('menu.faq');  
    }  
  
    /**  
     * Display the help-center page.  
     */  
    public function helpCenter()  
    {  
        $data['link'] = route('home');
        $data['main'] = 'Kelola Kategori';
        $data['sub'] = 'Dashboard';
        $data['sub1'] = 'Kategori Home';
        return view('menu.help-center');  
    }  
}
