<?php
/**
 * 400 — Bad Request.
 *
 * Self-contained error page (shared CSS in _error_styles.php).
 * Shown when a request cannot be processed (e.g. malformed syntax, failed CSRF/validation).
 *
 * @var int    $code    HTTP status code (400)
 * @var string $message Exception message — only visible when display_errors is enabled.
 */
$safeMessage = 'The request could not be understood or was blocked by security rules.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>400 — Bad request | Ziibay Soft</title>
    <style><?= require __DIR__ . '/_error_styles.php' ?></style>
</head>
<body>
    <main>
        <p class="error-code">400</p>
        <h1>Bad request</h1>
        <p class="lead"><?= $safeMessage ?></p>
        <a class="home-link" href="/">Back to homepage</a>
        <p class="brand">Ziibay Soft</p>
    </main>
</body>
</html>