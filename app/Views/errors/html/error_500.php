<?php
/**
 * 500 — Internal Server Error.
 *
 * Self-contained error page (see _error_styles.php for shared CSS).
 * Never exposes exception details in production.
 *
 * @var int    $code    HTTP status code (500)
 * @var string $message Exception message (shown only when display_errors is on)
 */
$safeMessage = isset($message) && $message !== '' && ENVIRONMENT !== 'production'
    ? htmlspecialchars((string) $message, ENT_QUOTES, 'UTF-8')
    : 'An unexpected error occurred. Please try again in a moment.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>500 — Something went wrong | Ziibay Soft</title>
    <style><?= require __DIR__ . '/_error_styles.php' ?></style>
</head>
<body>
    <main>
        <p class="error-code">500</p>
        <h1>Something went wrong</h1>
        <p class="lead"><?= $safeMessage ?></p>
        <a class="home-link" href="/">Back to homepage</a>
        <p class="brand">Ziibay Soft</p>
    </main>
</body>
</html>