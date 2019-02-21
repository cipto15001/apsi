<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Remote Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default connection that will be used for SSH
    | operations. This name should correspond to a connection name below
    | in the server list. Each connection will be manually accessible.
    |
    */

    'default' => 'guriang',

    /*
    |--------------------------------------------------------------------------
    | Remote Server Connections
    |--------------------------------------------------------------------------
    |
    | These are the servers that will be accessible via the SSH task runner
    | facilities of Laravel. This feature radically simplifies executing
    | tasks on your servers, such as deploying out these applications.
    |
    */

    'connections' => [
        'guriang' => [
            'host'      => 'guriang.unpad.ac.id',
            'username'  => 'erick',
            'password'  => 'aA!12345',
            'key'       => '',
            'keytext'   => '',
            'keyphrase' => '',
            'agent'     => '',
            'timeout'   => 10,
        ],
        'verniy' => [
            'host'      => '172.104.165.57',
            'username'  => 'fikrimi',
            'password'  => '',
            'key'       => 'C:\\Users\\fikrimi\\.ssh\\id_rsa',
            'keytext'   => 'C:\\Users\\fikrimi\\.ssh\\id_rsa.pub',
            'keyphrase' => '',
            'agent'     => '',
            'timeout'   => 10,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Remote Server Groups
    |--------------------------------------------------------------------------
    |
    | Here you may list connections under a single group name, which allows
    | you to easily access all of the servers at once using a short name
    | that is extremely easy to remember, such as "web" or "database".
    |
    */

    'groups' => [
        'web' => ['verniy'],
    ],

];
