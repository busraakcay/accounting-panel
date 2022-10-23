
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card card-custom  gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Kullanıcılar</h3>
            </div>
            <div class="card-toolbar">
                <a href="<?php echo e(route('create-admin')); ?>" class="btn btn-primary font-weight-bolder">
                    Kullanıcı Ekle</a>
            </div>
        </div>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin-table')->html();
} elseif ($_instance->childHasBeenRendered('l8tivXp')) {
    $componentId = $_instance->getRenderedChildComponentId('l8tivXp');
    $componentTag = $_instance->getRenderedChildComponentTagName('l8tivXp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l8tivXp');
} else {
    $response = \Livewire\Livewire::mount('admin-table');
    $html = $response->html();
    $_instance->logRenderedChild('l8tivXp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\boltat\resources\views/admin/index.blade.php ENDPATH**/ ?>