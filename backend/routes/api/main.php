<?php

declare(strict_types=1);

use App\Http\Controllers\Main\ProjectController;
use App\Http\Controllers\Main\ServerController;
use Devitools\Http\Routing\Router;

Router::restricted()->group(static function () {

    Router::provide('/main/project', ProjectController::class);
    Router::provide('/main/server', ServerController::class);
});
