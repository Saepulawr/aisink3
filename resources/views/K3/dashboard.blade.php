@php
    $digit = 4;
    $date = \Carbon\Carbon::parse(now())->format('d-m-Y');
    $year = \Carbon\Carbon::parse(now())->format('Y');
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Papan Informasi K3</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body,
        html {
            width: 100vw;
            height: 100vh;
            background-color: #f8f5d7;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
        }

        .container {
            width: 100vw;
            height: 100vh;
            max-width: 3840px;
            max-height: 2160px;
            padding: 30px;
            border: 4px solid black;
            background-color: transparent;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transform-origin: center;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .header img {
            width: 12vw;
            height: auto;
        }

        h1 {
            text-align: center;
            font-size: 3vw;
            font-weight: bold;
        }

        .info {
            display: flex;
            justify-content: space-between;
            font-size: 2vw;
            width: 100%;
            margin: 20px 0;
        }

        .bold {
            font-weight: bold;
        }

        .box {
            background-color: black;
            color: red;
            padding: 10px 20px;
            display: inline-block;
            font-weight: bold;
            border-radius: 10px;
            text-align: center;
            min-width: 80px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 3px solid black;
            padding: 20px;
            text-align: center;
            font-size: 2vw;
        }

        th {
            background-color: #ddd;
        }

        .section-title {
            font-size: 2.5vw;
            font-weight: bold;
            margin: 40px 0 20px;
            text-align: center;
        }

        .running-text {
            background-color: black;
            color: red;
            font-size: 2.5vw;
            font-weight: bold;
            padding: 50px 0;
            margin-top: 40px;
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
        }

        .running-text span {
            display: inline-block;
            position: absolute;
            left: 100%;
            animation: marquee 12s linear infinite;
        }

        @keyframes marquee {
            from {
                left: 100%;
            }

            to {
                left: -100%;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <!-- HEADER -->
            <div class="header">
                <img src="assets/logo.png" alt="AISIN Logo" />
                <h1>PAPAN INFORMASI<br />KESELAMATAN DAN KESEHATAN KERJA</h1>
                <img src="assets/logo-k3.png" alt="Safety Logo" />
            </div>

            <!-- INFO UTAMA -->
            <div class="info">
                <span class="bold">DATE : <span class="box" id="date">{{ $date }}</span></span>
                <span class="bold">ACCIDENT INFORMATION FY : <span class="box"
                        id="year">{{ $year }}</span></span>
            </div>

            <!-- TABEL KECELAKAAN -->
            <table>
                <tr>
                    <td class="bold">LABOUR ACCIDENT</td>
                    <td><span class="box"
                            id="labour_accident">{{ sprintf('%0' . $digit . 'd', $data->labour_accident) }}</span> CASE
                    </td>
                    <td class="bold">NEAR MISS</td>
                    <td><span class="box" id="near_miss">{{ sprintf('%0' . $digit . 'd', $data->near_miss) }}</span>
                        CASE
                    </td>
                </tr>
                <tr>
                    <td class="bold">SMALL ACCIDENT</td>
                    <td><span class="box"
                            id="small_accident">{{ sprintf('%0' . $digit . 'd', $data->small_accident) }}</span> CASE
                    </td>
                    <td class="bold">PAK</td>
                    <td><span class="box" id="pak">{{ sprintf('%0' . $digit . 'd', $data->pak) }}</span> CASE
                    </td>
                </tr>
                <tr>
                    <td class="bold">TRAFFIC ACCIDENT</td>
                    <td><span class="box"
                            id="traffic_accident">{{ sprintf('%0' . $digit . 'd', $data->traffic_accident) }}</span>
                        CASE
                    </td>
                    <td colspan="2"></td>
                </tr>
            </table>

            <!-- SAFE MAN HOURS -->
            <div class="section-title">SAFE MAN HOURS</div>
            <table>
                <tr>
                    <td class="bold">JUMLAH PEKERJA BULAN INI</td>
                    <td><span class="box"
                            id="jumlah_pekerja">{{ sprintf('%0' . $digit . 'd', $data->jumlah_pekerja) }}</span> MP</td>
                </tr>
                <tr>
                    <td class="bold">JUMLAH JAM KERJA AMAN TANPA KECELAKAAN (LTA)</td>
                    <td><span class="box"
                            id="jam_kerja_aman">{{ sprintf('%0' . $digit . 'd', $data->jam_kerja_aman) }}</span> JAM
                    </td>
                </tr>
                <tr>
                    <td class="bold">JUMLAH HARI KERJA AMAN TANPA KECELAKAAN (LTA)</td>
                    <td><span class="box"
                            id="hari_kerja_aman">{{ sprintf('%0' . $digit . 'd', $data->hari_kerja_aman) }}</span> HARI
                    </td>
                </tr>
            </table>

            <!-- RUNNING TEXT -->
            <div class="running-text">
                <span id="running_text">{{ $data->running_text }}</span>
            </div>
        </div>
    </div>
</body>

<script>
    // setTimeout(() => {
    //     window.location.assign("kebijakan.html");
    // }, 20000);
</script>
<script>
    function adjustScale() {
        const container = document.querySelector('.container');
        const wrapper = document.querySelector('.wrapper');

        let scaleX = window.innerWidth / container.offsetWidth;
        let scaleY = window.innerHeight / container.offsetHeight;
        let scaleFactor = Math.min(scaleX, scaleY);

        container.style.transform = `scale(${scaleFactor})`;
    }

    window.addEventListener('resize', adjustScale);
    window.addEventListener('load', adjustScale);
</script>

<script>
    function fetchData() {
        fetch('/api/k3')
            .then(response => response.json())
            .then(data => {
                document.getElementById("date").innerText = data.date_formated;
                document.getElementById("year").innerText = data.year;
                document.getElementById("labour_accident").innerText = data.labour_accident.toString().padStart(4,
                    '0');
                document.getElementById("small_accident").innerText = data.small_accident.toString().padStart(4,
                    '0');
                document.getElementById("traffic_accident").innerText = data.traffic_accident.toString().padStart(4,
                    '0');
                document.getElementById("near_miss").innerText = data.near_miss.toString().padStart(4, '0');
                document.getElementById("pak").innerText = data.pak.toString().padStart(4, '0');
                document.getElementById("jumlah_pekerja").innerText = data.jumlah_pekerja.toString().padStart(4,
                    '0');
                document.getElementById("jam_kerja_aman").innerText = data.jam_kerja_aman.toString().padStart(4,
                    '0');
                document.getElementById("hari_kerja_aman").innerText = data.hari_kerja_aman.toString().padStart(4,
                    '0');
                document.getElementById("running_text").innerText = data.running_text;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    setInterval(fetchData, 1000); // Ambil data setiap 1 detik
</script>

<script>
    setTimeout(() => {
        window.location.assign("{{ route('kebijakan') }}");
    }, 20000); // 20 detik
</script>

</html>
