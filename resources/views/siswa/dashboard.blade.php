@extends('layout.main_siswa')

@section('title', 'Pendaftaran Siswa SPMB SMP Plus Al-Qodiri Jember')

@section('content')
 <div class="container mt-5 mb-5 py-5">
      <div class="card">
        <div class="card-body">
          <h1 class="text-center fw-bold">Formulir Pendaftaran PPDB SMP Plus Al-Qodiri Jember</h1>
          <hr />

          <style>
            .wizard-step {
              display: none;
            }
            .wizard-step.active {
              display: block;
            }
          </style>

          <div class="progress mb-4">
            <div class="progress-bar" role="progressbar" style="width: 20%" id="progressBar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <form id="wizardForm">
            <div class="wizard-step active" id="step1">
              <h5>Step 1: Kelas Masuk dan Domisili</h5>

              <div class="mb-3">
                <label for="name" class="form-label">Kelas Masuk</label>
                <select class="form-select" name="kelas_masuk" id="kelas_masuk" aria-label="Default select example">
                  <option selected>Pilih Kelas Masuk</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="birthplace" class="form-label">Status Domisili</label>
                <select class="form-select" name="status_domisili" id="status_domisili" aria-label="Default select example">
                  <option selected>Pilih Domisili</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <button type="button" class="btn btn-primary next">Next</button>
            </div>

            <div class="wizard-step" id="step2">
              <h5>Step 2: Identitas Siswa</h5>
              <div class="mb-3">
                <label for="name" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" required />
              </div>
              <div class="mb-3">
                <label for="city" class="form-label">NISN</label>
                <input type="text" class="form-control" name="nisn" id="nisn" required />
              </div>
              <div class="mb-3">
                <label for="province" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required />
              </div>
              <div class="mb-3">
                <label for="province" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required />
              </div>
              <div class="mb-3">
                <label for="birthplace" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" aria-label="Default select example" required>
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="province" class="form-label">Status Anak</label>
                <select class="form-select" name="status_anak" id="status_anak" aria-label="Default select example" required>
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="province" class="form-label">Agama</label>
                <select class="form-select" name="agama" id="agama" aria-label="Default select example" required>
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="province" class="form-label">No. Telp/HP</label>
                <input type="number" class="form-control" name="no_telp" id="no_telp" required />
              </div>
              <div class="mb-3">
                <label for="province" class="form-label">Golongan Darah</label>
                <select class="form-select" name="golda" id="golda" aria-label="Default select example" required>
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="province" class="form-label">Penyakit yang pernah diderita</label>
                <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required />
              </div>

              <button type="button" class="btn btn-secondary prev">Previous</button>
              <button type="button" class="btn btn-primary next">Next</button>
            </div>

            <div class="wizard-step" id="step3">
              <h5>Step 3: Alamat</h5>
              <div class="mb-3">
                <label for="school" class="form-label">Provinsi</label>
                <select class="form-select" name="golda" id="golda" aria-label="Default select example" required>
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="npsn" class="form-label">Kabupaten/Kota</label>
                <select class="form-select" name="golda" id="golda" aria-label="Default select example" required>
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="npsn" class="form-label">Kecamatan</label>
                <select class="form-select" name="golda" id="golda" aria-label="Default select example" required>
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="npsn" class="form-label">Desa/Kelurahan</label>
                <select class="form-select" name="golda" id="golda" aria-label="Default select example" required>
                  <option selected>Pilih Jenis Kelamin</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="npsn" class="form-label">Kode Pos</label>
                <input type="text" class="form-control" id="npsn" required />
              </div>
              <!-- <div class="mb-3">
                <label for="achievement" class="form-label">Kecamatan</label>
                <textarea class="form-control" id="achievement" rows="3"></textarea>
              </div> -->
              <button type="button" class="btn btn-secondary prev">Previous</button>
              <button type="button" class="btn btn-primary next">Next</button>
            </div>
            <div class="wizard-step" id="step4">
              <h5>Step 3: Riwayat Pendidikan</h5>
              <div class="mb-3">
                <label for="npsn" class="form-label">NPSN Sekolah Asal</label>
                <div class="row">
                  <div class="col-9"><input type="text" class="form-control" id="npsn" required /></div>
                  <div class="col"><button type="button" class="btn btn-primary" data-mdb-ripple-init>Cari</button></div>
                </div>
              </div>
              <div class="mb-3">
                <label for="school" class="form-label">Nama Sekolah Asal</label>
                <input type="text" class="form-control" id="school" required />
              </div>
              <div class="mb-3">
                <label for="school" class="form-label">Jenis Sekolah Asal</label>
                <input type="text" class="form-control" id="school" required />
              </div>
              <div class="mb-3">
                <label for="school" class="form-label">Alamat Sekolah Asal</label>

                <input type="text" class="form-control" id="school" required />
                <input type="text" class="form-control" id="school" required />
                <input type="text" class="form-control" id="school" required />
              </div>
              <div class="mb-3">
                <label for="achievement" class="form-label">Prestasi yang Pernah Diraih</label>
                <textarea class="form-control" id="achievement" rows="3"></textarea>
              </div>
              <button type="button" class="btn btn-secondary prev">Previous</button>
              <button type="button" class="btn btn-primary next">Next</button>
            </div>

            <div class="wizard-step" id="step5">
              <h5>Step 4: Identitas Orang Tua</h5>
              <div class="mb-3">
                <label for="father_name" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" id="father_name" required />
              </div>
              <div class="mb-3">
                <label for="mother_name" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="mother_name" required />
              </div>
              <div class="mb-3">
                <label for="income" class="form-label">Penghasilan Per Bulan</label>
                <input type="text" class="form-control" id="income" required />
              </div>
              <button type="button" class="btn btn-secondary prev">Previous</button>
              <button type="button" class="btn btn-primary next">Next</button>
            </div>

            <div class="wizard-step" id="step6">
              <h5>Step 5: Review & Submit</h5>
              <p>Periksa kembali data Anda sebelum mengirim.</p>
              <button type="button" class="btn btn-secondary prev">Previous</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function () {
        let currentStep = 1;
        const totalSteps = 6;

        function showStep(step) {
          $(".wizard-step").removeClass("active");
          $("#step" + step).addClass("active");
          updateProgressBar(step);
        }

        function updateProgressBar(step) {
          const progressPercentage = (step / totalSteps) * 100;
          $("#progressBar")
            .css("width", progressPercentage + "%")
            .attr("aria-valuenow", progressPercentage);
        }

        function validateStep(step) {
          let isValid = true;
          $("#step" + step + " input, #step" + step + " textarea").each(function () {
            if ($(this).val() === "") {
              isValid = false;
              $(this).addClass("is-invalid");
            } else {
              $(this).removeClass("is-invalid");
            }
          });
          return isValid;
        }

        $(".next").click(function () {
          if (validateStep(currentStep)) {
            if (currentStep < totalSteps) {
              currentStep++;
              showStep(currentStep);
            }
          } else {
            alert("Harap lengkapi semua field sebelum melanjutkan.");
          }
        });

        $(".prev").click(function () {
          if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
          }
        });

        $("#wizardForm").submit(function (e) {
          e.preventDefault();
          alert("Form berhasil dikirim!");
        });
      });
    </script>
  </body>
</html>





@endsection
