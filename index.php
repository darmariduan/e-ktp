<?php
$nik = '';
if (isset($_POST['nik'])) {
    $nik = trim($_POST['nik']);
}

function bulan($i)
{
    $i = intval($i) - 1;
    $data = array(
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    if (isset($data[$i])) {
        return trim($data[$i]);
    }
    return '<span class="error">Invalid</span>';
}

function kode_kecamatan($i)
{
    $i = intval($i);
    $data = array(
        01 => 'Madang beras',
        02 => 'Air Putih',
        03 => 'Lima Puluh',
        04 => 'Tanjung Tiram',
        05 => 'Talawi',
        06 => 'Sei Suka',
        07 => 'Sei Balai',
        08 => 'Meranti',
        09 => 'Air Joman',
        10 => 'Tanjung Balai',
        11 => 'Sei Kepayang',
        12 => 'Simapng Empat',
        13 => 'AIr Batu',
        14 => 'Pulau Rakyat',
        15 => 'Bandar Pulau',
        16 => 'Buntu Pane',
        17 => 'Bandar Pasir Mandoge',
        18 => 'Aek Kuasan',
        19 => 'Kota Kisaran Barat',
        20 => 'Kota Kisaran Timur',
        21 => 'Aek Songsongan',
        22 => 'Rahhuning',
        23 => 'Sei Dadap',
        24 => 'Sei Kepayang Barat',
        25 => 'Sei Kepayang Timur',
        26 => 'Tinggi Raja',
        27 => 'Setia Janji',
        28 => 'Silau Laut',
        29 => 'Rawang Panca Arga',
        30 => 'Pulo Bandring',
        31 => 'Teluk Dalam',
        32 => 'Aek Ledong'


    );
    if (isset($data[$i])) {
        return trim($data[$i]);
    }
    return '<span class="error">Invalid</span>';
}

function kode_kabupaten($i)
{
    $i = intval($i);
    $data = array(
        1209 => 'Asahan'
    );
    if (isset($data[$i])) {
        return trim($data[$i]);
    }
    return '<span class="error">Invalid</span>';
}

function kode_provinsi($i)
{
    $i = intval($i);
    $data = array(

        12 => 'Sumatera Utara'
    );
    if (isset($data[$i])) {
        return trim($data[$i]);
    }
    return '<span class="error">Invalid</span>';
}
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8" />
    <title>::..Cek Data NIK Kabupaten Asahan..::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Aplikasi untuk pengecekan NIK Kabupaten Asahan melalui API Disdukcapil">
    <meta name="author" content="Darma Riduan">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/font-awesome.min.css" />
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-20936964-25', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102493637-7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-102493637-7');
    </script>
    <script type="text/javascript" src="assets/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>Cek Data NIK <small>Kabupaten Asahan</small></h1>
        </div>
        <!-- Registration form - START -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form method="post">
                        <input type="hidden" name="go" value="1" />
                        <div class="form-group">
                            <label for="InputName">Masukkan NIK</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nik" value="<?php echo htmlentities($nik); ?>" />

                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                        <input type="submit" name="submit" id="submit" value=" Cek " class="btn btn-info pull-right">


                </div>
                </form>

                <?php
                if (isset($_POST['go'])) {
                    if (strlen($nik) != 16) {
                        echo '<div class="error">Panjang NIK harus 16 angka. Input Anda = ' . strlen($nik) . ' angka.</div>';
                    } else {
                        $data = array();
                        $data['provinsi'] = substr($nik, 0, 2);
                        // $data['kota'] = substr($nik, 2, 2);
                        $data['kecamatan'] = substr($nik, 4, 2);
                        $data['kabupaten'] = substr($nik, 0, 4);
                        $data['tanggal_lahir'] = substr($nik, 6, 2);
                        $data['bulan_lahir'] = substr($nik, 8, 2);
                        $data['tahun_lahir'] = substr($nik, 10, 2);
                        $data['unik'] = substr($nik, 12, 4);
                        if (intval($data['tanggal_lahir']) > 40) {
                            $data['tanggal_lahir_2'] = intval($data['tanggal_lahir']) - 40;
                            $gender = 'Wanita';
                        } else {
                            $data['tanggal_lahir_2'] = intval($data['tanggal_lahir']);
                            $gender = 'Pria';
                        }
                        // echo '<pre>';
                        // print_r($data);
                        // echo '</pre>';
                        ?>

                        <table border="0" cellpadding="5" cellspacing="0">
                            <tr>
                                <th>Angka&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th>Kode&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th>Arti&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $data['provinsi']; ?>
                                </td>
                                <td>
                                    Provinsi
                                </td>
                                <td>
                                    <?php echo kode_provinsi($data['provinsi']); ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td>
                                    <?php echo $data['kabupaten']; ?>
                                </td>
                                <td>
                                    Kabupaten
                                </td>
                                <td>
                                    <?php echo kode_kabupaten($data['kabupaten']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $data['kecamatan']; ?>
                                </td>
                                <td>
                                    Kecamatan
                                </td>
                                <td>
                                    <?php echo kode_kecamatan($data['kecamatan']); ?>
                                </td>
                            </tr>
                            <tr valign="top">
                                <td>
                                    <?php echo $data['tanggal_lahir']; ?>
                                </td>
                                <td>
                                    Tanggal Lahir
                                </td>
                                <td>
                                    <?php echo $data['tanggal_lahir_2']; ?>
                                    <br />
                                    <span style="font-weight:900;color:#00F"><?php echo $gender; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $data['bulan_lahir']; ?>
                                </td>
                                <td>
                                    Bulan Lahir
                                </td>
                                <td>
                                    <?php echo bulan($data['bulan_lahir']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $data['tahun_lahir']; ?>
                                </td>
                                <td>
                                    Tahun Lahir
                                </td>
                                <td>
                                    <?php echo $data['tahun_lahir']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $data['unik']; ?>
                                </td>
                                <td>
                                    Nomor Urut
                                </td>
                                <td>
                                    <?php echo $data['unik']; ?>
                                </td>
                            </tr>
                        </table>
                    <?php
                }
            }
            ?>
</body>
<br /><br />
<font color="#999999"><small>Copyright &copy; 2019 Kominfo - Disdukcapil. All rights reserverd.</small></font>
</div>
<!-- Registration form - END -->
</div>
</body>

</html>