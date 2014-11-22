<?php

namespace Coreproc\Procex\Repository;

use GuzzleHttp\Client;

class Request
{
    protected $baseUrl = '';

    private $query;
    private $isSql;
    private $resource_id;

    public $data;
    public $errors = [];

    public function __construct($query, $isSql = false, $resource_id = null) {
        $this->query       = $query;
        $this->isSql       = $isSql;
        $this->resource_id = $resource_id;

        $this->baseUrl = $isSql ? \Config::get('procex.philgeps_api.sql_baseUrl') : \Config::get('procex.philgeps_api.search_baseUrl');

        $this->validate();
    }

    public function execute() {
        if (empty($this->errors)) {
            $client = new Client();

            /** @noinspection PhpVoidFunctionResultUsedInspection */
            $response = null;

            try {
                $response = $this->isSql ? $client->get($this->baseUrl, [
                    'query' => [
                        'sql' => $this->query
                    ]
                ]) : $client->get($this->baseUrl, [
                    'query' => [
                        'resource_id' => $this->resource_id,
                        'q'           => $this->query
                    ]
                ]);

                if ($response->getStatusCode() == '200') {
                    $temp = json_decode($response->getBody());

                    if ($temp->success) {
                        $this->data = $temp->result->records;
                    } else {
                        $this->errors = $temp->error->query;
                    }

                    return true;
                } else {
                    $this->errors[] = $response;

                    return false;
                }
            } catch (\Exception $e) {

                return false;
            }
        }

        return false;
    }

    private function validate() {
        if (empty($this->query)) {
            $this->errors[] = 'Error: No supplied query string';
        }
    }

} 
