<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SupabaseService
{
    protected $url;
    protected $key;

    public function __construct()
    {
        $this->url = env('SUPABASE_URL');
        $this->key = env('SUPABASE_KEY');
    }

    public function getDrivers()
    {
        return Http::withHeaders([
            'apikey' => $this->key,
            'Authorization' => 'Bearer ' . $this->key,
        ])->get($this->url . '/rest/v1/drivers?select=*')->json();
    }

    public function getDriver($id)
    {
        $response = Http::withHeaders([
            'apikey' => $this->key,
            'Authorization' => 'Bearer ' . $this->key,
        ])->get($this->url . '/rest/v1/drivers?select=*&id=eq.' . $id);

        $data = $response->json();
        return $data[0] ?? null;
    }

    public function getDriverByUsername($username)
    {
        $response = Http::withHeaders([
            'apikey' => $this->key,
            'Authorization' => 'Bearer ' . $this->key,
        ])->get($this->url . '/rest/v1/drivers?select=*&username=eq.' . $username);

        $data = $response->json();
        return $data[0] ?? null;
    }

    public function updateDriver($id, $data)
    {
        return Http::withHeaders([
            'apikey' => $this->key,
            'Authorization' => 'Bearer ' . $this->key,
        ])->patch($this->url . '/rest/v1/drivers?id=eq.' . $id, $data);
    }

    public function createEntryLog($data)
    {
        return Http::withHeaders([
            'apikey' => $this->key,
            'Authorization' => 'Bearer ' . $this->key,
        ])->post($this->url . '/rest/v1/entry_logs', $data);
    }
}
