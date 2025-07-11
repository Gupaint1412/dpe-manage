<script>
$(document).ready(function(){
    // console.log("ready");
    @if(Session::has('new-login-success'))
    Swal.fire({
        icon: "success",
        title: "เข้าสู่ระบบสำเร็จ",        
        showConfirmButton: false,
        timer: 1500
        });
    @endif
    @if(Session::has('logout-success'))
    Swal.fire({
        icon: "success",
        title: "ออกจากระบบสำเร็จ",        
        showConfirmButton: false,
        timer: 1500
        });
    @endif
    @if(Session::has('login-error'))
    Swal.fire({
        icon: "error",
        title: "Username หรือ Password ผิด",
        text: 'โปรดตรวจสอบข้อมูลของท่านอีกครั้ง',
        confirmButtonText: 'รับทราบ',
        footer: '<a href="#">หรือติดต่อเจ้าหน้าที่กลุ่มเทคโนโลยีสารสนเทศฯ</a>'
        });
    @endif
    @if(Session::has('doc-store-success'))
    Swal.fire({
        // position: "top-end",
        icon: "success",
        title: '{{Session::get('doc-store-success')}}',
        showConfirmButton: false,
        timer: 1500
        });
    @endif
    @if(Session::has('suspend-error'))
    Swal.fire({
        icon: "error",
        title: "บัญชีของคุณถูกระงับ",
        text: 'บัญชีของคุณลงทะเบียนผิดพลาดมากกว่า 5 ครั้ง มีความเสี่ยงต่อการถูกขโมยรหัสผ่าน',
        confirmButtonText: 'รับทราบ',
        footer: '<a href="#">โปรดติดต่อเจ้าหน้าที่กลุ่มเทคโนโลยีสารสนเทศ</a>'
        });
    @endif
    @if(Session::has('verify-user'))
    Swal.fire({
        icon: "info",
        title: "บัญชีของคุณอยู่ระหว่างการพิจารณา",
        text: 'ผู้ดูแลระบบจะอนุมัติบัญชีของคุณในไม่ช้า',
        confirmButtonText: 'รับทราบ',
        footer: '<a href="#">ติดต่อ-สอบถามเจ้าหน้าที่กลุ่มเทคโนโลยีสารสนเทศ</a>'
        });
    @endif
    @if(Session::has('register_success'))
    Swal.fire({
        icon: "success",
        title: "ลงทะเบียนสำเร็จ",
        text: 'ผู้ดูแลระบบจะอนุมัติบัญชีของคุณในไม่ช้า',
        confirmButtonText: 'รับทราบ',
        footer: '<a href="#">ติดต่อ-สอบถามเจ้าหน้าที่กลุ่มเทคโนโลยีสารสนเทศ</a>'
        });
    @endif
    @if(Session::has('storage-success'))
    Swal.fire({
        icon: "success",
        title: "บันทึกข้อมูลสำเร็จ",        
        showConfirmButton: false,
        timer: 1500
        });
    @endif
    @if(Session::has('update-success'))
    Swal.fire({
        icon: "success",
        title: "ปรับปรุงข้อมูลสำเร็จ",        
        showConfirmButton: false,
        timer: 1500
        });
    @endif
})

</script>