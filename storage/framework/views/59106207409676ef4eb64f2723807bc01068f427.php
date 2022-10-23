
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('income-table')->html();
} elseif ($_instance->childHasBeenRendered('Xb1or13')) {
    $componentId = $_instance->getRenderedChildComponentId('Xb1or13');
    $componentTag = $_instance->getRenderedChildComponentTagName('Xb1or13');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Xb1or13');
} else {
    $response = \Livewire\Livewire::mount('income-table');
    $html = $response->html();
    $_instance->logRenderedChild('Xb1or13', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/income/index.blade.php ENDPATH**/ ?>