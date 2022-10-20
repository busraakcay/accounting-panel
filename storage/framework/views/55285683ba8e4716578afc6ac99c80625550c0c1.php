
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('company-table')->html();
} elseif ($_instance->childHasBeenRendered('bsS8p8Q')) {
    $componentId = $_instance->getRenderedChildComponentId('bsS8p8Q');
    $componentTag = $_instance->getRenderedChildComponentTagName('bsS8p8Q');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bsS8p8Q');
} else {
    $response = \Livewire\Livewire::mount('company-table');
    $html = $response->html();
    $_instance->logRenderedChild('bsS8p8Q', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/company/index.blade.php ENDPATH**/ ?>