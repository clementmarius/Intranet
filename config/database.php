<?php

function getPDO()
{
    return new PDO(
        'mysql:host=sj667040-001.eu.clouddb.ovh.net;port=35545;dbname=intranet2025;charset=utf8',
        'adminacck',
        'WelcomeAcck123',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}
