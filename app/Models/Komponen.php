<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komponen extends Model
{
    use HasFactory;

    protected $table = 'komponen';
    protected $guarded = [];
    protected $fillable = ['ID_IKU_MULTI_KOMPONEN', 'SS_KOMPONEN', 'KODE_SS_KOMPONEN', 'IKU_KOMPONEN', 'DEFINISI_IKU_KOMPONEN', 'FORMULA_IKU_KOMPONEN', 'KOMPONEN_PENGUKURAN_KOMPONEN', 'PENJELASAN_IKU_KOMPONEN_KOMPONEN', 'UIC_KOMPONEN', 'QUARTAL_TARGET_1_KOMPONEN', 'QUARTAL_CAPAIAN_1_KOMPONEN', 'QUARTAL_TARGET_2_KOMPONEN', 'QUARTAL_CAPAIAN_2_KOMPONEN', 'QUARTAL_TARGET_3_KOMPONEN', 'QUARTAL_CAPAIAN_3_KOMPONEN', 'QUARTAL_TARGET_4_KOMPONEN', 'QUARTAL_CAPAIAN_4_KOMPONEN', 'TARGET_SEMESTERAN_KOMPONEN', 'CAPAIAN_SEMESTERAN_KOMPONEN', 'TARGET_TAHUNAN_KOMPONEN', 'CAPAIAN_TAHUNAN_KOMPONEN', 'TARGET_AKTUAL_KOMPONEN', 'CAPAIAN_AKTUAL_KOMPONEN', 'PENJELASAN_CAPAIAN_KOMPONEN', 'KEGIATAN_YANG_TELAH_DILAKSANAKAN_KOMPONEN', 'RENCANA_AKSI_DAN_TARGET_PENYELESAIAN_RENCANA_AKSI_KOMPONEN', 'PERMASALAHAN_KOMPONEN', 'FLAG_KOMPONEN_KOMPONEN', 'TARGET_Q1_KOMPONEN', 'TARGET_Q2_KOMPONEN', 'TARGET_Q3_KOMPONEN', 'TARGET_Q4_KOMPONEN', 'CAPAIAN_Q1_KOMPONEN', 'CAPAIAN_Q2_KOMPONEN', 'CAPAIAN_Q3_KOMPONEN', 'CAPAIAN_Q4_KOMPONEN'];

    public function iku()
    {
        // return $this->belongsTo(Iku::class, 'ID_IKU_MULTI_KOMPONEN');
        return $this->belongsToMany(Iku::class, 'ID_IKU_MULTI_KOMPONEN');
    }
}
