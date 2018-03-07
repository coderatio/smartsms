<?php

$config = [
    /**
     * Your smartsms solutions api token
     */
    'token' => getenv('SMARTSMS_TOKEN'),
    /**
     * Set this 3 if you want to force delivering messages to numbers on DND
     */
    'routing' => getenv('SMARTSMS_ROUTING')
];

return $config;