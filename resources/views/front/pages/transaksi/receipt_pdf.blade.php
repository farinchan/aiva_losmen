<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Reservasi Hotel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* background-color: #f9f9f9; */
        }
        .container {
            /* width: 80%; */
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #2c3e50;
            color: #ffffff;
            /* height: 130px; */
            padding: 40px 20px 40px 20px;
            border-radius: 10px 10px 0 0;
            display: flex;
            align-items: center;
        }
        .header img {
            width: 60px;
            margin-right: 20px;
        }
        .header h1 {
            font-size: 32px;
            margin: 0;
        }
        .header p {
            margin: 5px 0 0;
        }
        .content {
            margin: 20px 0;
        }
        .content h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 16px;
            color: #555;
        }
        .reservation-details, .payment-status {
            margin-bottom: 20px;
        }
        .reservation-details h3, .payment-status h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            padding-top: 20px;
        }
        .total h3 {
            color: #333;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #777;
            font-size: 14px;
        }
        .footer p {
            margin: 5px 0;
        }
        .payment-status span {
            font-weight: bold;
            color: #e74c3c; /* Warna merah untuk pembayaran tertunda */
        }
        .paid-status span {
            color: #2ecc71; /* Warna hijau untuk pembayaran lunas */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        {{-- <img src="{{public_path('front/images/aiva_losmen_logo_dark.png')}}
        " alt="Logo Hotel"> --}}
        <div>
            <h1>Aiva Losmen</h1>
            <p>Kenyamanan Anda, Prioritas Kami</p>
        </div>
    </div>

    <div class="content">
        <h2>Invoice Reservasi </h2>
        <p>Kepada Yth. Bapak/Ibu {{$user->pelanggan->nama}},</p>
        <p>Terima kasih telah memilih Hotel BintangMewah sebagai tempat menginap Anda. Berikut adalah rincian invoice untuk reservasi yang telah Anda lakukan. Jika ada pertanyaan terkait invoice ini, jangan ragu untuk menghubungi kami.</p>

        <!-- Detail Reservasi -->
        <div class="reservation-details">
            {{-- <h3>Detail Reservasi</h3> --}}
            <p>Reservasi Untuk tanggal: {{ \Carbon\Carbon::parse($transaksi->check_in)->format('d F Y') }} - {{ \Carbon\Carbon::parse($transaksi->check_out)->format('d F Y') }}</p>
        </div>

        <!-- Status Pembayaran -->
        <div class="payment-status">
            <h3>Status Kamar:</h3>
            <p><span class="paid-status">
                {{ $transaksi->status }}
                </span></p>
            <!-- Jika belum lunas, ganti dengan: <p><span class="pending-status">Belum Lunas</span></p> -->
        </div>

        <table>
            <tr>
                <th>kamar</th>
                <th>Total Malam</th>
                <th>Harga/malam</th>
            </tr>
            <tr>
                <td>
                    {{ $transaksi->kamar->tipe->nama }} - {{ $transaksi->kamar->nomor_kamar }}
                </td>
                <td>{{ $transaksi->total_hari }} Hari</td>
                <td>@money( $transaksi->kamar->harga )</td>
            </tr>
        </table>

        <div class="total">
            <h3>Total Biaya: @money( $transaksi->total_pembayaran )</h3>
        </div>

        <div>
            <h3>Metode Pembayaran:</h3>
            <p>Transfer Bank</p>
            <p>Bank: {{ $transaksi->metodePembayaran->bank }} <br>
            {{ $transaksi->metodePembayaran->no_rek }} a/n {{ $transaksi->metodePembayaran->nama_rek }}

            </p>
        </div>
    </div>

    <div class="footer">
        <p>Aiva Losmen</p>
        <p>Jl. Nasional, Rundeng, Kec. Johan Pahlawan, Kabupaten Aceh Barat, Aceh 23681</p>
        <p>Telepon: (0655) 7551771 | Email: info@aivalosmen.com</p>
    </div>
</div>

</body>
</html>
