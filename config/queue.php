<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Laravel's queue API supports an assortment of back-ends via a single
    | API, giving you convenient access to each back-end using the same
    | syntax for every one. Here you may define a default connection.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'sync'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection information for each server that
    | is used by your application. A default configuration has been added
    | for each back-end shipped with Laravel. You are free to add more.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver'      => 'database',
            'table'       => 'jobs',
            'queue'       => 'default',
            'retry_after' => 90,
        ],

        'beanstalkd' => [
            'driver'      => 'beanstalkd',
            'host'        => 'beanstalkd',
            'queue'       => 'default',
            'retry_after' => 90,
        ],

        // For more information about this driver see:
        // https://github.com/vyuldashev/laravel-queue-rabbitmq
        // 'rabbit' => [
        //     'driver'        => 'rabbitmq',
        //     'dsn'           => env('RABBITMQ_DSN', null),
        //     'factory_class' => Enqueue\AmqpLib\AmqpConnectionFactory::class,
        //     'host'          => env('RABBITMQ_HOST', '127.0.0.1'),
        //     'port'          => env('RABBITMQ_PORT', 5672),
        //     'vhost'         => env('RABBITMQ_VHOST', '/'),
        //     'login'         => env('RABBITMQ_LOGIN', 'guest'),
        //     'password'      => env('RABBITMQ_PASSWORD', 'guest'),
        //     'queue'         => env('RABBITMQ_QUEUE', 'default.queue'),
        //     'options'  => [
        //         'exchange' => [
        //             'name'        => env('RABBITMQ_EXCHANGE_NAME', "amq.direct"),
        //             'declare'     => env('RABBITMQ_EXCHANGE_DECLARE', true),
        //             'type'        => env('RABBITMQ_EXCHANGE_TYPE', \Interop\Amqp\AmqpTopic::TYPE_DIRECT),
        //             'passive'     => env('RABBITMQ_EXCHANGE_PASSIVE', false),
        //             'durable'     => env('RABBITMQ_EXCHANGE_DURABLE', true),
        //             'auto_delete' => env('RABBITMQ_EXCHANGE_AUTODELETE', false),
        //             'arguments'   => env('RABBITMQ_EXCHANGE_ARGUMENTS'),
        //         ],
        //         'queue' => [
        //             'declare'     => env('RABBITMQ_QUEUE_DECLARE', true),
        //             'bind'        => env('RABBITMQ_QUEUE_DECLARE_BIND', true),
        //             'passive'     => env('RABBITMQ_QUEUE_PASSIVE', false),
        //             'durable'     => env('RABBITMQ_QUEUE_DURABLE', true),
        //             'exclusive'   => env('RABBITMQ_QUEUE_EXCLUSIVE', false),
        //             'auto_delete' => env('RABBITMQ_QUEUE_AUTODELETE', false),
        //             'arguments'   => env('RABBITMQ_QUEUE_ARGUMENTS', '{
        //                 "x-dead-letter-exchange":"amq.direct",
        //                 "x-dead-letter-routing-key":"default-failed.queue"
        //             }'),
        //         ],
        //     ],
        //     'sleep_on_error' => env('RABBITMQ_ERROR_SLEEP', false),
        //     'ssl_params'      => [
        //         'ssl_on'      => env('RABBITMQ_SSL', false),
        //         'cafile'      => env('RABBITMQ_SSL_CAFILE', null),
        //         'local_cert'  => env('RABBITMQ_SSL_LOCALCERT', null),
        //         'local_key'   => env('RABBITMQ_SSL_LOCALKEY', null),
        //         'verify_peer' => env('RABBITMQ_SSL_VERIFY_PEER', true),
        //         'passphrase'  => env('RABBITMQ_SSL_PASSPHRASE', null),
        //     ],
        // ],

        'sqs' => [
            'driver' => 'sqs',
            'key'    => env('SQS_KEY', 'your-public-key'),
            'secret' => env('SQS_SECRET', 'your-secret-key'),
            'prefix' => env('SQS_PREFIX', 'https: //sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue'  => env('SQS_QUEUE', 'your-queue-name'),
            'region' => env('SQS_REGION', 'us-east-1'),
        ],

        'redis' => [
            'driver'      => 'redis',
            'connection'  => 'default',
            'queue'       => 'default',
            'retry_after' => 90,
            'block_for'   => null,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control which database and table are used to store the jobs that
    | have failed. You may change them to any database / table you wish.
    |
    */

    'failed' => [
        'database' => env('DB_CONNECTION', 'mysql'),
        'table'    => 'failed_jobs',
    ],

];
