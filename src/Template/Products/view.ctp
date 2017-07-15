<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Product $product
  */
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2><?= h($product->name) ?></h2>

        <table class="table table-view">
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($product->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nombre') ?></th>
                <td><?= h($product->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Foto') ?></th>
                <td><?= h($product->photo) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Foto dir') ?></th>
                <td><?= h($product->photo_dir) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Cantidad') ?></th>
                <td><?= $this->Number->format($product->quantity) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Precio') ?></th>
                <td><?= $this->Number->format($product->price) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Creado') ?></th>
                <td><?= h($product->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modificado') ?></th>
                <td><?= h($product->modified) ?></td>
            </tr>
        </table>
        <div class="row">
            <h4><?= __('Descripción') ?></h4>
            <?= $this->Text->autoParagraph(h($product->description)); ?>
        </div>
    </div>
</div>
