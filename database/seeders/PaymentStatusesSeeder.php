<?php

$payment_statuses = [

    [
        'name'=>'Paid',
        'description'=>'Fully paid',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Payment Plan',
        'description'=>'On a payment plan',
        'created_at'=>now(),
        'updated_at'=>now()
    ],
    [
        'name'=>'Owing',
        'description'=>'Debtor',
        'created_at'=>now(),
        'updated_at'=>now()
    ]

];
return $payment_statuses;
