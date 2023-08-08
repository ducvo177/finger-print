<?php

namespace App\Http\Controllers;

use App\Repositories\FingerPrintRepository;
use App\Repositories\FingerScanRepository;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    protected $userRepository;
    protected $fingerScanRepository;
    protected $fingerPrintRepository;

    public function __construct(UserRepository $userRepository, FingerScanRepository $fingerScanRepository, FingerPrintRepository $fingerPrintRepository)
    {
        $this->userRepository = $userRepository;
        $this->fingerScanRepository = $fingerScanRepository;
        $this->fingerPrintRepository = $fingerPrintRepository;
    }

    public function index()
    {
        $user = auth()->user();
        if (auth()->user()->is_admin == 0) {
            $fingerscanData = $this->fingerScanRepository->findByUserId(auth()->user()->id);
            return view('dashboard', compact('fingerscanData', 'user'));
        } else {
            return redirect()->route('admin');
        }
    }

    public function admin(Request $request)
    {
        $inputs = $request->all();
        $sortBy = $request->sort_by;
        $sortOrder = $request->sort_order;
        $search = $request->search;
        $users = $this->userRepository->getAllUser($sortBy, $sortOrder, $search);
        return view('admin', compact('users'));
    }
    
    public function scan(Request $request)
    {
        $input = $request->all();
        $fingerPrint = $this->fingerPrintRepository->findByUserId($input['user_id']);
        if ($fingerPrint->count() === 0) {
            return redirect()->route('dashboard')->with('error', 'Người dùng chưa có mẫu vân tay, hãy liên hệ admin');
        }else{
            return view('scan');
        }
    }

    public function check(Request $request)
    {
        // Luuw thông tin về bản ghi quét vân tay chấm công
        $file = $request->file('url');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('image', $fileName, 'public');
        $imageUrl = Storage::url($filePath);
        $inputs['isCorrect'] = 0;
        $inputs['date'] = Carbon::now();
        $inputs['user_id'] = auth()->user()->id;
        $inputs['tmpContent'] = $imageUrl;
        $inputs['scanmachine_id'] = 20;
        $this->fingerScanRepository->save($inputs);
        return redirect()->route('dashboard')->with('success', 'Đã chấm công thành công');
    }

    public function user(Request $request)
    {
        $user = $this->userRepository->findById($request->user_id);
        $fingerscanData = $this->fingerScanRepository->findByUserId($request->user_id);
        return view('user', compact('fingerscanData', 'user'));
    }

    public function userUpdate(Request $request)
    {
        $inputs = $request->all();
        $id = $inputs['id'];
        $route = $inputs['route'];
        unset($inputs['route']);
        unset($inputs['id']);
        if ($inputs['avatar'] instanceof \Illuminate\Http\UploadedFile && getimagesize($inputs['avatar'])) {
            $file = $inputs['avatar'];
            $fileName = 'avatar.' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('image', $fileName, 'public');
            $imageUrl = Storage::url($filePath);
            $inputs['avatar'] = $imageUrl;
        }

        $this->userRepository->save($inputs, ['id' => $id]);
        if ($route == 'admin') {
            return redirect()->route('user', ['user_id' => $id])->with('success', 'Update user thành công');
        } else {
            return redirect()->route('dashboard')->with('success', 'Update user thành công');
        }
    }

    public function userScan(Request $request)
    {
        $input = $request->all();
        $fingerPrint = $this->fingerPrintRepository->findByUserId($input['user_id']);
        if ($fingerPrint->count() === 0) {
            $user =  $this->userRepository->findById($input['user_id']);
            return view('userscan', compact('user', 'user'));
        } else {
            return redirect()->route('user', ['user_id' => $input['user_id']])->with('error', 'Người dùng đã có dấu vân tay');
        }
    }

    public function userScanSave(Request $request)
    {
        $user = $this->userRepository->findById($request->id);
        $file = $request->file('url');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('image', $fileName, 'public');
        $imageUrl = Storage::url($filePath);
        $inputs['name'] = 'finger-print-' . $user->maNV;
        $inputs['user_id'] = $request->id;
        $inputs['content'] = $imageUrl;
        $inputs['date'] = Carbon::now();
        $this->fingerPrintRepository->save($inputs);
        return redirect()->route('admin')->with('success', 'Đã thêm dấu vân tay thành công');
    }
    public function userDelete(Request $request)
    {
        $input = $request->all();
        $this->userRepository->deleteByUserId($input['user_id']);
        return redirect()->route('admin')->with('success', 'Bạn đã xóa nhân viên thành công');
    }
}
