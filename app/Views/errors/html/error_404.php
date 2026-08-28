<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | Ziibay Soft</title>
    <!-- Shared Theme System -->
    <?= $this->include('components/theme_manager') ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
        }
    </style>
</head>
<body class="antialiased flex items-center justify-center min-h-screen p-4">
    <div class="text-center">
        <h1 class="text-8xl font-bold text-primary mb-4">404</h1>
        <h2 class="text-3xl font-semibold text-text mb-6">Page Not Found</h2>
        <p class="text-text-muted mb-8 max-w-md mx-auto">
            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
        </p>
        <a href="<?= base_url() ?>" class="inline-block bg-primary hover:bg-primary-hover text-text-onprimary px-8 py-3 rounded-lg text-base font-semibold transition-all duration-200">
            Return to Homepage
        </a>
    </div>
</body>
</html>
