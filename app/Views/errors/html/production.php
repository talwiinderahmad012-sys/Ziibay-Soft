<?php
/**
 * Generic production error page (5xx that has no dedicated view).
 *
 * Always shown to visitors when the app fails in production — no debug data.
 * See _error_styles.php for shared CSS.
 */
$safeMessage = 'An unexpected error occurred. Please try again in a moment.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Something went wrong | Ziibay Soft</title>
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