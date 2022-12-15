<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\VillageHasQuestionaire;
use App\Models\Village;
use App\Models\VillageHasFile;
use App\Models\VillageHasScore;

class QuestionaireController extends Controller
{
    public static function view(Request $request)
    {
        $village_id = $request->route('village_id');
        $village = Village::with(['district', 'district.city'])->where('id', $request->route('village_id'))->first();
        $village_questionaire = VillageHasQuestionaire::where('village_id', $village_id)->get()
            ->mapWithKeys(function ($village_questionaire, $key) {
                return [$village_questionaire->name => $village_questionaire->value];
            });
        
        return view(
            'questionaire_pdf',
            array_merge([
                "village" => $village
            ], $village_questionaire->toArray())
        );
    }
    public static function view_fill(Request $request)
    {
        $village_id = $request->route('village_id');
        if (auth()->user()->role->name === "Village") {
            if (auth()->user()->id != Village::where('id', $village_id)->first()->user_id) {
                return back()->with(
                    'gagal',
                    'Hanya bisa mengisi kuesioner di desa/ kelurahan sendiri.'
                );
            }
            $dateJson = json_decode(Storage::get('date.json'));
            $limitTime = Carbon::create($dateJson->year, $dateJson->month, $dateJson->date, 23, 59, 59, 'Asia/Singapore');
            $serverTime = Carbon::now('Asia/Singapore');
            if ($serverTime->gte($limitTime)) {
                return back()->with(
                    'gagal',
                    'Waktu pemberkasan sudah habis, hubungi pengurus jika masih ada berkas yang butuh perubahan/perbaikan/diunggah ulang.'
                );
            }
        }

        $village = Village::with(['district', 'district.city'])->where('id', $request->route('village_id'))->first();
        $village_questionaire = VillageHasQuestionaire::where('village_id', $village_id)->get()
            ->mapWithKeys(function ($village_questionaire, $key) {
                return [$village_questionaire->name => $village_questionaire->value];
            });

        return view(
            'questionaire',
            array_merge([
                "village" => $village
            ], $village_questionaire->toArray())
        );
    }
    public static function fill(Request $request)
    {
        $input = $request->only([
            'name1',
            'name2',
            'name3',
            'name4',
            'name5',
            'name6',
            'name7',
            'name8',
            'name9',
            'name10',
            'name11',
            'name12',
            'name13',
            'name14',
            'name15',
            'name16',
            'name17',
            'name18',
            'name19',
            'name20',
            'name21',
            'name22',
            'name23',
            'name24',
            'name25',
            'name26',
            'name27',
            'name28',
            'name29',
            'name30',
            'name31',
            'name32',
            'name33',
            'name34',
            'name35',
            'name36',
            'name37',
            'name38',
            'name39',
            'name40',
            'name41',
            'name42',
            'name43',
            'name44',
            'name45',
            'name46',
            'name47',
            'name48',
            'name49',
            'name50',
            'name51',
            'name52',
            'name53',
            'name54',
            'name55',
            'name56',
            'name57',
            'name58',
            'name59',
            'name60',
            'name61',
            'name62',
            'name63',
            'name64',
            'name65',
            'name66',
            'name67',
            'name68',
            'name69',
            'name70',
            'name71',
            'name72',
            'name73',
            'name74',
            'name75',
            'name76',
            'name77',
            'name78',
            'name79',
            'name80',
            'name81',
            'name82',
            'name83',
            'name84',
            'name85',
            'name86',
            'name87',
            'name88',
            'name89',
            'name90',
            'name91',
            'name92',
            'name93',
            'name94',
            'name95',
            'name96',
            'name97',
            'name98',
            'name99',
            'name100',
            'name101',
            'name102',
            'name103',
            'name104',
            'name105',
            'name106',
            'name107',
            'name108',
            'name109',
            'name110',
            'name111',
            'name112',
            'name113',
            'name114',
            'name115',
            'name116',
            'name117',
            'name118',
            'name119',
            'name120',
            'name121',
            'name122',
            'name123',
            'name124',
            'name125',
            'name126',
            'name127',
            'name128',
            'name129',
            'name130',
            'name131',
            'name132',
            'name133',
            'name134',
            'name135',
            'name136',
            'name137',
            'name138',
            'name139',
            'name140',
            'name141',
            'name142',
            'name143',
            'name144',
            'name145',
            'name146',
            'name147',
            'name148',
            'name149',
            'name150',
            'name151',
            'name152',
            'name153',
            'name154',
            'name155',
            'name156',
            'name157',
            'name158',
            'name159',
            'name160',
            'name161',
            'name162',
            'name163',
            'name164',
            'name165',
            'name166',
            'name167',
            'name168',
            'name169',
            'name170',
            'name171',
            'name172',
            'name173',
            'name174',
            'name175',
            'name176',
            'name177',
            'name178',
            'name179',
            'name180',
            'name181',
            'name182',
            'name183',
            'name184',
            'name185',
            'name186',
            'name187',
            'name188',
            'name189',
            'name190',
            'name191',
            'name192',
            'name193',
            'name194',
            'name195',
            'name196',
            'name197',
            'name198',
            'name199',
            'name200',
            'name201',
            'name202',
            'name203',
            'name204',
            'name205',
            'name206',
            'name207',
            'name208',
            'name209',
            'name210',
            'name211',
            'name212',
            'name213',
            'name214',
            'name215',
            'name216',
            'name217',
            'name218',
            'name219',
            'name220',
            'name221',
            'name222',
            'name223',
            'name224',
            'name225',
            'name226',
            'name227',
            'name228',
            'name229',
            'name230',
            'name231',
            'name232',
            'name233',
            'name234',
            'name235',
            'name236',
            'name237',
            'name238',
            'name239',
            'name240',
            'name241',
            'name242',
            'name243',
            'name244',
            'name245',
            'name246',
            'name247',
            'name248',
            'name249',
            'name250',
            'name251',
            'name252',
            'name253',
            'name254',
            'name255',
            'name256',
            'name257',
            'name258',
            'name259',
            'name260',
            'name261',
            'name262',
        ]);
        $village_id = $request->route('village_id');
        if (auth()->user()->role->name === "Village") {
            if (auth()->user()->id != Village::where('id', $village_id)->first()->user_id) {
                return back()->with(
                    'gagal',
                    'Hanya bisa mengisi kuesioner di desa/ kelurahan sendiri.'
                );
            }
            $dateJson = json_decode(Storage::get('date.json'));
            $limitTime = Carbon::create($dateJson->year, $dateJson->month, $dateJson->date, 23, 59, 59, 'Asia/Singapore');
            $serverTime = Carbon::now('Asia/Singapore');
            if ($serverTime->gte($limitTime)) {
                return back()->with(
                    'gagal',
                    'Waktu pemberkasan sudah habis, hubungi pengurus jika masih ada berkas yang butuh perubahan/perbaikan/diunggah ulang.'
                );
            }
        }

        $input = $request->except(['redirect', '_token']);

        /* reset questionaire value */
        VillageHasQuestionaire::where('village_id', $village_id)
            ->update(['value' => null]);
        $data = [];

        foreach ($input as $inputKey => $inputElem) {
            $data[] = ['name' => $inputKey, 'value' => $inputElem, 'village_id' => $village_id];
        }
        if (VillageHasQuestionaire::upsert($data, ['name', 'village_id'], ['value'])) {
            $data = new VillageHasFile();
            $data->village_id = $village_id;
            $data->file_id = '6';
            $data->user_id = auth()->user()->id;
            $data->extension = '';
            $data->size = '0';
            $data->save();
            return back()->with([
                'berhasil' => 'Berhasil menyimpan kuesioner.',
            ]);
        }
    }
    public static function view_score(Request $request)
    {
        $village_id = $request->route('village_id');
        $village = Village::with(['district', 'district.city'])->where('id', $request->route('village_id'))->first();
        $village_questionaire = VillageHasQuestionaire::where('village_id', $village_id)->get()
            ->mapWithKeys(function ($village_questionaire, $key) {
                return [$village_questionaire->name => $village_questionaire->value];
            });

        $village_score = VillageHasScore::where('village_id', $village_id)->get()
            ->mapWithKeys(function ($village_score, $key) {
                return [$village_score->name => $village_score->value];
            });

        return view(
            'questionaire_score',
            array_merge([
                "village" => $village
            ], $village_questionaire->toArray(), $village_score->toArray())
        );
    }
    public static function score(Request $request)
    {
        $input = $request->only([
            'score1',
            'score2',
            'score3',
            'score4',
            'score5',
            'score6',
            'score7',
            'score8',
            'score9',
            'score10',
            'score11',
            'score12',
            'score13',
            'score14',
            'score15',
            'score16',
            'score17',
            'score18',
            'score19',
            'score20',
            'score21',
            'score22',
            'score23',
            'score24',
            'score25',
            'score26',
            'score27',
            'score28',
            'score29',
            'score30',
            'score31',
            'score32',
            'score33',
            'score34',
            'score35',
            'score36',
            'score37',
            'score38',
            'score39',
            'score40',
            'score41',
            'score42',
            'score43',
            'score44',
            'score45',
            'score46',
            'score47',
            'score48',
            'score49',
            'score50',
            'score51',
            'score52',
            'score53',
            'score54',
            'score55',
            'score56',
            'score57',
            'score58',
            'score59',
            'score60',
            'score61',
            'score62',
            'score63',
            'score64',
            'score65',
            'score66',
            'score67',
            'score68',
            'score69',
            'score70',
            'score71',
            'score72',
            'score73',
            'score74',
            'score75',
            'score76',
            'score77',
            'score78',
            'score79',
            'score80',
            'score81',
            'score82',
            'score83',
            'score84',
            'score85',
        ]);
        $village_id = $request->route('village_id');

        $data = [];
        foreach ($input as $inputKey => $inputValue) {
            $data[] = [
                'name' => $inputKey,
                'village_id' => $village_id,
                'value' => $inputValue,
                'user_id' => auth()->user()->id
            ];
        }

        if (VillageHasScore::upsert($data, ['name', 'village_id'], ['value', 'user_id'])) {
            return back()->with([
                'berhasil' => 'Berhasil menyimpan nilai kuesioner.',
            ]);
        }
    }
    public static function download(Request $request)
    {
    }
}
