<?php

namespace App\Services;

use App\Models\Admin\FacebookToken;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;

class FacebookService
{
    private string $accessToken;
    private string $graphUrl;
    private Client $client;

    public function __construct()
    {
        $this->accessToken = FacebookToken::where('id', 1)->value('facebook_token') ?? '';
        $this->graphUrl = env('FACEBOOK_GRAPH_URL');
        $this->client = new Client([
            'base_uri' => $this->graphUrl,
            'timeout' => 30,
            'http_errors' => false,
        ]);
    }

    /**
     * Get leads from a Facebook Lead Form.
     *
     * @param string $formId
     * @return array
     * @throws \Exception
     */
    public function getLeads(string $formId): array
    {
        $response = $this->client->get(
            "{$formId}/leads",
            [
                'query' => [
                    'access_token' => $this->accessToken,
                    'fields' => 'created_time,id,ad_id,form_id,field_data',
                ],
            ]
        );

        $statusCode = $response->getStatusCode();

        $data = json_decode(
            (string) $response->getBody(),
            true
        );

        if (
            $statusCode < 200 ||
            $statusCode >= 300
        ) {
            throw new \Exception(
                $data['error']['message']
                    ?? 'An error occurred while fetching Facebook leads.'
            );
        }

        if (!is_array($data)) {
            throw new \Exception(
                'Facebook returned an invalid response.'
            );
        }

        return $data;
    }

    /**
     * Get leads from multiple Facebook Lead Forms concurrently.
     *
     * @param array $formIds
     * @return array
     * @throws \Exception
     */
    public function leadsBulkRequest(array $formIds): array
    {
        $promises = [];

        foreach ($formIds as $formId) {

            $formId = trim($formId);

            if (empty($formId)) {
                continue;
            }

            $promises[$formId] = $this->client->getAsync(
                "{$formId}/leads",
                [
                    'query' => [
                        'access_token' => $this->accessToken,
                        'fields' => 'created_time,id,ad_id,form_id,field_data',
                    ],
                ]
            );
        }

        if (empty($promises)) {
            return [];
        }

        $responses = Utils::unwrap($promises);

        $results = [];

        foreach ($responses as $formId => $response) {

            $statusCode = $response->getStatusCode();

            $data = json_decode(
                (string) $response->getBody(),
                true
            );

            if (
                $statusCode < 200 ||
                $statusCode >= 300
            ) {
                throw new \Exception(
                    $data['error']['message']
                        ?? "An error occurred while fetching leads for form {$formId}."
                );
            }

            if (!is_array($data)) {
                throw new \Exception(
                    "Facebook returned an invalid response for form {$formId}."
                );
            }

            $results[$formId] = $data;
        }

        return $results;
    }
}
