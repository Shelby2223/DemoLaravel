<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\products;
use App\Models\comments;
use App\Models\bill_detail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class PageController extends Controller
{
    public function getIndex()
    {	
    	$slide = Slide::all();
    	$new_product = products::where('new', 1)->get();	
        $sanpham_khuyenmai = products::where('promotion_price', '<>', 0)->get();
    	return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }
    
    public function getDetail(Request $request)
    {
        $sanpham = products::where('id', $request->id)->first();
        $splienquan = products::where('id', '<>', $sanpham->id)->where('id_type', $sanpham->id_type)->paginate(3);
        $comment = comments::where('id_product', $request->id)->get();
        return view('page.details', compact('sanpham', 'splienquan', 'comment'));
    }
    
    public function getIndexAdmin()
    {
        // Lấy tất cả các sản phẩm từ bảng 'products'
        $products = products::all();
    
        // Trả về view 'pageadmin.admin' với dữ liệu được truyền vào
        return view('pageadmin.admin')->with(['products' => $products, 'sumSold' => count(bill_detail::all())]);
    }
    
    public function getAdminAdd(){
        return view('pageadmin.formadd');
    }
   								
    public function postAdminAdd(Request $request)
    {
        // Tạo một phiên bản mới của lớp mô hình Product
        $product = new products();
    
        // Kiểm tra nếu có file inputImage được gửi lên
        if ($request->hasFile('inputImage')) {
            // Lấy thông tin về file
            $file = $request->file('inputImage');
            // Lấy tên gốc của file
            $fileName = $file->getClientOriginalName('inputImage');
            // Di chuyển file vào thư mục 'source/image/product'
            $file->move('source/image/product', $fileName);
        }
    
        $file_name = null;
    
        // Kiểm tra nếu file inputImage không rỗng
        if ($request->file('inputImage') != null) {
            // Lấy tên gốc của file
            $file_name = $request->file('inputImage')->getClientOriginalName();
        }
    
        // Gán giá trị từ request vào các thuộc tính của đối tượng $product
        $product->name = $request->inputName;
        $product->image = $file_name;
        $product->description = $request->inputDescription;
        $product->unit_price = $request->inputPrice;
        $product->promotion_price = $request->inputPromotionPrice;
        $product->unit = $request->inputUnit;
        $product->new = $request->inputNew;
        $product->id_type = $request->inputType;
    
        // Lưu đối tượng $product vào cơ sở dữ liệu
        $product->save();

        // Trả về kết quả từ phương thức getIndexAdmin()
        return Redirect::to('/admin');

    }

    public function getAdminEdit($id)
    {
        $product = products::find($id);
        return view('pageadmin.formEdit')->with('product', $product);
    }
    public function postAdminEdit(Request $request)
    {
        $id = $request->editId;
        $product= products::find($id);
        if($request->hasFile('editImage')){
            $file = $request->file('editImage');
            $fileName = $file->getClientOriginalName('eidtImage');
            $file->move('source/image/product', $fileName);
        }
        if ($request->file('editImage') != null) {
            $product->image = $fileName;
        }
        $product->name = $request->editName;
        $product->description = $request->editDescription;
        $product->unit_price = $request->editPrice;
        $product->promotion_price = $request->editPromotionPrice;
        $product->unit = $request->editUnit;
        $product->new = $request->editNew;
        $product->id_type = $request->editType;
        $product->save();
        return Redirect::route('admin');
    }
    
    public function postAdminDelete($id) {
        $product = products::find($id);
        $product ->delete();

        // Thêm thông báo cảnh báo vào session
        Session::flash('success', 'Product deleted successfully.');
        Session::save();

        return Redirect::to('/admin');
    }
    
       					
}
