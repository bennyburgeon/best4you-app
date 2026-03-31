<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/api/auth/login', 'POST', [
    'email' => 'admin@b4u.com',
    'password' => 'password'
]);
$request->headers->set('Origin', 'http://localhost');

$response = $kernel->handle($request);
echo $response->getContent();
echo "\nStatus: " . $response->getStatusCode() . "\n";
