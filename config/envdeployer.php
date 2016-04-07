<?php

return [

    'connections' => [

        /*
         * The environment name.
         */
        'prod' => [

            /*
             * The hostname to send the env file to
             */
            'host'  => '162.243.28.166',

            /*
             * The username to be used when connecting to the server where the logs are located
             */
            'user' => 'forge',

            /*
             * The full path to the directory where the .env is located MUST end in /
             */
            'rootEnvDirectory' => '/home/forge/dailyinternetspeed.com/',

            'port' => 22
        ],
    ],
];
