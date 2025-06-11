<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('idlaporan');
            $table->unsignedBigInteger('idkelurahan');
            $table->string('status')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('topologi')->nullable();
            $table->string('tahun')->nullable();
            $table->string('klasifikasi')->nullable();
            $table->string('kategoridesa')->nullable();
            $table->string('komoditas_unggulan_berdasarkan_luas_tanam')->nullable();
            $table->string('komoditas_unggulan_berdasarkan_nilai_ekonomi')->nullable();
            $table->decimal('luas_wilayah', 10, 2)->nullable();
            $table->decimal('lahan_sawah', 10, 2)->nullable();
            $table->decimal('lahan_ladang', 10, 2)->nullable();
            $table->decimal('lahan_perkebunan', 10, 2)->nullable();
            $table->decimal('lahan_peternakan', 10, 2)->nullable();
            $table->decimal('hutan', 10, 2)->nullable();
            $table->decimal('waduk', 10, 2)->nullable();
            $table->decimal('lahan_lainya', 10, 2)->nullable();
            $table->integer('jumlah_sertifikat')->nullable();
            $table->decimal('luas_tanah_sertifikat', 10, 2)->nullable();
            $table->decimal('luas_tanah_kas', 10, 2)->nullable();
            $table->decimal('jarak_dari_pusat_kecamatan', 10, 2)->nullable();
            $table->decimal('jarak_dari_pusat_kota', 10, 2)->nullable();
            $table->decimal('jarak_dari_pusat_kabupaten', 10, 2)->nullable();
            $table->decimal('jarak_dari_pusat_ibu_kota_provinsi', 10, 2)->nullable();
            $table->integer('jumlah_kepala_keluarga')->nullable();
            $table->integer('keluarga_pra_sejahtera')->nullable();
            $table->integer('keluarga_sejahtera_1')->nullable();
            $table->integer('keluarga_sejahtera_2')->nullable();
            $table->integer('keluarga_sejahtera_3')->nullable();
            $table->integer('keluarga_sejahtera_3_plus')->nullable();
            $table->integer('jumlah_penduduk')->nullable();
            $table->integer('laki_laki')->nullable();
            $table->integer('perempuan')->nullable();
            $table->integer('usia_0_17')->nullable();
            $table->integer('usia_18_56')->nullable();
            $table->integer('usia_56_keatas')->nullable();
            $table->integer('karyawan_pns')->nullable();
            $table->integer('karyawan_pol_tni')->nullable();
            $table->integer('karyawan_swasta')->nullable();
            $table->integer('wiraswasta')->nullable();
            $table->integer('petani')->nullable();
            $table->integer('buruh_tani')->nullable();
            $table->integer('nelayan')->nullable();
            $table->integer('peternak')->nullable();
            $table->integer('jasa')->nullable();
            $table->integer('pengrajin')->nullable();
            $table->integer('pekerja_seni')->nullable();
            $table->integer('pensiunan')->nullable();
            $table->integer('lainya')->nullable();
            $table->integer('menganggur')->nullable();
            $table->integer('tk')->nullable();
            $table->integer('sd')->nullable();
            $table->integer('sltp')->nullable();
            $table->integer('slta')->nullable();
            $table->integer('akademi')->nullable();
            $table->integer('sarjana')->nullable();
            $table->integer('pasca_sarjana')->nullable();
            $table->integer('dokter_umum')->nullable();
            $table->integer('dokter_spesialis')->nullable();
            $table->integer('bidan')->nullable();
            $table->integer('mantri_kesehatan')->nullable();
            $table->integer('perawat')->nullable();
            $table->integer('lulusan_tk')->nullable();
            $table->integer('lulusan_sd')->nullable();
            $table->integer('lulusan_sltp')->nullable();
            $table->integer('lulusan_slta')->nullable();
            $table->integer('lulusan_akademi')->nullable();
            $table->integer('lulusan_s1')->nullable();
            $table->integer('lulusan_s2')->nullable();
            $table->integer('lulusan_s3')->nullable();
            $table->integer('lulusan_ponpes')->nullable();
            $table->integer('lulusan_pendidikan_keagamaan')->nullable();
            $table->integer('lulusan_slb')->nullable();
            $table->integer('lulusan_kursus')->nullable();
            $table->integer('tidak_lulus_sekolah')->nullable();
            $table->integer('tidak_sekolah')->nullable();
            $table->decimal('pendapatan_desa', 15, 2)->nullable();
            $table->decimal('pendapatan_asli_desa', 15, 2)->nullable();
            $table->decimal('pungutan', 15, 2)->nullable();
            $table->decimal('hasil_bumdes', 15, 2)->nullable();
            $table->decimal('hibah', 15, 2)->nullable();
            $table->decimal('pendapatan_lainya', 15, 2)->nullable();
            $table->decimal('bantuan_pemerintah', 15, 2)->nullable();
            $table->decimal('bantuan_provinsi', 15, 2)->nullable();
            $table->decimal('bantuan_kota', 15, 2)->nullable();
            $table->decimal('bantuan_lain_tidak_mengikat', 15, 2)->nullable();
            $table->decimal('silpa', 15, 2)->nullable();
            $table->decimal('dana_cadangan', 15, 2)->nullable();
            $table->decimal('belanja_rutin', 15, 2)->nullable();
            $table->decimal('belanja_tidak_rutin', 15, 2)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
};
