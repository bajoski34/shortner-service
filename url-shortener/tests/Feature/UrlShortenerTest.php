<?php

namespace Tests\Feature;

use Tests\TestCase;

class UrlShortenerTest extends TestCase
{
    public function test_encode_url()
    {
        $response = $this->postJson('/api/v1/encode', ['url' => 'https://example.com']);
        $response->assertStatus(200)->assertJsonStructure(['short_url', 'original_url']);
    }

    public function test_decode_url()
    {
        $encodeResponse = $this->postJson('/api/v1/encode', ['url' => 'https://example.com']);
        $shortCode = basename($encodeResponse['short_url']);

        $decodeResponse = $this->postJson('/api/v1/decode', ['short_code' => $shortCode]);
        $decodeResponse->assertStatus(200)->assertJson(['original_url' => 'https://example.com']);
    }
}