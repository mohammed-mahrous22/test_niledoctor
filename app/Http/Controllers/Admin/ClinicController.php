<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
   public function index()
   {
       return view('admin.clinic');
   }
   public function create()
   {
       return view('admin.clinic.create');
   }
   public function store()
   {
       return view('admin.clinic');
   }
   public function update()
   {
       return view('admin.clinic');
   }
   public function delete()
   {
       return view('admin.clinic');
   }
}
