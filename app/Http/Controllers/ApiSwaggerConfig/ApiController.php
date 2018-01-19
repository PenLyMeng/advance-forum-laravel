<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * Class ApiController
 *
 * @package App\Http\Controllers\Api
 *
 * @SWG\Swagger(
 *     basePath="api/",
 *     host="localhost:8000/",
 *     schemes={"http","https"},
 *     @SWG\Info(
 *         version="1.0",
 *         title="Advance-Forum API",
 *         @SWG\Contact(name="Lymeng", url="https://advance-forum.com"),
 *     ),
 *     @SWG\Definition(
 *         definition="Error",
 *         required={"code", "message"},
 *         @SWG\Property(
 *             property="code",
 *             type="integer",
 *             format="int32"
 *         ),
 *         @SWG\Property(
 *             property="message",
 *             type="string"
 *         )
 *     )
 * )
 */
class ApiController extends Controller
{
    //
}

 
 
 