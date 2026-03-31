<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/api/auth/login', 'POST', [
    'email' => 'admin@b4u.com',
    'password' => 'password'
]);
// NO ORIGIN OR REFERER! This previously caused Session store not set.

$response = $kernel->handle($request);
echo "Status: " . $response->getStatusCode() . "\n";
echo "Content: " . substr($response->getContent(), 0, 100);
