<?php

$compliance_statuses = [

    [
        'name'=>'Compliant',
        'description'=>'Application has not been verified.',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Non-Compliant',
        'description'=>'Application has been fully verified',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Erasure',
        'description'=>'Application has been rejected by the council',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Pending Verification',
        'description'=>'Application has been rejected by the council',
        'created_at'=>now(),
        'updated_at'=>now()
    ]

];
return $compliance_statuses;
