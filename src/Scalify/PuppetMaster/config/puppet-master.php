<?php

return [

    /**
     * The api endpoint to connect to. May either be https://puppet-master.io/api/v1/teams/{my-team-slug}/
     * or in case of self hosted the endpoint to reach the gateway at.
     */
    "endpoint" => env('PUPPET_MASTER_ENDPOINT', ''),

    /**
     * The api token to authenticate with.
     */
    "apiToken" => env('PUPPET_MASTER_API_TOKEN', ''),
];
