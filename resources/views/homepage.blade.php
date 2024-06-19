<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;1,500&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>MediStay</title>
</head>

<body>
    <div class="homepage" id="homepage">
        <header class="navbar">
            <a class="medistay1" href="/">MediStay</a>
            <nav class="navbar-inner">
                @if(Auth::guard('admin_hospital')->check())
                <div class="dropdown">
                    <a class="dropbtn">Halo, {{ Auth::guard('admin_hospital')->user()->username }}!</a>
                    <div class="dropdown-content">
                        <a href="#" class="log-out">Logout</a>
                    </div>
                </div>
                @endif
            </nav>
        </header>
        <section class="rectangle-group">
            <div class="frame-item"></div>
            <div class="group3"></div>
            <h1 class="find-your-healing">
                Find Your Healing Space: Real-Time Hospital Room Availability
            </h1>
            <i class="medistay-provides-up-to-date">MediStay provides up-to-date information on room availability across
                multiple hospitals. Access real-time data, compare options, and make
                informed decisions for your health and well-being.</i>
            <img src="{{ asset('image/Hospital.png') }}" alt="Hospital" class="hospital-image">
        </section>

        <section class="homepage-inner">
            <div class="rectangle-container">
                <div class="frame-inner"></div>
                <div class="cek-ketersediaan-kamar-wrapper">
                    <h1 class="cek-ketersediaan-kamar">Cek Ketersediaan Kamar</h1>
                </div>
                <div class="frame-parent1">
                    <div class="group-div">
                        <div class="rectangle-div"></div>
                        <select id="hospitalDropdown" class="input-rumah-sakit" name="hospital_id" placeholder="Pilih Rumah Sakit">
                            <option value="">Pilih Rumah Sakit</option>
                            @foreach(\App\Models\Hospital::all() as $hospital)
                            <option value="{{ $hospital->id }}">{{ $hospital->nama_rumah_sakit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button id="cekButton" class="group-button">
                        <div class="frame-child1"></div>
                        <b class="cek">Cek</b>
                    </button>
                </div>
            </div>
        </section>

        <section class="informasi-ketersediaan-kamar-wrapper">
            <h2 class="informasi-ketersediaan-kamar">
                INFORMASI KETERSEDIAAN KAMAR
            </h2>
        </section>

        <section id="resultSection" class="homepage-child">
            <div class="frame-parent2">
                <div class="frame-wrapper1">
                    <div class="frame-parent3">
                        <div class="status-parent">
                            <h2 class="status">Status</h2>
                            <h2 class="filter">Filter</h2>
                        </div>
                        <div class="frame-wrapper2">
                            <div class="frame-parent4">
                                <div class="frame-wrapper3">
                                    <div class="frame-parent5">
                                        <div class="bed-parent">
                                            <img class="bed-icon" loading="lazy" alt="" src="./image/bed.svg" />
                                            <div class="tempat-tidur-terpakai">Tempat Tidur Terpakai</div>
                                            <div class="wrapper">
                                                <b class="b"></b>
                                            </div>
                                        </div>
                                        <div class="bed-group">
                                            <img class="bed-icon1" loading="lazy" alt="" src="./image/bed.svg" />
                                            <div class="tempat-tidur-kosong">Tempat Tidur Kosong</div>
                                            <div class="container">
                                                <b class="b1"></b>
                                            </div>
                                        </div>
                                        <div class="bed-container">
                                            <img class="bed-icon2" loading="lazy" alt="" src="./image/bed.svg" />
                                            <div class="total-tempat-tidur">Total Tempat Tidur</div>
                                            <div class="frame">
                                                <b class="b2"></b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="frame-parent6">
                                    <div class="frame-wrapper4">
                                        <div class="frame-parent7">
                                            <div class="kelas-wrapper">
                                                <b class="kelas">Kelas:</b>
                                            </div>
                                            <b class="spesialisasi">Spesialisasi:</b>
                                            <b class="usia">Usia:</b>
                                        </div>
                                    </div>
                                    <form class="frame-parent8">
                                        <div class="frame-parent9">
                                            <div class="kelas-wrapper">
                                                <select id="kelasDropdown" class="dropdown-select">
                                                    <option value="">Pilih Kelas</option>
                                                </select>
                                            </div>
                                            <div class="spesialisasi-wrapper">
                                                <select id="spesialisasiDropdown" class="dropdown-select">
                                                    <option value="">Pilih Spesialisasi</option>
                                                </select>
                                            </div>
                                            <div class="usia-wrapper">
                                                <select id="usiaDropdown" class="dropdown-select">
                                                    <option value="">Pilih Usia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" class="ggsearch-parent">
                                            <img class="ggsearch-icon" alt="" src="./image/gg_search.svg" />
                                            <div class="cari">Cari</div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="frame-parent10">
                    <div class="kelas-parent">
                        <b class="kelas1">KELAS</b>
                        <b class="spesialis">SPESIALIS</b>
                        <b class="usia1">USIA</b>
                        <b class="jenis-kelamin">TERISI</b>
                        <b class="jenis-kelamin">KOSONG</b>
                    </div>
                    <div id="filteredDataContainer">
                        <!-- Data tabel akan diisi melalui JavaScript -->
                    </div>
                </div>

            </div>
        </section>



        <footer class="footer">
            <div class="footer-bg"></div>
            <div class="zerowaste-parent">
                <h1 class="zerowaste">
                    <span>Medi</span>
                    <span class="stay1">Stay</span>
                </h1>
                <div class="frame-parent16">
                    <div class="categories-parent">
                        <b class="categories">CATEGORIES</b>
                        <div class="organic-waste">Organic Waste</div>
                        <div class="inorganic-waste">Inorganic Waste</div>
                        <div class="b3-waste">B3 Waste</div>
                    </div>
                    <div class="about-parent">
                        <b class="about">ABOUT</b>
                        <div class="our-values">Our Values</div>
                        <div class="our-mission">Our Mission</div>
                    </div>
                    <div class="contact-parent">
                        <b class="contact">CONTACT</b>
                        <div class="email">Email :</div>
                        <div class="zerowasteexamplecom">medistay@gmail.com</div>
                    </div>
                </div>
            </div>
            <b class="make-a-difference">Healthcare for All</b>
            <div class="follow-us-parent">
                <b class="follow-us">FOLLOW US</b>
                <div class="youtubelogo-parent">
                    <img class="youtubelogo-icon" loading="lazy" alt="" src="./image/youtubelogo.svg" />
                    <img class="instagramlogo-icon" loading="lazy" alt="" src="./image/instagramlogo.svg" />
                    <img class="facebooklogo-icon" loading="lazy" alt="" src="./image/facebooklogo.svg" />
                </div>
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hospitalDropdown = document.getElementById('hospitalDropdown');
            const cekButton = document.getElementById('cekButton');
            const logoutLink = document.querySelector('.log-out');
            const kelasDropdown = document.getElementById('kelasDropdown');
            const spesialisasiDropdown = document.getElementById('spesialisasiDropdown');
            const usiaDropdown = document.getElementById('usiaDropdown');
            const filteredDataContainer = document.getElementById('filteredDataContainer');
            const searchButton = document.querySelector('.ggsearch-parent');
            let fetchedData = {};

            // Event listener for logout
            if (logoutLink) {
                logoutLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You will be logged out!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, logout!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch("{{ route('logout') }}", {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({})
                            }).then(response => {
                                if (response.ok) {
                                    Swal.fire(
                                        'Logged out!',
                                        'You have been logged out.',
                                        'success'
                                    ).then(() => {
                                        window.location.href = "{{ route('login') }}";
                                    });
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'There was a problem logging you out.',
                                        'error'
                                    );
                                }
                            }).catch(error => {
                                Swal.fire(
                                    'Error!',
                                    'There was a problem logging you out.',
                                    'error'
                                );
                            });
                        }
                    });
                });
            }

            // Event listener for Cek button
            if (cekButton && hospitalDropdown) {
                cekButton.addEventListener('click', function() {
                    const hospitalId = hospitalDropdown.value;
                    if (!hospitalId) {
                        alert('Pilih Rumah Sakit terlebih dahulu!');
                        return;
                    }

                    fetch(`/getHospitalData/${hospitalId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok ' + response.statusText);
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Data received:', data);
                            fetchedData = data;
                            displayHospitalData(data);
                            return data;
                        })
                        .then(() => {
                            // Setelah mendapatkan data rumah sakit, ambil data kamar
                            fetchRoomsByHospital(hospitalId);
                        })
                        .catch(error => {
                            console.error('Error fetching hospital data:', error);
                            alert('Maaf, terjadi kesalahan dalam memuat data kamar rumah sakit. Silakan coba lagi.');
                        });

                    fetch(`/getDropdownData/${hospitalId}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(dropdownData => {
                            console.log('Dropdown data received:', dropdownData);
                            populateDropdowns(dropdownData);
                        })
                        .catch(error => {
                            console.error('Error fetching dropdown data:', error);
                            alert('Maaf, terjadi kesalahan dalam memuat data dropdown. Silakan coba lagi.');
                        });

                });
            }

            // Event listener for Search button
            if (searchButton) {
                searchButton.addEventListener('click', function(event) {
                    event.preventDefault();

                    const hospitalId = hospitalDropdown.value;
                    if (!hospitalId) {
                        alert('Pilih Rumah Sakit terlebih dahulu!');
                        return;
                    }

                    fetchRoomsByHospital(hospitalId);
                });
            }

            function displayHospitalData(data) {
                const bedUsed = document.querySelector('.b');
                const bedEmpty = document.querySelector('.b1');
                const bedTotal = document.querySelector('.b2');

                if (bedUsed) {
                    bedUsed.textContent = data.terpakai;
                }
                if (bedEmpty) {
                    bedEmpty.textContent = data.kosong;
                }
                if (bedTotal) {
                    bedTotal.textContent = data.total;
                }
            }

            function populateDropdowns(dropdownData) {
                populateDropdown(kelasDropdown, dropdownData.kelas);
                populateDropdown(spesialisasiDropdown, dropdownData.spesialisasi);
                populateDropdown(usiaDropdown, dropdownData.usia);
            }

            function populateDropdown(dropdown, data) {
                dropdown.innerHTML = data.map(item => `<option value="${item}">${item}</option>`).join('');
            }

            function fetchRoomsByHospital(hospitalId) {
                fetch(`/getRoomsByHospital/${hospitalId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        displayRoomsTable(data);
                    })
                    .catch(error => {
                        console.error('Error fetching rooms data:', error);
                        alert('Maaf, terjadi kesalahan dalam memuat data kamar. Silakan coba lagi.');
                    });
            }

            function displayRoomsTable(data) {
                const filteredDataContainer = document.getElementById('filteredDataContainer');
                filteredDataContainer.innerHTML = ''; // Clear previous content

                data.forEach(room => {
                    const row = document.createElement('div');
                    row.classList.add('tabel'); // Adjust to your CSS class

                    // Inner structure
                    const innerWrapper = document.createElement('div');
                    innerWrapper.classList.add('tabel-inner'); // Adjust to your CSS class
                    row.appendChild(innerWrapper);

                    // Frame parent
                    const frameParent = document.createElement('div');
                    frameParent.classList.add('frame-parent15'); // Adjust to your CSS class
                    innerWrapper.appendChild(frameParent);

                    // Kolom 1: Kelas
                    const kelasWrapper = document.createElement('div');
                    kelasWrapper.classList.add('kelas-1-wrapper'); // Adjust to your CSS class
                    frameParent.appendChild(kelasWrapper);

                    const kelasContainer = document.createElement('div');
                    kelasContainer.classList.add('kelas-1'); // Adjust to your CSS class
                    kelasContainer.textContent = room.kelas_kamar;
                    kelasWrapper.appendChild(kelasContainer);

                    // Kolom 2: Spesialisasi
                    const spesialisasiWrapper = document.createElement('div');
                    spesialisasiWrapper.classList.add('ksm-bedah-wrapper'); // Adjust to your CSS class
                    frameParent.appendChild(spesialisasiWrapper);

                    const spesialisasiContainer = document.createElement('div');
                    spesialisasiContainer.classList.add('ksm-bedah'); // Adjust to your CSS class
                    spesialisasiContainer.textContent = room.spesialisasi;
                    spesialisasiWrapper.appendChild(spesialisasiContainer);

                    // Kolom 3: Usia
                    const usiaContainer = document.createElement('div');
                    usiaContainer.classList.add('dewasa'); // Adjust to your CSS class
                    usiaContainer.textContent = room.usia;
                    frameParent.appendChild(usiaContainer);

                    // Kolom 4: Jumlah Kamar Terisi
                    const terisiWrapper = document.createElement('div');
                    terisiWrapper.classList.add('wrapper1'); // Adjust to your CSS class
                    frameParent.appendChild(terisiWrapper);

                    const terisiContainer = document.createElement('div');
                    terisiContainer.classList.add('div3'); // Adjust to your CSS class
                    terisiContainer.textContent = room.jumlah_kamar_terisi;
                    terisiWrapper.appendChild(terisiContainer);

                    // Kolom 5: Jumlah Kamar Kosong
                    const kosongContainer = document.createElement('div');
                    kosongContainer.classList.add('div4'); // Adjust to your CSS class
                    kosongContainer.textContent = room.jumlah_kamar_kosong;
                    frameParent.appendChild(kosongContainer);

                    // Append row to filtered data container
                    filteredDataContainer.appendChild(row);
                });
            }



        });
    </script>
</body>

</html>