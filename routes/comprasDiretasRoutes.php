<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicoComprasDiretas;

Route::get("/publico/compras/diretas", [PublicoComprasDiretas::class, "index"])
->name("publico.compras.diretas");
