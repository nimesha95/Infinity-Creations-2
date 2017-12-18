<?php
return array(
    /** set your paypal credential **/
    'client_id' => 'AUQhgOppef2Z3P7mLyTh3j4u5UD6nGl6wNEEWpqLVZ6LoMTWI3shovnd6ilx0GmyLelytttHeEcH4uUv',
    'secret' => 'EBNyKtB2VVpFCcoUQ0TvhoCHANHeUcfjNrSNY4aewMyObEFlc50qzgWns-H_oGQyqqcyKF_PG3xJXuuQ',
    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 1000,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);
?>