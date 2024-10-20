<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestSchoolController extends Controller
{

    public function index()
    {
        return view('TestNPSN');
    }


    public function getSchoolData(Request $request)
    {
        // Validate the input
        $request->validate([
            'npsn' => 'required|digits:8',
        ]);

        // Get the NPSN from the form input
        $npsn = $request->input('npsn');

        // Create a new client instance
        $client = new Client();

        // The API URL with dynamic NPSN
        $url = 'https://api-sekolah-indonesia.vercel.app/sekolah?npsn='.$npsn;

        try {
            // Send a GET request to the API with SSL verification disabled
            $response = $client->request('GET', $url, ['verify' => false]);

            // Get the response body and decode it into an associative array
            $data = json_decode($response->getBody(), true);

            // Check if the status is success
            if ($data['status'] == 'success' && !empty($data['dataSekolah'])) {
                // Return the data as JSON
                return response()->json(['status' => 'success', 'school' => $data['dataSekolah'][0]]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'No data found for the given NPSN']);
            }
        } catch (\Exception $e) {
            // Handle any errors (e.g., network issues, invalid response)
            return response()->json(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
        }
    }
}
