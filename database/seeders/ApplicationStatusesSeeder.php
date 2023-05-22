<?php

$application_statuses = [


    [
        'name'=>'Pending verification',
        'description'=>'Application has not been verified, still in process.',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Verified',
        'description'=>'Application has been fully verified, certificate can be issued',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Verified with shortfalls',
        'description'=>'Application has been verified but has shortfalls to attend to, certificate cannot be issued till cleared',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Denied',
        'description'=>'Application has been rejected by the council',
        'created_at'=>now(),
        'updated_at'=>now()
    ]

];
return $application_statuses;
