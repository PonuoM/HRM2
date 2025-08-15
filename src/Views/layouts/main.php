<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Employee Leave Tracker' ?></title>
    
    <!-- Mobile-first responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/mobile.css">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="app">
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Navigation for authenticated users -->
            <nav class="navbar">
                <div class="nav-container">
                    <div class="nav-brand">
                        <h1>ระบบลงเวลา</h1>
                    </div>
                    <button class="nav-toggle" id="navToggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div class="nav-menu" id="navMenu">
                        <a href="/dashboard" class="nav-link">หน้าหลัก</a>
                        <a href="/time-tracking" class="nav-link">ลงเวลา</a>
                        <a href="/leave" class="nav-link">จัดการวันลา</a>
                        <?php if (($_SESSION['role'] ?? '') === 'manager'): ?>
                            <a href="/manager" class="nav-link">อนุมัติการลา</a>
                        <?php endif; ?>
                        <form method="POST" action="/logout" class="nav-logout">
                            <button type="submit" class="nav-link logout-btn">ออกจากระบบ</button>
                        </form>
                    </div>
                </div>
            </nav>
        <?php endif; ?>
        
        <!-- Main content -->
        <main class="main-content">
            <?= $content ?? '' ?>
        </main>
    </div>
    
    <!-- JavaScript -->
    <script src="/assets/js/main.js"></script>
    <?php if (isset($scripts)): ?>
        <?php foreach ($scripts as $script): ?>
            <script src="<?= $script ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>