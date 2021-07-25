<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'get-zipcodes',
        'get-barangays',
        'register-mobile',
        'getall',
        'login-mobile',
        'get-profile',
        'forgot-password',
        'location-schedule',
        'next-location',
        'get-region',
        'get-provinces',
        'get-municipality',
        'get-barangay',
        'check/has/id',
        'waste-type',
        'update/waste-type',
        'add/waste-type',
        'get/routes',
        'update/routes',
        'add/routes',
        'get/schedule',
        'add/schedule',
        'get/schedule/by/day',
        'update/schedule',
        'get/verification',
        'get/status',
        'update/status',
        'get/citizen/patrol',
        'update/concern',
        'get/waste',
        'add/waste',
        'get/swm_location',
        'add/swm_location',
        'update/swm_location',
        'citizen-patrol',
        'get_nearby',
        'waste/return'
        
    ];
}
