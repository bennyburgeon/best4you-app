<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link rel="stylesheet" type="text/css" href="/admin/loader.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  @vite(['src/admin/main.js'])
</head>

<body>
  <div id="app">
    <div id="loading-bg">
      <div class="loading-logo">
        <!-- SVG Logo -->
        <svg width="86" height="55" viewBox="0 0 464 295" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M117.892 278.49L72.2356 226.476L164.711 123.003L120.245 42.0298L171.218 20.3703L237.525 141.28L117.892 278.49Z" fill="currentColor" />
          <path d="M237.525 141.28L305.617 26.6874L364.577 6.46781L299.882 121.365L418.964 263.303L363.308 284.154L237.525 141.28Z" fill="currentColor" fill-opacity="0.8" />
        </svg>
      </div>
      <div class="loading">
        <div class="effect-1 effects"></div>
        <div class="effect-2 effects"></div>
        <div class="effect-3 effects"></div>
      </div>
    </div>
  </div>
</body>

</html>
