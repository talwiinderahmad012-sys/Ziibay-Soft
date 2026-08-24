<?php
/**
 * 403 — Access Denied.
 *
 * Self-contained error page (see _error_styles.php for shared CSS).
 *
 * @var int    $code    HTTP status code (403)
 * @var string $message Exception message (only shown when display_errors is on)
 */
$safeMessage = 'You do not have permission to view this page.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>403 — Access denied | Ziibay Soft</title>
    <style><?= require __DIR__ . '/_error_styles.php' ?></style>
</head>
<body>
    <main>
        <p class="error-code">403</p>
        <h1>Access denied</h1>
        <p class="lead"><?= $safeMessage ?></p>
        <a class="home-link" href="/">Back to homepage</a>
        <p class="brand">Ziibay Soft</p>
    </main>
</body>
</html>