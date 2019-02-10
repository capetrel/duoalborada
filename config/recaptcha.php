<?php
return [
    'api_site_key'      => env('RECAPTCHA_SITE_KEY', ''),
    'api_secret_key'    => env('RECAPTCHA_SECRET_KEY', ''),
    'version'           => 'v3', // supported: v2|invisible
    'skip_ip'           => [] // array of IP addresses - String: dotted quad format e.g.: 127.0.0.1
];
