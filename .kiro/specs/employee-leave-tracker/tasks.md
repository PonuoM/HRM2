# แผนการทำงาน

- [x] 1. ตั้งค่าโครงสร้างโปรเจกต์และไฟล์พื้นฐาน





  - สร้างโครงสร้างไดเรกทอรีตามแบบ MVC
  - สร้างไฟล์ index.php หลักและ .htaccess
  - สร้างไฟล์ config สำหรับการเชื่อมต่อฐานข้อมูล
  - _ความต้องการ: 8.1, 8.4_

- [ ] 2. สร้างฐานข้อมูลและตารางพื้นฐาน
  - เขียน SQL scripts สำหรับสร้างตารางทั้งหมด (users, time_logs, leave_types, leave_balances, leave_requests)
  - สร้าง indexes และ foreign key constraints
  - เพิ่มข้อมูลตัวอย่างสำหรับ leave_types
  - _ความต้องการ: 8.1, 8.2_

- [ ] 3. สร้าง DatabaseService และ Model classes พื้นฐาน
  - สร้าง DatabaseService class สำหรับการเชื่อมต่อฐานข้อมูล
  - สร้าง BaseModel class พร้อม CRUD operations พื้นฐาน
  - สร้าง User Model พร้อมการตรวจสอบข้อมูล
  - เขียน unit tests สำหรับ database connection และ User model
  - _ความต้องการ: 8.1, 8.3, 8.4_

- [ ] 4. สร้างระบบยืนยันตัวตนพื้นฐาน
  - สร้าง AuthService class สำหรับการจัดการ authentication
  - สร้าง AuthController พร้อม login/logout methods
  - สร้างหน้า login form ที่ responsive สำหรับมือถือ
  - เขียน tests สำหรับ authentication flow
  - _ความต้องการ: 7.1, 7.2, 7.3, 6.1_

- [ ] 5. สร้างระบบจัดการเซสชันและการตรวจสอบสิทธิ์
  - เพิ่ม session management ใน AuthService
  - สร้าง middleware สำหรับตรวจสอบการเข้าสู่ระบบ
  - เพิ่มการตรวจสอบ role-based access control
  - เขียน tests สำหรับ session management และ authorization
  - _ความต้องการ: 7.2, 7.3, 7.4_

- [ ] 6. สร้าง dashboard หลักและ navigation
  - สร้าง main dashboard layout ที่ responsive
  - เพิ่ม navigation menu สำหรับมือถือ (hamburger menu)
  - สร้าง dashboard controller และ views
  - เขียน CSS สำหรับ mobile-first design
  - _ความต้องการ: 6.1, 6.2, 6.4_

- [ ] 7. สร้างฟีเจอร์ลงเวลาเข้า-ออกงาน
- [ ] 7.1 สร้าง TimeLog Model และ database operations
  - สร้าง TimeLog Model class พร้อม validation
  - เพิ่ม methods สำหรับ clock in/out operations
  - เขียน unit tests สำหรับ TimeLog model
  - _ความต้องการ: 1.2, 1.3_

- [ ] 7.2 สร้าง TimeTrackingController และ API endpoints
  - สร้าง TimeTrackingController พร้อม clockIn/clockOut methods
  - เพิ่ม getCurrentStatus method สำหรับตรวจสอบสถานะปัจจุบัน
  - สร้าง API endpoints สำหรับ AJAX calls
  - เขียน integration tests สำหรับ time tracking APIs
  - _ความต้องการ: 1.1, 1.2, 1.3_

- [ ] 7.3 สร้าง UI สำหรับลงเวลาบนมือถือ
  - สร้างหน้า time tracking พร้อมปุ่ม clock in/out ขนาดใหญ่
  - เพิ่ม real-time clock display
  - เพิ่ม JavaScript สำหรับ AJAX calls และ UI updates
  - ทดสอบการใช้งานบนมือถือ
  - _ความต้องการ: 1.1, 6.1, 6.2, 6.3_

- [ ] 7.4 สร้างหน้าแสดงประวัติการลงเวลา
  - เพิ่ม getTimeLog method ใน TimeTrackingController
  - สร้างหน้าแสดงประวัติการลงเวลาแบบ responsive table
  - เพิ่ม pagination สำหรับข้อมูลจำนวนมาก
  - เขียน tests สำหรับ time log display
  - _ความต้องการ: 1.4, 6.1_

- [ ] 8. สร้างระบบจัดการประเภทการลาและยอดคงเหลือ
- [ ] 8.1 สร้าง LeaveType และ LeaveBalance Models
  - สร้าง LeaveType Model สำหรับจัดการประเภทการลา
  - สร้าง LeaveBalance Model สำหรับจัดการยอดวันลา
  - เพิ่ม methods สำหรับคำนวณยอดคงเหลือ
  - เขียน unit tests สำหรับ leave balance calculations
  - _ความต้องการ: 4.1, 4.4_

- [ ] 8.2 สร้างหน้าแสดงยอดวันลาคงเหลือ
  - สร้าง leave dashboard แสดงยอดวันลาแต่ละประเภท
  - เพิ่ม progress bars สำหรับแสดงการใช้วันลา
  - ออกแบบ UI ให้เหมาะกับมือถือ
  - เขียน tests สำหรับ leave balance display
  - _ความต้องการ: 4.1, 6.1_

- [ ] 9. สร้างระบบขอลา
- [ ] 9.1 สร้าง LeaveRequest Model และ validation
  - สร้าง LeaveRequest Model พร้อม validation rules
  - เพิ่ม methods สำหรับคำนวณระยะเวลาการลา (ชั่วโมง/วัน)
  - เพิ่มการตรวจสอบยอดวันลาคงเหลือ
  - เขียน unit tests สำหรับ leave request validation
  - _ความต้องการ: 2.2, 3.1, 3.4_

- [ ] 9.2 สร้าง LeaveController และ API endpoints
  - สร้าง LeaveController พร้อม createLeaveRequest method
  - เพิ่ม getLeaveHistory และ getLeaveBalance methods
  - สร้าง API endpoints สำหรับ AJAX operations
  - เขียน integration tests สำหรับ leave APIs
  - _ความต้องการ: 2.3, 4.2, 4.3_

- [ ] 9.3 สร้างฟอร์มขอลาแบบยืดหยุ่น
  - สร้างฟอร์มขอลาที่รองรับทั้งชั่วโมงและวัน
  - เพิ่ม dynamic form fields ตามประเภทการลา
  - เพิ่ม date/time pickers ที่เหมาะกับมือถือ
  - เพิ่ม JavaScript สำหรับ form validation และ AJAX submission
  - _ความต้องการ: 2.1, 3.1, 3.2, 3.3, 6.3_

- [ ] 9.4 สร้างหน้าแสดงประวัติการขอลา
  - สร้างหน้าแสดงประวัติการขอลาพร้อมสถานะ
  - เพิ่ม filtering และ sorting options
  - ออกแบบ UI แบบ card layout สำหรับมือถือ
  - เขียน tests สำหรับ leave history display
  - _ความต้องการ: 4.2, 4.3, 6.1_

- [ ] 10. สร้างระบบอนุมัติสำหรับผู้จัดการ
- [ ] 10.1 สร้าง ManagerController และ approval methods
  - สร้าง ManagerController พร้อม getPendingRequests method
  - เพิ่ม approveLeave และ rejectLeave methods
  - เพิ่มการตรวจสอบสิทธิ์ manager role
  - เขียน tests สำหรับ manager approval functions
  - _ความต้องการ: 5.1, 5.3, 5.4, 7.3_

- [ ] 10.2 สร้างหน้าอนุมัติคำขอลาสำหรับผู้จัดการ
  - สร้างหน้าแสดงคำขอลาที่รออนุมัติ
  - เพิ่มปุ่ม approve/reject พร้อม modal สำหรับเหตุผล
  - ออกแบบ UI ให้ใช้งานง่ายบนมือถือ
  - เพิ่ม JavaScript สำหรับ AJAX approval actions
  - _ความต้องการ: 5.1, 5.2, 5.3, 5.4, 6.1_

- [ ] 10.3 เพิ่มระบบแจ้งเตือนการอนุมัติ
  - สร้าง NotificationService สำหรับส่งการแจ้งเตือน
  - เพิ่มการแจ้งเตือนเมื่อคำขอได้รับการอนุมัติ/ปฏิเสธ
  - เพิ่มการอัปเดตยอดวันลาเมื่อได้รับอนุมัติ
  - เขียน tests สำหรับ notification system
  - _ความต้องการ: 5.3, 5.4, 4.4_

- [ ] 11. เพิ่มฟีเจอร์ความปลอดภัยและการป้องกัน
- [ ] 11.1 เพิ่มการป้องกัน CSRF และ XSS
  - เพิ่ม CSRF token generation และ validation
  - เพิ่มการ sanitize input และ output escaping
  - เพิ่ม security headers ใน .htaccess
  - เขียน security tests
  - _ความต้องการ: 8.3, 8.4_

- [ ] 11.2 เพิ่มการจัดการข้อผิดพลาดและ logging
  - สร้าง ErrorHandler class สำหรับจัดการ exceptions
  - เพิ่ม error logging และ monitoring
  - เพิ่ม user-friendly error messages
  - เขียน tests สำหรับ error handling
  - _ความต้องการ: 8.2_

- [ ] 12. ปรับปรุงประสิทธิภาพและ UX บนมือถือ
- [ ] 12.1 เพิ่มประสิทธิภาพการโหลดหน้า
  - เพิ่ม CSS และ JavaScript minification
  - เพิ่ม browser caching headers
  - ปรับปรุง database queries และ indexing
  - ทดสอบ performance บนมือถือ
  - _ความต้องการ: 6.4_

- [ ] 12.2 เพิ่ม Progressive Web App features
  - เพิ่ม service worker สำหรับ offline capability
  - เพิ่ม web app manifest
  - เพิ่ม push notifications (ถ้าต้องการ)
  - ทดสอบ PWA features บนมือถือ
  - _ความต้องการ: 6.1, 6.4_

- [ ] 13. การทดสอบและ deployment
- [ ] 13.1 ทดสอบครบถ้วนบนอุปกรณ์ต่างๆ
  - ทดสอบ responsive design บนมือถือหลายรุ่น
  - ทดสอบ cross-browser compatibility
  - ทดสอบ touch interactions และ gestures
  - ทดสอบ performance และ loading times
  - _ความต้องการ: 6.1, 6.2, 6.3, 6.4_

- [ ] 13.2 เตรียม production deployment
  - สร้าง production configuration files
  - เพิ่ม database migration scripts
  - สร้าง deployment documentation
  - ทดสอบ deployment process
  - _ความต้องการ: 8.1, 8.2_