<?php
/**
 * Leave Controller
 * 
 * Handles leave management functionality (placeholder for future implementation)
 */

class LeaveController extends BaseController {
    
    public function index() {
        $this->requireAuth();
        
        ob_start();
        ?>
        <div class="container">
            <h1>จัดการวันลา</h1>
            <div class="card">
                <p>ฟีเจอร์จัดการวันลาจะพัฒนาในขั้นตอนถัดไป</p>
            </div>
        </div>
        <?php
        $content = ob_get_clean();
        
        $this->render('layouts/main', [
            'title' => 'จัดการวันลา - Employee Leave Tracker',
            'content' => $content
        ]);
    }
    
    public function showRequestForm() {
        $this->jsonResponse(['success' => false, 'message' => 'ยังไม่พร้อมใช้งาน']);
    }
    
    public function createLeaveRequest() {
        $this->jsonResponse(['success' => false, 'message' => 'ยังไม่พร้อมใช้งาน']);
    }
    
    public function getLeaveHistory() {
        $this->jsonResponse(['success' => false, 'message' => 'ยังไม่พร้อมใช้งาน']);
    }
    
    public function getLeaveBalance() {
        $this->jsonResponse(['success' => false, 'message' => 'ยังไม่พร้อมใช้งาน']);
    }
}