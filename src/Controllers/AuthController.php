<?php
/**
 * Authentication Controller
 * 
 * Handles user authentication and session management
 */

class AuthController extends BaseController {
    
    /**
     * Show login form
     */
    public function showLogin() {
        // If already logged in, redirect to dashboard
        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard');
            exit;
        }

        $tokenName = $this->config['app']['security']['csrf_token_name'];
        $token = CsrfService::getToken();

        ob_start();
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="max-width: 400px; margin: 2rem auto;">
                        <div class="card-header">
                            <h2 class="card-title text-center">เข้าสู่ระบบ</h2>
                        </div>
                        <form method="POST" action="/login" data-ajax>
                            <div class="form-group">
                                <label class="form-label" for="username">ชื่อผู้ใช้</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">รหัสผ่าน</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <input type="hidden" name="<?= htmlspecialchars($tokenName) ?>" value="<?= htmlspecialchars($token) ?>">
                            <button type="submit" class="btn btn-primary btn-large">เข้าสู่ระบบ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        
        $this->render('layouts/main', [
            'title' => 'เข้าสู่ระบบ - Employee Leave Tracker',
            'content' => $content
        ]);
    }
    
    /**
     * Handle login
     */
    public function login() {
        $tokenName = $this->config['app']['security']['csrf_token_name'];
        $token = $_POST[$tokenName] ?? '';
        if (!CsrfService::validate($token)) {
            $this->jsonResponse([
                'success' => false,
                'message' => 'ไม่สามารถยืนยันความถูกต้องของคำขอได้'
            ], 400);
        }

        // This will be implemented in a later task
        $this->jsonResponse([
            'success' => false,
            'message' => 'ฟีเจอร์การเข้าสู่ระบบยังไม่พร้อมใช้งาน'
        ]);
    }
    
    /**
     * Handle logout
     */
    public function logout() {
        // This will be implemented in a later task
        session_destroy();
        header('Location: /login');
        exit;
    }
}