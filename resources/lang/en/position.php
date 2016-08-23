<?php
return [

    'information' => 'Position information',
    'create'      => 'Create a position',
    'update'      => 'Update position',
    'all'         => 'All positions',

    'start_cycle'   => 'Start cycle',
    'containers'     => 'Containers',
    'position'      => 'Position',
    'positions'     =>  ['at-depot'=>'At depot', 'at-shipper'=>'In the shipper', 'at-pol'=>'At POL',
                         'at-pod'=>'At POD', 'at-board'=>'On Board', 'at-consignee'=>'At consignee',
                         'at-reformed'=>'At Reformed', 'at-expertise'=>'At Expertise',  'at-customsSeizure'=>'Customs Seizures',
                         'at-longStay'=>'Long Stay'],

    'all-status' => ['GOOD'=>'GOOD', 'WAIT QUOTATION'=>'WAIT QUOTATION', 'TOTAL LOSS'=>'TOTAL LOSS',
                     'IN REPARATION'=>'IN REPARATION'],

    'status'         => 'Status',
    'date_in'        => 'Date in',
    'depot'          => 'Depot',
    'date_out_depot' => 'Date out depot',
    'booking'        => 'N° Booking',
    'ETA'            => 'ETA',
    'vessel'         => 'Vessel',
    'travel'         => 'N° Travel',
    'name_shipper'   => 'Name shipper',
    'cin_driver'     => 'CIN driver',
    'id_truck'       => 'ID truck',
    'code_port'      => 'Code port',
    'date_unloading' => 'Date unloading',
    'date_loading'   => 'Date loading',
    'date_out_port'  => 'Date out port',
    'name_consignee' => 'Name consignee',
    'date'           => 'Date ',
    'name'           => 'Name',
    'company'        => 'Company',
    'location'       => 'Location',
    'cost'           => 'Cost',
    'cause'          => 'Cause',
    "reparation_date"              => "Date Reparation",
    "reparation_provider"          => "Provider",
    "reparation_cost"              => "Cost reparation",
    "reparation_reference_invoice" => "Reference invoice reparation",

    'alert-create' => [
        'success' => 'Position was successfully created!',
        'danger'  => 'Position was successfully created!',
        'warning' => 'Position was successfully updated!',
        'info'    => 'Position was successfully updated!',
    ],

    'alert-update' => [
        'success' => 'Position was successfully updated!',
        'danger'  => 'That cycle is end',
        'warning' => 'Position was successfully updated!',
        'info'    => 'Position was successfully updated!',
    ],

    'alert-delete' => [
        'success' => 'Life cycle was successfully deleted!',
        'danger'  => 'Position was successfully deleted!',
        'warning' => 'Position was successfully deleted!',
        'info'    => 'Position was successfully deleted!',
    ],
];