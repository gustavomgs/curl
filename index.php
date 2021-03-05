<?php

$url  = "https://ehr-auth-hmg.saude.gov.br/api/token";
        $cert = "https://storage.googleapis.com/simus-assets-dev/dev/4680/certificado/1cd6bvoevi8dge2qlv9sewt71h9jn4o.pfx";

        $pass = '230221';

        $url = "https://ehr-auth-hmg.saude.gov.br/api/token";
        $cert_file = 'https://gensoft.site/curl/ocggbjls4m461h099zexd9ow42vzoy7.pfx';
        $cert_password = '230221';
        $pem_file = "https://gensoft.site/curl/cacert-2021-01-19.pem";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);


        curl_setopt($ch, CURLOPT_SSLCERT,$cert_file); //Line-#1
        curl_setopt($ch, CURLOPT_SSLKEY,$pem_file);
        curl_setopt($ch, CURLOPT_SSLKEYPASSWD,$cert_password);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $res = curl_exec($ch);

        if (curl_error($ch)) {
            throw new Exception('Não foi possível realizar o login. Ref: 01');
        }

        $content = json_decode($res, true);

        echo var_dump($res);
