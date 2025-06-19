@extends('layouts.auth')

@push('css')
<style>
    .required{
        color:red;
        }
    .main-content-wrapper {
            /* คอนเทนเนอร์หลักของเนื้อหาฟอร์ม */
            width: 100%; /* ใช้ความกว้างเต็มที่ของ parent */
            max-width: 900px; /* กำหนดความกว้างสูงสุดเพื่อให้ฟอร์มไม่กว้างเกินไปบนจอใหญ่ๆ */
            /* margin: 0 auto;  ไม่จำเป็นถ้า parent (body) ใช้ flexbox และ justify-content: center */
            padding: 20px; /* เพิ่ม padding รอบๆ */
            box-sizing: border-box; /* สำคัญเพื่อให้ padding ไม่เพิ่มขนาดรวม */
        }

        .card {
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); /* เพิ่มเงาให้ card ดูโดดเด่น */
            border: none; /* ลบ border เดิมของ card (ถ้ามี) */
        }

        /* สำหรับหน้าจอขนาดเล็กกว่า (มือถือ) */
        @media (max-width: 767.98px) {
            .main-content-wrapper {
                padding: 10px; /* ลด padding ลงสำหรับมือถือ */
            }
            .card {
                margin-left: 0 !important; /* ลบ margin-left ที่เคยกำหนดใน inline style */
                margin-right: 0 !important;
            }
        }
</style>
@endpush

@section('content')
 <div class="container main-content-wrapper"> 
        <div class="row justify-content-center"> <div class="col-12"> 
                <div class="row pt-3 ps-3"> <a href="{{route('login')}}" style="text-decoration: none">< กลับเข้าสู่หน้าแรก</a>
                </div>
                <div class="row pt-3 ps-3">
                    <h4>ลงทะเบียนเพื่อเข้าใช้งานระบบ</h4>
                </div>         
                <div class="card p-4 mt-3 ms-1 me-1"> 
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-2 mb-3"> <label for="prefix" class="form-label"><span class="required">*</span>คำนำหน้า</label>
                                <select class="form-select" id="prefix" name="prefix" required>
                                    <option selected disabled value="">--เลือก--</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นาย">นาย</option>
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="name" class="form-label"><span class="required">*</span>ชื่อ</label>
                                <input type="text" class="form-control" id="name" name="name" required>                     
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="surname" class="form-label"><span class="required">*</span>นามสกุล</label>
                                <input type="text" class="form-control" id="surname" name="surname" required>                     
                            </div>
                        </div>    
                        <div class="row mt-3"> <div class="col-md-6 mb-3">
                                <label><span class="required">*</span> สังกัด</label>
                                <select class="form-control" name="affiliation" style="width: 100%;"data-placeholder="เลือกสังกัด" required>
                                    <option selected disabled value="">--เลือกสังกัด--</option> 
                                    <option value="กรมพลศึกษา(ขึ้นตรงอธิบดี)">กรมพลศึกษา(ขึ้นตรงอธิบดี)</option>    
                                    <option value="สำนักงานเลขานุการกรม">สำนักงานเลขานุการกรม</option> 
                                    <option value="สำนักการกีฬา">สำนักการกีฬา</option> 
                                    <option value="สำนักนันทนาการ">สำนักนันทนาการ</option> 
                                    <option value="สำนักวิทยาศาสตร์การกีฬา">สำนักวิทยาศาสตร์การกีฬา</option> 
                                    <option value="สถาบันพัฒนาบุคลากรการพลศึกษาและการกีฬา">สถาบันพัฒนาบุคลากรการพลศึกษาและการกีฬา</option>                      
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label><span class="required">*</span> กลุ่มงาน</label>
                                <select class="form-control " name="job_group" style="width: 100%;"data-placeholder="เลือกกลุ่ม" required>
                                <option selected disabled value="">--เลือกกลุ่มงาน--</option>           
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="job_position"><span class="required">*</span>ตำแหน่งงาน</label>
                                <input type="text" class="form-control" name="job_position" required>                     
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email"><span class="required">*</span><i class="fa-regular fa-envelope icon_label"></i>อีเมล</label> <label for="text" class="required">(ใช้สำหรับเข้าสู่ระบบ)</label>
                                <input type="email" class="form-control" name="email" required>                                      
                            </div>
                        </div>             
                        <div class="row mt-3">
                            <div class="col-md-6 mb-3">
                                <label for="password"><span class="required">*</span><i class="fa-solid fa-key icon_label"></i>รหัสผ่าน</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation"><span class="required">*</span><i class="fa-solid fa-unlock-keyhole icon_label"></i>ยืนยันรหัสผ่าน</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required>
                            </div>           
                        </div>
                        <div class="d-flex justify-content-center mt-4"> 
                            <a href="{{route('login')}}" class="btn btn-secondary me-3">หน้าแรก</a> 
                            <button type="submit" class="btn btn-primary ms-3">ลงทะเบียน</button> 
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </div>
@endsection

@push('js')
<script>
  // console.log('test')
  // สร้างอ็อบเจ็กต์ที่เก็บกลุ่มงานสำหรับแต่ละสังกัด
  const jobGroups = {
    "กรมพลศึกษา(ขึ้นตรงอธิบดี)": ["กลุ่มพัฒนาระบบบริหาร", "กลุ่มงานจริยธรรม", "กลุ่มตรวจสอบภายใน","รองอธิบดี"],
    "สำนักงานเลขานุการกรม": ["กลุ่มช่วยอำนวยการและสารบรรณ", "กลุ่มการเจ้าหน้าที่","กลุ่มการคลัง","กลุ่มพัสดุ","กลุ่มประชาสัมพันธ์","กลุ้มนิติการ","กลุ่มแผนงาน","กลุ่มเทคโนโลยีสารสนเทศและการสื่อสาร","กลุ่มมาตรฐานอาคารสถานกีฬา","กลุ่มสนามกีฬสเฉลิมพระเกียรติฯ",],
    "สำนักการกีฬา": ["กลุ่มบริหารงานทั่วไป", "กลุ่มงานกีฬาขั้นพื้นฐาน","กลุ่มกีฬาส่วนภูมิภาค","กลุ่มกีฬามวลชน","กลุ่มกีฬาคนพิการและคนพิเศษ","กลุ่มกีฬาระหว่างประเทศ","กลุ่มอนุรักษ์ศิลปะมวยไทย","กลุ่มวิจัยและพัฒนา"],
    "สำนักนันทนาการ": ["กลุ่มบริหารงานทั่วไป", "กลุ่มงานนันทนาการเด็กและเยาวชน","กลุ่มนันทนาการชุมชน","กลุ่มนันทนาการสัมพันธ์","กลุ่มวิจัยและพัฒนา"],
    "สำนักวิทยาศาสตร์การกีฬา": ["กลุ่มบริหารงานทั่วไป", "กลุ่มพัฒนาสมรรถภาพร่างกาย","กลุ่มเวชศาสตร์กีฬา","กลุ่มวิทยาศาสตร์สุขภาพ","กลุ่มพัฒนาเทคโนโลยีทางการกีฬา","กลุ่มวิจัยและพัฒนา","ศูนย์พลศึกษาและวิทยาศาสตร์การกีฬา1-9"],
    "สถาบันพัฒนาบุคลากรการพลศึกษาและการกีฬา": ["กลุ่มบริหารงานทั่วไป", "กลุ่มวิชาการและมาตรฐานวิชาชีพ","กลุ่มพัฒนาการพลศึกษา กีฬาและนันทนาการภูมิภาค","กลุ่มพัฒนาผู้ฝึกสอนกีฬา","กลุ่มพัฒนาผู้ตัดสินกีฬา","กลุ่มพัฒนานักบริหารจัดการกีฬาและผู้นำนันทนาการ"]
  };

  // เลือก element ของ select ทั้งสอง
  const affiliationSelect = document.querySelector('select[name="affiliation"]');
  const jobGroupSelect = document.querySelector('select[name="job_group"]');

  // เพิ่ม event listener เมื่อมีการเปลี่ยนแปลงการเลือกสังกัด
  affiliationSelect.addEventListener('change', function() {
    const selectedAffiliation = this.value; // ค่าสังกัดที่ถูกเลือก
    jobGroupSelect.innerHTML = '<option selected disabled value="">--เลือกกลุ่มงานในสังกัด--</option>'; // ล้าง option เดิม

    // ถ้ามีการเลือกสังกัด ให้เพิ่ม option กลุ่มงานใหม่
    if (selectedAffiliation) {
      jobGroups[selectedAffiliation].forEach(group => {
        const option = document.createElement('option');
        option.value = group;
        option.textContent = group;
        jobGroupSelect.appendChild(option);
      });
    }
  });
</script>
@endpush