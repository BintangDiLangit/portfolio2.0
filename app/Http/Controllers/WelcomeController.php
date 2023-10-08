<?php

namespace App\Http\Controllers;

use App\Mail\Offerring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class WelcomeController extends Controller
{
    public function index()
    {
        $client = new Client();

        $response = $client->request('POST', config('services.main_api.base_uri') . '/api/v1/seo');
        $dataSeo = json_decode($response->getBody(), true)['data'][0];

        $responseSkill = $client->request('POST', env('APP_URL_API') . '/api/v1/skills');
        $skills = json_decode($responseSkill->getBody(), true)['data'];

        $responsePortfolio = $client->request('POST', env('APP_URL_API') . '/api/v1/all-portfolios');
        $portfolios = json_decode($responsePortfolio->getBody(), true)['data'];

        $responseCV = $client->request('POST', env('APP_URL_API') . '/api/v1/cv');
        $cv = json_decode($responseCV->getBody(), true)['data'];

        $responseTestimoni = $client->request('POST', env('APP_URL_API') . '/api/v1/clients');
        $testimonials = json_decode($responseTestimoni->getBody(), true)['data'];

        $responseAwardee = $client->request('POST', env('APP_URL_API') . '/api/v1/all-awardees');
        $awardees = json_decode($responseAwardee->getBody(), true)['data'];

        $responseTotalPortfolios = $client->request('POST', env('APP_URL_API') . '/api/v1/all-portfolios');
        $totalPortfolios = json_decode($responseTotalPortfolios->getBody(), true)['count'];

        $env = env('APP_URL_API');

        return view('welcome', compact('dataSeo', 'env', 'skills', 'portfolios', 'cv', 'testimonials', 'awardees', 'totalPortfolios'));
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
        }
    }

    public function detailPortfolio($id)
    {
        $env = env('APP_URL_API');
        $response = Http::post(env('APP_URL_API') . '/api/v1/portfolio/' . $id);
        $responseSeo = Http::post(env('APP_URL_API') . '/api/v1/seo');
        if ($response->getStatusCode() == 200) {
            $data = $response->json()["data"];
            $dataSeo = $responseSeo->json()["data"][0];
            return view('detailportfolio', compact('data', 'env', 'dataSeo'));
        }
        return redirect(route('welcome'));
    }

    public function loadMore(Request $request)
    {
        $skip = $request->input('skip', 0);
        $responseLoadMore = Http::post(env('APP_URL_API') . '/api/v1/load-more-portfolios/' . $skip);
        $portfolios = $responseLoadMore->json()["data"];
        return response()->json($portfolios);
    }
}
