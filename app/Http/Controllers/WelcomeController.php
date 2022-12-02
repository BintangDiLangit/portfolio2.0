<?php

namespace App\Http\Controllers;

use App\Mail\Offerring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WelcomeController extends Controller
{
    public function index()
    {
        $env = env('APP_URL_API');
        $response = Http::post(env('APP_URL_API') . '/api/v1/seo');
        $responseSkill = Http::post(env('APP_URL_API') . '/api/v1/skills');
        $responsePortfolio = Http::post(env('APP_URL_API') . '/api/v1/all-portfolios');
        $responseCV = Http::post(env('APP_URL_API') . '/api/v1/cv');
        $responseTestimoni = Http::post(env('APP_URL_API') . '/api/v1/clients');
        $data = $response->json()["data"][0];
        $skills = $responseSkill->json()["data"];
        $portfolios = $responsePortfolio->json()["data"];
        $cv = $responseCV->json()["data"];
        $testimonials = $responseTestimoni->json()["data"];
        return view('welcome', compact('data', 'env', 'skills', 'portfolios', 'cv', 'testimonials'));
    }

    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => "required|string",
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('failed', $validator->errors()->first())->withInput();
        }

        try {
            DB::beginTransaction();
            $fullName = $request->full_name;
            $email = $request->email;
            $subject = $request->subject;
            $message = $request->message;
            Mail::to("bintangmfhd@gmail.com")->send(new Offerring($fullName, $email, $subject, $message));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }

    public function detailPortfolio($id)
    {
        $env = env('APP_URL_API');
        $response = Http::post(env('APP_URL_API') . '/api/v1/portfolio/' . $id);
        $data = $response->json()["data"];
        return view('detailportfolio', compact('data', 'env'));
    }
}