<?php
/**
 * Dashboard Controller
 * 
 * Handles main dashboard functionality
 */

class DashboardController extends BaseController {
    
    /**
     * Show main dashboard
     */
    public function index() {
        $this->requireAuth();
        
        ob_start();
        ?>
        <div class="container">
            <h1>แดชบอร์ด</h1>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ยินดีต้อนรับ</h3>
                        </div>
                        <p>ระบบลงเวลาและจัดการวันลาพนักงาน</p>
                        <p>กรุณาเลือกเมนูที่ต้องการใช้งาน</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        
        $this->render('layouts/main', [
            'title' => 'แดชบอร์ด - Employee Leave Tracker',
            'content' => $content
        ]);
    }
}