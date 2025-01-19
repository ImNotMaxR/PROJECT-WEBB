<?php  
  
namespace App\Http\Controllers;  
  
use Illuminate\Http\Request;  
  
class LandingController extends Controller  
{  
    /**  
     * Display a listing of the resource.  
     */  
    /**  
     * Show the form for creating a new resource.  
     */  
    public function create()  
    {  
        //  
    }  
  
    /**  
     * Store a newly created resource in storage.  
     */  
    public function store(Request $request)  
    {  
        //  
    }  
  
    /**  
     * Display the specified resource.  
     */  
    public function show(string $id)  
    {  
        //  
    }  
  
    /**  
     * Show the form for editing the specified resource.  
     */  
    public function edit(string $id)  
    {  
        //  
    }  
  
    /**  
     * Update the specified resource in storage.  
     */  
    public function update(Request $request, string $id)  
    {  
        //  
    }  
  
    /**  
     * Remove the specified resource from storage.  
     */  
    public function destroy(string $id)  
    {  
        //  
    }  
  
    /**  
     * Display the contact-us page.  
     */  
    public function contactUs()  
    {  
        return view("contact-us");  
    }  
  
    /**  
     * Display the faq page.  
     */  
    public function faq()  
    {  
        return view("menu/faq");  
    }  
  
    /**  
     * Display the help-center page.  
     */  
    public function helpCenter()  
    {  
        return view("help-center");  
    }  
}  
