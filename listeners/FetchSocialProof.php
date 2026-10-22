<?php

namespace App\Listeners;

use TightenCo\Jigsaw\Jigsaw;

class FetchSocialProof
{
    private const FALLBACK_PATH = __DIR__.'/../social-proof.json';

    private const TIMEOUT_SECONDS = 5;

    public function handle(Jigsaw $jigsaw)
    {
        // Start from the committed values so a failed request never breaks the build
        $stats = $this->readFallback();

        if ($github = $this->fetchGitHub()) {
            $stats['github'] = $github;
        }

        if ($trustpilot = $this->fetchTrustpilot()) {
            $stats['trustpilot'] = $trustpilot;
        }

        $stats['github']['starsFormatted'] = $this->formatCount($stats['github']['stars'] ?? 0);

        $jigsaw->setConfig('socialProof', $stats);
    }

    private function fetchGitHub(): ?array
    {
        $headers = [
            'Accept: application/vnd.github+json',
            'User-Agent: addy.io-website-build',
        ];

        // Optional, raises the rate limit from 60 to 5,000 requests per hour
        if ($token = env('GITHUB_TOKEN')) {
            $headers[] = 'Authorization: Bearer '.$token;
        }

        $data = $this->getJson('https://api.github.com/repos/anonaddy/anonaddy', $headers);

        if (! isset($data['stargazers_count'])) {
            return null;
        }

        return [
            'stars' => (int) $data['stargazers_count'],
        ];
    }

    private function fetchTrustpilot(): ?array
    {
        $apiKey = env('TRUSTPILOT_API_KEY');
        $businessUnitId = env('TRUSTPILOT_BUSINESS_UNIT_ID');

        if (! $apiKey || ! $businessUnitId) {
            return null;
        }

        $data = $this->getJson(
            'https://api.trustpilot.com/v1/business-units/'.rawurlencode($businessUnitId),
            ['apikey: '.$apiKey]
        );

        if (! isset($data['score']['trustScore'], $data['numberOfReviews']['total'])) {
            return null;
        }

        return [
            'score' => round((float) $data['score']['trustScore'], 1),
            'stars' => (float) ($data['score']['stars'] ?? 0),
            'reviews' => (int) $data['numberOfReviews']['total'],
        ];
    }

    private function getJson(string $url, array $headers): ?array
    {
        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => implode("\r\n", $headers),
                'timeout' => self::TIMEOUT_SECONDS,
                'ignore_errors' => true,
            ],
        ]);

        $body = @file_get_contents($url, false, $context);

        $status = isset($http_response_header[0]) && preg_match('/\s(\d{3})\s/', $http_response_header[0], $m)
            ? (int) $m[1]
            : 0;

        if ($body === false || $status !== 200) {
            echo "FetchSocialProof: request to {$url} failed (HTTP {$status}), using fallback values\n";

            return null;
        }

        $decoded = json_decode($body, true);

        return is_array($decoded) ? $decoded : null;
    }

    private function readFallback(): array
    {
        if (! file_exists(self::FALLBACK_PATH)) {
            return ['github' => ['stars' => 0], 'trustpilot' => null];
        }

        $decoded = json_decode(file_get_contents(self::FALLBACK_PATH), true);

        return is_array($decoded) ? $decoded : ['github' => ['stars' => 0], 'trustpilot' => null];
    }

    private function formatCount(int $count): string
    {
        if ($count < 1000) {
            return (string) $count;
        }

        // 4909 -> "4.9k", 12000 -> "12k"
        return rtrim(rtrim(number_format($count / 1000, 1), '0'), '.').'k';
    }
}
