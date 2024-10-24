<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Toko Buku</title>
</head>
<body class="bg-light">
    <?php if(Session::has('pesanSimpan')): ?>
        <div class="alert alert-success"><?php echo e(Session::get('pesanSimpan')); ?></div>
    <?php else: ?>
    <?php if(Session::has('pesanHapus')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('pesanHapus')); ?></div>
    <?php else: ?>
        
    <?php endif; ?>
    <?php endif; ?>
    <h1 class="text-center pt-2 pb-3 text-dark fs-2 fw-bold">Daftar Buku yang Tersedia</h1>
    <form action="<?php echo e(route('buku.search')); ?>" method="get">
        <?php echo csrf_field(); ?>
        <div class="input-group mb-3" style="float: right; width: 30%;">
            <input type="text" name="kata" class="form-control" placeholder="Cari ..." aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    <table class="table table-secondary table-hover table-striped">
        <thead>
            <tr>
                <th class="ps-5 text-center">Nomor</th>
                <th class="text-center">Judul Buku</th>
                <th class="text-center">Penulis</th>
                <th class="pe-5 text-center">Harga</th>
                <th class="text-center">Tanggal Terbit</th>
                <th class="pe-5 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        ?>
        <?php $__currentLoopData = $data_buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="ps-5 text-center"><?php echo e($buku->id); ?></td>
                <td class="text-center"><?php echo e($buku->judul); ?></td>
                <td class="text-center"><?php echo e($buku->penulis); ?></td>
                <td class="text-center"><?php echo e("Rp ".number_format($buku->harga, 0, ',', '.')); ?></td>
                <td class="text-center"><?php echo e($buku->tgl_terbit->format('d/m/Y')); ?></td>
                <td class="pe-5 text-center">
                    <form action="<?php echo e(route('buku.destroy',$buku->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <a class="btn btn-primary" href="<?php echo e(route('buku.edit', $buku->id)); ?>" >Edit</a>
                        <?php echo method_field('DELETE'); ?>
                        <button onclick="return confirm('Yakin mau dihapus?')" type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-end pe-5"><b>Total Banyaknya Buku :</b> <?php echo e($jumlah_buku); ?></td>
            </tr>
            <tr>
                <td colspan="6" class="text-end pe-5"><b>Total Harga Buku :</b> <?php echo e("Rp ".number_format($total_harga, 2, ',', '.')); ?></td>
            </tr>
        </tfoot>
    </table>
    <div><?php echo e($data_buku->links('pagination::bootstrap-5')); ?></div>
    <a href="<?php echo e(route('buku.create')); ?>" class="btn btn-primary float-end">Tambah Buku</a>
</body>
</html><?php /**PATH D:\KULIAH\SEMESTER 3\TUGAS\Praktikum Pemrograman Web 2\code\pertemuan5\resources\views/buku/index.blade.php ENDPATH**/ ?>