<?php

session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-slate-950 text-white min-h-screen">

<div class="max-w-5xl mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-8 border-b border-slate-700 pb-6">
        <h1 class="text-3xl font-semibold">Input Form Mahasiswa</h1>
        <a href="proses.php?clear=1" onclick="return confirm('Hapus semua data?')" 
           class="flex items-center gap-2 px-5 py-2.5 bg-red-600 hover:bg-red-700 rounded-lg text-sm font-medium">
            <i class="fa-solid fa-trash"></i>
            Hapus Semua
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Form -->
        <div class="lg:col-span-5 bg-slate-900 border border-slate-700 rounded-xl p-7">
            <h2 class="text-xl font-medium mb-6">Silahkan isi data</h2>
            <form action="proses.php" method="POST" class="space-y-5">
                <div>
                    <label class="block text-slate-400 text-sm mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" required class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-slate-400 text-sm mb-1">NIM</label>
                    <input type="text" name="nim" required class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-slate-400 text-sm mb-1">Nomor HP</label>
                    <input type="tel" name="nohp" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500">
                </div>
                <div>
                    <label class="block text-slate-400 text-sm mb-1">Alamat</label>
                    <textarea name="alamat" rows="3" class="w-full bg-slate-800 border border-slate-600 rounded-lg px-4 py-3 focus:outline-none focus:border-blue-500 resize-none"></textarea>
                </div>
                <button type="submit" name="submit" class="w-full bg-blue-600 hover:bg-blue-700 py-4 rounded-lg font-medium text-lg">Kirim Data</button>
            </form>
        </div>

        <!-- Output -->
        <div class="lg:col-span-7 bg-slate-900 border border-slate-700 rounded-xl p-7">
            <h2 class="text-xl font-medium mb-6 flex justify-between">Data yang sudah diinput
                <span class="text-emerald-400 text-sm font-normal pt-1">
                    <?= count($_SESSION['data_mahasiswa'] ?? []) ?> data
                </span>
            </h2>
            <?php if (empty($_SESSION['data_mahasiswa'])): ?>
                <div class="text-center py-16 text-slate-400">
                    Belum ada data<br>
                </div>
            <?php else: ?>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-slate-700 text-slate-400">
                                <th class="py-4 text-left">No</th>
                                <th class="py-4 text-left">Nama</th>
                                <th class="py-4 text-left">NIM</th>
                                <th class="py-4 text-left">No Telepon</th>
                                <th class="py-4 text-left">Alamat</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-700">
                            <?php foreach ($_SESSION['data_mahasiswa'] as $i => $d):?>
                            <tr>
                                <td class="py-4"><?= $i + 1 ?></td>
                                <td class="py-4"><?= $d['nama'] ?></td>
                                <td class="py-4"><?= $d['nim'] ?></td>
                                <td class="py-4"><?= $d['nohp'] ?></td>
                                <td class="py-4"><?= $d['alamat'] ?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                        
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
</body>
</html>