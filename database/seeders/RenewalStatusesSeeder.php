<?php

$renewal_statuses = [

    [
        'name'=>'Compliant',
        'description'=>'Payment and CPD',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Non-Compliant',
        'description'=>'No payment and CPDs',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'In Progress',
        'description'=>'Pending either payment or CPDs',
        'created_at'=>now(),
        'updated_at'=>now()
    ]

];
return $renewal_statuses;
