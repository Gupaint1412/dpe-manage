<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typemodel;
use App\Models\Devicemodel;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; // สำหรับลบไฟล์เก่า
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function device()
    {
        $device = Devicemodel::where('deleted', 0)->get(); // นับจำนวนอุปกรณ์ที่ยังไม่ถูกลบ
        $computer = Devicemodel::where('type_eq', 'Computer')->count();
        $notebook = Devicemodel::where('type_eq', 'Notebook')->count();
        $tablet = Devicemodel::where('type_eq', 'Tablet')->count();
        $projector = Devicemodel::where('type_eq', 'Projector')->count();
        $printer = Devicemodel::where('type_eq', 'Printer')->count();        
        $network = Devicemodel::where('type_eq', 'Network')->count();   
        $currentYear = date('Y')+543;       
        return view('page.device',compact('device', 'currentYear','notebook','computer','tablet','projector','printer','network'));
    }

    public function add_device()
    {
        $types = Typemodel::all();
        return view('page.add_device',compact('types'));
    }

    public function store_device(Request $request){        
        // 1. ตรวจสอบความถูกต้องของข้อมูลที่ส่งมา (Validation)
        // หากข้อมูลไม่ถูกต้อง Laravel จะ redirect กลับไปยังหน้าฟอร์มเดิมพร้อมแสดงข้อผิดพลาด
        // dd($request->all());
        $validatedData = $request->validate([
            'type' => 'required|string|max:255', // ประเภทอุปกรณ์ (จำเป็นต้องระบุ, เป็นข้อความ, ไม่เกิน 255 ตัวอักษร)
            'subtype' => 'required|string|max:255', // ชนิดย่อยของอุปกรณ์ (จำเป็นต้องระบุ, เป็นข้อความ, ไม่เกิน 255 ตัวอักษร)
            'brand' => 'required|string|max:255', // ยี่ห้อ (จำเป็นต้องระบุ, เป็นข้อความ, ไม่เกิน 255 ตัวอักษร)
            'model' => 'required|string|max:255', // รุ่น (จำเป็นต้องระบุ, เป็นข้อความ, ไม่เกิน 255 ตัวอักษร)
            'eq_no' => 'nullable|string|max:255', // หมายเลขครุภัณฑ์ (ไม่จำเป็นต้องระบุ, เป็นข้อความ, ไม่เกิน 255 ตัวอักษร)
            'eq_number' => 'nullable|string|max:255', // หมายเลข IT (ไม่จำเป็นต้องระบุ, เป็นข้อความ, ไม่เกิน 255 ตัวอักษร)
            'eq_number_it' => 'nullable|string|max:255', // หมายเลข IT (ซ้ำ? อาจต้องตรวจสอบชื่อฟิลด์ของคุณ)
            'service_life' => 'nullable|integer|min:0', // อายุการใช้งาน (ไม่จำเป็นต้องระบุ, เป็นจำนวนเต็ม, ค่าต่ำสุด 0)
            'os' => 'nullable|string|max:255', // ระบบปฏิบัติการ (ไม่จำเป็นต้องระบุ, เป็นข้อความ, ไม่เกิน 255 ตัวอักษร)
            'images' => 'array|nullable', // 'images' ต้องเป็น array และสามารถเป็นค่าว่างได้ (ถ้าไม่มีการอัปโหลดรูป)
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // แต่ละไฟล์ใน array 'images' ต้องเป็นรูปภาพ, นามสกุลที่อนุญาต, ขนาดไม่เกิน 2MB (2048 KB)
        ]);
          

        $imagePaths = [];
        // 2. จัดการการอัปโหลดรูปภาพหลายรูป
        // ตรวจสอบว่ามีการอัปโหลดไฟล์ 'images' เข้ามาใน request หรือไม่
        if ($request->hasFile('images')) {
            // กำหนดพาธปลายทางสำหรับเก็บรูปภาพใน public folder
            // รูปภาพจะถูกเก็บที่ public/All_Device
            
            $destinationPath = 'All_Device';

            // วนลูปผ่านไฟล์รูปภาพแต่ละไฟล์ที่ถูกอัปโหลด
            foreach ($request->file('images') as $image) {
                // สร้างชื่อไฟล์ที่ไม่ซ้ำกันโดยใช้ UUID (Universally Unique Identifier)
                $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();

                // ย้ายไฟล์รูปภาพไปยังพาธที่กำหนดใน public folder
                // public_path() จะชี้ไปยัง root ของ public directory ของ Laravel
                $image->move(public_path($destinationPath), $imageName);

                // เก็บพาธสัมพัทธ์ของรูปภาพ (เช่น All_Device/your_image_name.jpg)
                // เพื่อบันทึกลงในฐานข้อมูล
                $imagePaths[] = $destinationPath . '/' . $imageName;
            }
        }
    //    dd($imagePaths);
        // 3. บันทึกข้อมูลอุปกรณ์ลงในฐานข้อมูล
        Devicemodel::create([            
            'type' => $validatedData['type'],
            'type_eq' => $validatedData['subtype'], // แมป 'subtype' จากฟอร์มไปยัง 'type_eq' ในฐานข้อมูล
            'brand' => $validatedData['brand'],
            'model' => $validatedData['model'],
            'eq_no' => $validatedData['eq_no'],
            'eq_number' => $validatedData['eq_number'],
            'eq_number_it' => $validatedData['eq_number_it'],
            'service_life' => $validatedData['service_life'],
            'os' => $validatedData['os'],
            // แปลง array ของพาธรูปภาพให้เป็น JSON string ก่อนบันทึกลงฐานข้อมูล
            'path_img' => $imagePaths,
        ]);
        $request->session()->flash('storage-success');
        return redirect()->route('device');
    }

    public function edit_device($id)
    {
        $device = Devicemodel::findOrFail($id);
        $types = Typemodel::all();
        return view('page.edit_device', compact('device', 'types'));
    }

     public function update_device(Request $request, $id)
    {
        // 1. ค้นหาอุปกรณ์ที่จะอัปเดต
        $device = Devicemodel::findOrFail($id);

        // 2. กำหนดกฎการตรวจสอบความถูกต้องของข้อมูล (Validation Rules)
        $validationRules = [
            'type' => 'required|string|max:255',
            'subtype' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'eq_no' => 'nullable|string|max:255',
            'eq_number' => 'nullable|string|max:255',
            'eq_number_it' => 'nullable|string|max:255',
            'service_life' => 'nullable|integer|min:0',
            'os' => 'nullable|string|max:255',
            // is_required จะเป็น '1' ถ้าถูกติ๊ก, ถ้าไม่ติ๊กจะไม่มีค่าใน request หรือเป็น null/false
            'is_required' => 'nullable|boolean', // เพิ่ม validation สำหรับ checkbox
        ];
       
        // 3. ถ้า is_required ถูกติ๊ก (ผู้ใช้ต้องการเปลี่ยนรูปภาพ) ให้เพิ่มกฎ validation สำหรับ images
        if ($request->has('is_required') && $request->input('is_required') == '1') {
            $validationRules['images'] = 'array|required'; // ต้องมีรูปภาพถ้าเลือกเปลี่ยน
            $validationRules['images.*'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            // ถ้าไม่ได้ติ๊ก is_required ไม่ต้องบังคับให้มีรูปภาพ
            $validationRules['images'] = 'array|nullable';
            $validationRules['images.*'] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        // 4. ตรวจสอบความถูกต้องของข้อมูล
        $validatedData = $request->validate($validationRules);

        // 5. เตรียมข้อมูลสำหรับอัปเดต
        $updateData = [
            'type' => $validatedData['type'],
            'type_eq' => $validatedData['subtype'], // คาดว่า 'subtype' แมปกับ 'type_eq' ใน DB
            'brand' => $validatedData['brand'],
            'model' => $validatedData['model'],
            'eq_no' => $validatedData['eq_no'],
            'eq_number' => $validatedData['eq_number'],
            'eq_number_it' => $validatedData['eq_number_it'],
            'service_life' => $validatedData['service_life'],
            'os' => $validatedData['os'],
        ];
        // dd($updateData);
        // 6. จัดการการอัปโหลดรูปภาพใหม่ (ถ้าผู้ใช้เลือกที่จะเปลี่ยนรูปภาพ)
        if ($request->has('is_required') && $request->input('is_required') == '1' && $request->hasFile('images')) {
            $imagePaths = [];
            
            // ลบรูปภาพเก่าออกก่อน
            if ($device->path_img) {
                // path_img ควรเก็บเป็น JSON array ของ path รูปภาพ
                $existingImages = $device->path_img;
                if (is_array($existingImages)) {
                    foreach ($existingImages as $oldImagePath) {
                        // ตรวจสอบว่าไฟล์มีอยู่จริงก่อนลบ
                        if (File::exists(public_path($oldImagePath))) {
                            File::delete(public_path($oldImagePath));
                        }
                    }
                }
            }
            $destinationPath = 'All_Device';
            // อัปโหลดรูปภาพใหม่
            foreach ($request->file('images') as $image) {
                $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path($destinationPath), $imageName);

                $imagePaths[] = $destinationPath.'/'. $imageName;
            }

            // เพิ่ม path รูปภาพใหม่เข้าไปในข้อมูลอัปเดต
            $updateData['path_img'] = $imagePaths;
        }
        // dd($imagePaths);
        // ถ้า is_required ไม่ได้ถูกติ๊ก หรือไม่มีไฟล์ภาพใหม่ส่งมา และเดิมมีภาพอยู่แล้ว
        // เราจะไม่ไปยุ่งกับ path_img เพื่อคงภาพเดิมไว้
        // ถ้า is_required ถูกติ๊ก แต่ไม่มีไฟล์ภาพส่งมา (จาก validation rules ด้านบน)
        // แสดงว่าผู้ใช้เลือกที่จะเปลี่ยน แต่ไม่ได้อัปโหลดไฟล์ใหม่ เราสามารถถือว่าต้องการเคลียร์ภาพ
        // แต่ตาม validation ด้านบน ถ้า is_required เป็น 1, images จะ required
        // ดังนั้นกรณีนี้จะไม่เกิดขึ้นถ้า validation ผ่าน

        // 7. อัปเดตข้อมูลอุปกรณ์ในฐานข้อมูล
        $device->update($updateData);
        $request->session()->flash('update-success');
        return redirect()->route('device')->with('success', 'Device updated successfully!');
    }

    public function borrow_eq()
    {
        return view('page.borrow_eq');
    }

   public function api_device($id)
    {
        Log::info("Attempting to find device with ID: " . $id); // เพิ่มบรรทัดนี้
        $device = Devicemodel::find($id);

        if ($device) {
            Log::info("Device found: " . $device->id); // เพิ่มบรรทัดนี้
            // ถ้า $device->path_img เป็น JSON string ใน DB, ควร decode มัน
            // ถ้าใช้ $casts ใน Model แล้ว ไม่ต้องทำบรรทัดนี้
            // $device->path_img = json_decode($device->path_img, true);
            return response()->json($device);
        } else {
            Log::warning("Device with ID: " . $id . " not found."); // เพิ่มบรรทัดนี้
            return response()->json(['error' => 'Device not found'], 404);
        }
    }

    public function manage_user()
    {
        $users = User::all(); // ดึงข้อมูลผู้ใช้ทั้งหมดจากฐานข้อมูล
        return view('page.manage_user',compact('users'));
    }

    public function update_user(Request $request ,$id)
    {
        // dd($request->all());
        $user = User::find($id);
            // ตรวจสอบว่าพบผู้ใช้หรือไม่ ถ้าไม่พบอาจจะ redirect กลับหรือแสดงข้อความผิดพลาด
        if (!$user) {
            // เช่น return redirect()->back()->with('error', 'User not found.');
            return redirect()->route('manage_user')->with('error', 'User not found.');
         }
        $updateData = [
            'prefix' => $request->input('prefix'),
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'affiliation' => $request->input('affiliation'),
            'job_group' => $request->input('job_group'),
            'role'=> $request->input('role'),
            'status' => $request->input('status'),
        ];
        if($request->input('password') != null || $request->input('password') != ""){
            $updateData['password'] = Hash::make($request->input('password'));
            $updateData['view_pass'] = $request->input('password');
        }
        $user->update($updateData);
        $request->session()->flash('update-success');
        return redirect()->route('manage_user');
    }
    
}
