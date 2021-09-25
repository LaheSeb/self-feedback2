<?php

include './phpqrcode/qrlib.php';

$lienQrCode = "https://ndlpavranches.fr/";
QRcode::png($lienQrCode);
