   <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="{{ url('/dashboard') }}" aria-expanded="false">
                            <i class="fa-solid fa-gauge"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>


                    <li class="nav-label">Manajemen Akun</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                         <i class="fa-solid fa-users"></i><span class="nav-text">Akun PPDB</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/akun-ppdb') }}">Data Akun PPDB</a></li>
                            <li><a href="{{ url('/akun-ppdb/create') }}">Tambah Akun PPDB</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-users-gear"></i></i><span class="nav-text">Data Akun Panitia PPDB</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('user') }}">Data Akun Panitia PPDB</a></li>
                            <!-- <li><a href="{{ route('user.create') }}">Tambah Akun Panitia PPDB</a></li> -->
                        </ul>
                    </li>
                   
                    <li class="nav-label">Data PPDB</li>
                        <li>
                        <a href="widgets.html" aria-expanded="false">
                         <i class="fa-solid fa-list"></i><span class="nav-text">Lihat Data PPDB</span>
                        </a>
                    </li>
                    <li class="nav-label">Ekspor Data</li>
                        <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="fa-solid fa-download"></i><span class="nav-text">Ekspor Data Siswa</span>
                        </a>
                    </li>
                 
                <li class="nav-label">Setting</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-address-book"></i><span class="nav-text">Contact Person</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/contact-person') }}">Data Contact Person</a></li>
                            <li><a href="{{ url('/contact-person/create') }}">Tambah Contact Person</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                          <i class="fa-solid fa-address-card"></i><span class="nav-text">My Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                           <i class="fa-solid fa-circle-info"></i><span class="nav-text">Tentang</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                           <i class="fa-solid fa-right-from-bracket"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>



                    
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->