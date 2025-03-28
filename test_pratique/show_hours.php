<?php
declare(strict_types=1);
$date  = new DateTime(timezone: new DateTimeZone("Africa/Douala"));
echo $date->format("d/m/Y H:i:s");
 