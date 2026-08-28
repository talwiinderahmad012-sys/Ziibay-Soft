<?php

$dirs = [
    'app/Controllers/Admin',
    'app/Filters',
    'app/Views/admin/layouts',
    'app/Views/admin/auth',
    'app/Views/admin/dashboard'
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// 1. AuthFilter.php
$authFilter = <<<'EOT'
<?php
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin/login')->with('error', 'Please login first.');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
EOT;
file_put_contents('app/Filters/AuthFilter.php', $authFilter);

// 2. Auth Controller
$authController = <<<'EOT'
<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('admin/auth/login');
    }

    public function attemptLogin()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            if ($user['status'] !== 'active') {
                return redirect()->back()->withInput()->with('error', 'Your account is inactive or banned.');
            }

            if (password_verify($password, $user['password_hash'])) {
                session()->set([
                    'user_id' => $user['id'],
                    'role_id' => $user['role_id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'isLoggedIn' => true
                ]);
                session()->regenerate();
                return redirect()->to('/admin/dashboard');
            }
        }
        
        return redirect()->back()->withInput()->with('error', 'Invalid login credentials.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
EOT;
file_put_contents('app/Controllers/Admin/Auth.php', $authController);

// 3. Dashboard Controller
$dashboardController = <<<'EOT'
<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // For foundation phase, we'll just pass placeholder stats
        $data = [
            'title' => 'Dashboard',
            'stats' => [
                'total_services' => 0,
                'published_services' => 0,
                'team_members' => 0,
                'portfolio_projects' => 0,
                'blog_posts' => 0,
                'leads' => 0
            ]
        ];
        return view('admin/dashboard/index', $data);
    }
}
EOT;
file_put_contents('app/Controllers/Admin/Dashboard.php', $dashboardController);

// 4. Admin Layout View
$adminLayout = <<<'EOT'
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Panel') ?> | Ziibay Soft</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        dark: { 900: '#0B0F19', 800: '#111827', 700: '#1F2937' },
                        accent: { 500: '#06b6d4', 600: '#0891b2', 900: '#164e63' }
                    },
                    fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: theme('colors.dark.900'); color: #f3f4f6; }
        .sidebar-link { display: flex; items: center; padding: 0.75rem 1rem; border-radius: 0.5rem; transition: all 0.2s; color: #9ca3af; }
        .sidebar-link:hover, .sidebar-link.active { background-color: theme('colors.dark.800'); color: theme('colors.white'); }
    </style>
</head>
<body class="antialiased flex h-screen overflow-hidden" x-data="{ sidebarOpen: false }">

    <!-- Mobile sidebar backdrop -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-20 bg-black/50 lg:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-64 bg-dark-900 border-r border-dark-700 transition duration-300 lg:static lg:translate-x-0 flex flex-col">
        <div class="flex items-center justify-center h-20 border-b border-dark-700">
            <a href="<?= base_url('admin/dashboard') ?>" class="text-2xl font-bold text-white tracking-tight">Ziibay <span class="text-accent-500">Admin</span></a>
        </div>
        <nav class="flex-1 overflow-y-auto p-4 space-y-2">
            <a href="<?= base_url('admin/dashboard') ?>" class="sidebar-link active">Dashboard</a>
            <a href="#" class="sidebar-link">Services</a>
            <a href="#" class="sidebar-link">Locations</a>
            <a href="#" class="sidebar-link">Team</a>
            <a href="#" class="sidebar-link">Work</a>
            <a href="#" class="sidebar-link">Blog</a>
            <a href="#" class="sidebar-link">SEO</a>
            <a href="#" class="sidebar-link">Leads</a>
            <a href="#" class="sidebar-link">Settings</a>
            <a href="#" class="sidebar-link">Users</a>
        </nav>
        <div class="p-4 border-t border-dark-700">
            <a href="<?= base_url('admin/logout') ?>" class="sidebar-link text-red-400 hover:text-red-300">Logout</a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-dark-900">
        <header class="h-20 flex items-center justify-between px-6 border-b border-dark-700 bg-dark-900 lg:justify-end">
            <button @click="sidebarOpen = true" class="text-gray-400 hover:text-white lg:hidden">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
            </button>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-400">Welcome, <?= esc(session()->get('name')) ?></span>
            </div>
        </header>
        
        <main class="flex-1 overflow-y-auto p-6">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="bg-red-500/10 border border-red-500 text-red-500 px-4 py-3 rounded-lg mb-6"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="bg-green-500/10 border border-green-500 text-green-500 px-4 py-3 rounded-lg mb-6"><?= esc(session()->getFlashdata('success')) ?></div>
            <?php endif; ?>
            
            <?= $this->renderSection('content') ?>
        </main>
    </div>
</body>
</html>
EOT;
file_put_contents('app/Views/admin/layouts/main.php', $adminLayout);

// 5. Auth Login View
$loginView = <<<'EOT'
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Ziibay Soft</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class', theme: { extend: { colors: { dark: { 900: '#0B0F19', 800: '#111827', 700: '#1F2937' }, accent: { 500: '#06b6d4', 600: '#0891b2' } }, fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] } } } }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; background-color: theme('colors.dark.900'); color: #f3f4f6; }
    </style>
</head>
<body class="antialiased flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md bg-dark-800 border border-dark-700 rounded-2xl p-8 shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-white tracking-tight mb-2">Ziibay <span class="text-accent-500">Admin</span></h1>
            <p class="text-gray-400 text-sm">Sign in to your account</p>
        </div>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="bg-red-500/10 border border-red-500/50 text-red-400 text-sm rounded-lg p-3 mb-6">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="bg-red-500/10 border border-red-500/50 text-red-400 text-sm rounded-lg p-3 mb-6">
                <ul class="list-disc list-inside">
                <?php foreach (session()->getFlashdata('errors') as $err) : ?>
                    <li><?= esc($err) ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/login') ?>" method="POST" class="space-y-6">
            <?= csrf_field() ?>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                <input type="email" id="email" name="email" value="<?= old('email') ?>" required class="w-full bg-dark-900 border border-dark-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-accent-500 focus:ring-1 focus:ring-accent-500 transition-colors">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                <input type="password" id="password" name="password" required class="w-full bg-dark-900 border border-dark-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-accent-500 focus:ring-1 focus:ring-accent-500 transition-colors">
            </div>
            <button type="submit" class="w-full bg-accent-600 hover:bg-accent-500 text-white font-semibold rounded-lg px-4 py-3 transition-colors duration-200">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>
EOT;
file_put_contents('app/Views/admin/auth/login.php', $loginView);

// 6. Dashboard Index View
$dashboardView = <<<'EOT'
<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-8">
    <h1 class="text-2xl font-bold text-white mb-2">Dashboard</h1>
    <p class="text-gray-400 text-sm">System overview and quick statistics.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-dark-800 border border-dark-700 rounded-xl p-6">
        <h3 class="text-gray-400 text-sm font-medium mb-2">Total Services</h3>
        <p class="text-3xl font-bold text-white"><?= $stats['total_services'] ?></p>
    </div>
    <div class="bg-dark-800 border border-dark-700 rounded-xl p-6">
        <h3 class="text-gray-400 text-sm font-medium mb-2">Published Services</h3>
        <p class="text-3xl font-bold text-white"><?= $stats['published_services'] ?></p>
    </div>
    <div class="bg-dark-800 border border-dark-700 rounded-xl p-6">
        <h3 class="text-gray-400 text-sm font-medium mb-2">Team Members</h3>
        <p class="text-3xl font-bold text-white"><?= $stats['team_members'] ?></p>
    </div>
    <div class="bg-dark-800 border border-dark-700 rounded-xl p-6">
        <h3 class="text-gray-400 text-sm font-medium mb-2">Portfolio Projects</h3>
        <p class="text-3xl font-bold text-white"><?= $stats['portfolio_projects'] ?></p>
    </div>
    <div class="bg-dark-800 border border-dark-700 rounded-xl p-6">
        <h3 class="text-gray-400 text-sm font-medium mb-2">Blog Posts</h3>
        <p class="text-3xl font-bold text-white"><?= $stats['blog_posts'] ?></p>
    </div>
    <div class="bg-dark-800 border border-dark-700 rounded-xl p-6">
        <h3 class="text-gray-400 text-sm font-medium mb-2">Leads</h3>
        <p class="text-3xl font-bold text-white"><?= $stats['leads'] ?></p>
    </div>
</div>
<?= $this->endSection() ?>
EOT;
file_put_contents('app/Views/admin/dashboard/index.php', $dashboardView);

echo "Admin files generated successfully.";
