<?php
/**
 * Time Tracking Controller
 * 
 * Handles time tracking functionality (placeholder for future implementation)
 */

class TimeTrackingController extends BaseController {
    
    public function index() {
        $this->requireAuth();
        
        ob_start();
        ?>
        <div class="container">
            <h1>ลงเวลาทำงาน</h1>
            <div class="card">
                <p>ฟีเจอร์ลงเวลาจะพัฒนาในขั้นตอนถัดไป</p>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        
        $this->render('layouts/main', [
            'title' => 'ลงเวลาทำงาน - Employee Leave Tracker',
            'content' => $content
        ]);
    }
    
    public function clockIn() {
        $this->jsonResponse(['success' => false, 'message' => 'ยังไม่พร้อมใช้งาน']);
    }
    
    public function clockOut() {
        $this->jsonResponse(['success' => false, 'message' => 'ยังไม่พร้อมใช้งาน']);
    }
    
    public function getCurrentStatus() {
        $this->jsonResponse(['success' => false, 'message' => 'ยังไม่พร้อมใช้งาน']);
    }
    
    public function getTimeLog() {
        $this->requireAuth();
        
        ob_start();
        ?>
        <div class="container">
            <h1>ประวัติการลงเวลา</h1>
            <div class="card">
                <p>ฟีเจอร์ประวัติการลงเวลาจะพัฒนาในขั้นตอนถัดไป</p>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        
        $this->render('layouts/main', [
            'title' => 'ประวัติการลงเวลา - Employee Leave Tracker',
            'content' => $content
        ]);
    }
}