<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PDFController extends Controller
{
    public function index(Request $request)
    {
        //$html = $request->input('html');
        $pdf = App::make('dompdf.wrapper');
        $html = '<!doctype html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="../../../../favicon.ico">
        
            <title>Floating labels example for Bootstrap</title>
        
            <!-- Bootstrap core CSS -->
            <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
        
            <!-- Custom styles for this template -->
            <link href="floating-labels.css" rel="stylesheet">
          </head>
        
          <body style="border: 1px solid blue;">
            <form class="form-signin">
              <div class="text-center mb-4" style="color: red; text-align: center; ">
                <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Floating labels</h1>
                <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href="https://caniuse.com/#feat=css-placeholder-shown">Works in latest Chrome, Safari, and Firefox.</a></p>
              </div>
        
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>
        
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
        
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>
              <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
              <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
            </form>
          </body>
        </html>
        ';
        $pdf->loadHTML($html)->setPaper('a5', 'portrait');
        return $pdf->stream('test.pdf');
    }
}
