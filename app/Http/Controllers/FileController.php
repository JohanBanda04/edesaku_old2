<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Village;
use App\Models\File;
use App\Models\VillageFile;
use App\Models\VillageHasFile;
use App\Models\Comment;

class FileController extends Controller {
    public static function view_all(){
        $villageFiles = VillageFile::getAllCombination()
        ->orderBy('village_id')
        ->orderBy('file_id')
        ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy('village_id');
        // ->groupBy(['village_id', 'file_id'])
        // dd($villageFiles);
        return view('table', [
            'villageFiles' => $villageFiles]
        );
    }
    public static function view_files(Request $request){
        $villageFiles = VillageFile::getAllCombination()
        ->where('village_id', $request->route('village_id'))
        ->where('file_id', $request->route('file_id'))
        ->orderBy('created_at', 'desc')
        ->get();
        if ($request->route('file_id') == '3'){
            return view('images', [
                'villageFiles' => $villageFiles]
            );
        } else if ($request->route('file_id') == '7'){
            return view('files', [
                'villageFiles' => $villageFiles]
            );
        }
    }
    public static function view_verified_files(Request $request){
        $villageFiles = VillageFile::getAllCombination()->where('is_verified', '1')->get()->groupBy('village_id');
        return view('table', [
            'villageFiles' => $villageFiles]
        );
    }
    public static function view_not_verified_files(Request $request){
        $villageFiles = VillageFile::getAllCombination()->where('is_verified', '0')->get()->groupBy('village_id');
        return view('table', [
            'villageFiles' => $villageFiles]
        );
    }
    public static function view_empty_files(Request $request){
        $villageFiles = VillageFile::getAllCombination()->where('village_has_files.created_at', null)->get()->groupBy('village_id');
        return view('table', [
            'villageFiles' => $villageFiles]
        );
    }
    public static function view_upload(Request $request){
        if (auth()->user()->role->name === "Village"){
            if (auth()->user()->id != Village::where('id', $request->route('village_id'))->first()->user_id){
                return back()->with(
                    'gagal', 'Hanya bisa mengunggah di desa/ kelurahan sendiri.'
                );
            }
            $dateJson = json_decode(Storage::get('date.json'));
            $limitTime = Carbon::create($dateJson->year, $dateJson->month, $dateJson->date, 23, 59, 59, 'Asia/Singapore');
            $serverTime = Carbon::now('Asia/Singapore');
            if ($serverTime->gte($limitTime)){
                return back()->with(
                    'gagal', 'Waktu unggah sudah habis, hubungi pengurus jika masih ada berkas yang butuh perubahan/perbaikan/diunggah ulang.'
                );
            }
        }
        
        $village = Village::with(['district', 'district.city'])->where('id', $request->route('village_id'))->first();
        $file = File::where('id', $request->route('file_id'))->first();
        return view('upload',[
            'village' => $village,
            'file' => $file,
        ]);
    }

    public static function upload(Request $request){
        $village_id = $request->route('village_id');
        $file_id = $request->route('file_id');
        if (auth()->user()->role->name === "Village"){
            if (auth()->user()->id != Village::where('id', $village_id)->first()->user_id){
                return back()->with(
                    'gagal', 'Hanya bisa mengunggah di desa/ kelurahan sendiri.'
                );
            }
            $dateJson = json_decode(Storage::get('date.json'));
            $limitTime = Carbon::create($dateJson->year, $dateJson->month, $dateJson->date, 23, 59, 59, 'Asia/Singapore');
            $serverTime = Carbon::now('Asia/Singapore');
            if ($serverTime->gte($limitTime)){
                return back()->with(
                    'gagal', 'Waktu pemberkasan sudah habis, hubungi pengurus jika masih ada berkas yang butuh perubahan/perbaikan/diunggah ulang.'
                );
            }
        }
        $file = File::where('id', $file_id)->first();
        $mimes = $file->allowed_ext;
        $max = $file->max_size * 1024;
        $validator = "mimes:$mimes|max:$max|required";
        
        $request->validate([
            'file' => $validator,
        ],[
            'required' => 'Pilih dulu berkas yang ingin diunggah.',
            'max' => 'Berkas yang diunggah harus tidak lebih besar dari :max KB.',
            'mimes' => "Hanya menerima berkas dengan format/ekstensi $mimes",
        ]);
        $data = new VillageHasFile();
        $data->village_id = $village_id;
        $data->file_id = $file_id;
        if ($file->is_multiple){
            $data->name = $request->input('name');
            $request->validate([
                'name' => 'required|max:64',
            ],[
                'required' => 'Nama berkas harus di isi.',
                'max' => 'Nama tidak boleh lebih banyak dari :max karakter.',
            ]);
        }
        $data->user_id = auth()->user()->id;
        $data->extension = $request->file('file')->extension();
        $data->size = $request->file('file')->getSize();
        if ($data->save()) {
            if ($file->is_multiple){
                
            } else {
                $previous_files = VillageHasFile::where('file_id', $file_id)
                    ->where('village_id', $village_id)
                    ->where('id', '!=', $data->id);
                foreach ($previous_files->get() as $file){
                    Storage::delete('files/' . $file->id);
                }
                $previous_files->delete();
            }
            
            $request->file('file')->storeAs('files', $data->id);
            if ($request->query('redirect')){
                return redirect($request->query('redirect'))->with(
                    'berhasil', 'Berkas berhasil diunggah.'
                );
            } else {
                return back()->with(
                    'berhasil', 'Berkas berhasil diunggah.'
                );
            }
        } else {
            if ($request->query('redirect')){
                return redirect($request->query('redirect'))->with(
                    'gagal', 'Berkas gagal diunggah.'
                );
            } else {
                return back()->with(
                    'gagal', 'Berkas gagal diunggah.'
                );
            }
        }
        
    }
    public static function download(Request $request){
        $village_file_id = $request->route('village_file_id');
        $village_file = VillageHasFile::where('id', $village_file_id)->first();
        if (!$village_file){
            return back()->with(
                'gagal', 'Berkas tidak ditemukan.'
            );
        }
        $download_file = storage_path("app/files/") . $village_file_id;
        $download_name = $village_file->village->name . " " . $village_file->file->name . "." . $village_file->extension;
        $download_name = mb_ereg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '_', $download_name);
        return response()->download($download_file, $download_name);
    }
    
    public static function verify(Request $request){
        $village_file_id = $request->route('village_file_id');
        if (VillageHasFile::where('id', $village_file_id)->update(['is_verified' => '1'])){
            return back()->with(
                'berhasil', 'Berhasil memverifikasi berkas.'
            );
        }
        return back()->with(
            'gagal', 'Hanya bisa dilakukan jika pengguna sudah masuk.'
        );
    }
    
    public static function cancel_verification(Request $request){
        $village_file_id = $request->route('village_file_id');
        if (VillageHasFile::where('id', $village_file_id)->update(['is_verified' => '0'])){
            return back()->with(
                'berhasil', 'Berhasil membatalkan verfikasi berkas.'
            );
        }
        return back()->with(
            'gagal', 'Hanya bisa dilakukan jika pengguna sudah masuk.'
        );
    }
    
    public static function view_file_message(Request $request){
        $village_file_id = $request->route('village_file_id');
        if(!VillageHasFile::where('id', '=', $request->route('village_file_id'))->exists()){
            return redirect('/files');
        }
        $comments = Comment::where('village_has_file_id', $village_file_id)->get();
        $village_file = VillageFile::getAllCombination()->where('village_has_files.id', $village_file_id)->first();
        return view('file_messages', [
            'file' => $village_file,
            'village_name' => $village_file->village_name,
            'file_name' => ($village_file->real_file_name)? $village_file->real_file_name : $village_file->file_name ,
            'comments' => $comments
        ]);
    }

    public static function message(Request $request){
        $credentials = $request->validate(
            ['content' => 'required|max:255'],
            [
                'required' => 'Isi dulu pesan yang ingin dikirim.',
                'max' => 'Pesan tidak boleh lebih dari :max karakter.'
            ]);
        $village_file_id = $request->route('village_file_id');
        
        if (Comment::create($credentials + ['village_has_file_id' => $village_file_id])){
            return back()->with(
                'berhasil', 'Berhasil mengirim pesan.'
            );
        }
        return back()->with(
            'gagal', 'Gagal mengirim pesan.'
        );
    }
    
    public static function delete(Request $request){
        $village_file_id = $request->route('village_file_id');
        if(auth()->user()->role->name === "Village" ){
            $village_file = VillageHasFile::where('id', $village_file_id)->first();
            if (auth()->user()->id != $village_file->village->user_id){
                return back()->with(
                    'gagal', 'Hanya bisa menghapus berkas di desa/ kelurahan sendiri.'
                );
            }
            $dateJson = json_decode(Storage::get('date.json'));
            $limitTime = Carbon::create($dateJson->year, $dateJson->month, $dateJson->date, 23, 59, 59, 'Asia/Singapore');
            $serverTime = Carbon::now('Asia/Singapore');
            if ($serverTime->gte($limitTime)){
                return back()->with(
                    'gagal', 'Waktu pemberkasan sudah habis, hubungi pengurus jika masih ada berkas yang butuh perubahan/perbaikan/diunggah ulang.'
                );
            }
        }
        
        Comment::where('village_has_file_id', $village_file_id)->delete();
        VillageHasFile::destroy($village_file_id);
        if (Storage::delete("files/" . $village_file_id)){
            return back()->with(
                'berhasil', 'Berhasil menghapus berkas.'
            );
        }
        return back()->with(
            'gagal', 'Hanya bisa dilakukan jika pengguna sudah masuk.'
        );
    }
}
