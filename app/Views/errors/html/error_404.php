<?php
/**
 * 404 — Page Not Found.
 *
 * Rendered directly by the framework's exception handler without the
 * application layout, so this file is intentionally self-contained and
 * never depends on helpers or services that could themselves fail.
 *
 * @var int    $code    HTTP status code (404)
 * @var string $message Exception message (only shown when display_errors is on)
 */
$safeMessage = isset($message) && $message !== ''
    ? htmlspecialchars((string) $message, ENT_QUOTES, 'UTF-8')
    : 'The page you are looking for does not exist or has been moved.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>404 — Page not found | Ziibay Soft</title>
    <style><?= require __DIR__ . '/_error_styles.php' ?></style>
</head>
<body>
    <main>
        <p class="error-code">404</p>
        <h1>Page not found</h1>
        <p class="lead"><?= $safeMessage ?></p>
        <a class="home-link" href="/">Back to homepage</a>
        <p class="brand">Ziibay Soft</p>
    </main>
</body>
</html>