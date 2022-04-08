<?php $__currentLoopData = $result->result(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($row->kategori == 'b'): ?>
    <p>
        Kategori => <?php echo e($row->kategori); ?>

    </p>
    <h2>
        data => <?php echo e($row->title); ?>

    </h2>
    <?php endif; ?>
    <?php if($row->kategori == 'a'): ?>
    <p>
        Kategori => <?php echo e($row->kategori); ?>

    </p>
    <h1>
        data => <?php echo e($row->title); ?>

    </h1>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/u5891500/public_html/application/views/test/page.blade.php ENDPATH**/ ?>