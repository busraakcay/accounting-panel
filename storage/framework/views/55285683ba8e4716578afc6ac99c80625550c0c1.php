
<?php $__env->startSection('content'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('company-table')->html();
} elseif ($_instance->childHasBeenRendered('r7tVy0o')) {
    $componentId = $_instance->getRenderedChildComponentId('r7tVy0o');
    $componentTag = $_instance->getRenderedChildComponentTagName('r7tVy0o');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('r7tVy0o');
} else {
    $response = \Livewire\Livewire::mount('company-table');
    $html = $response->html();
    $_instance->logRenderedChild('r7tVy0o', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/company/index.blade.php ENDPATH**/ ?>