<h2>Halo {{ $nama }},</h2>

<p>Berikut adalah QR Code undangan kamu. Simpan dan tunjukkan saat hadir.</p>

<p><strong>Kode Undangan:</strong> {{ $code }}</p>

<img src="{{ $message->embed(storage_path('app/public/' . $qrPath)) }}" alt="QR Code" width="200">

<p>Terima kasih!</p>
