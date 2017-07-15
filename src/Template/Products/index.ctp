<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
  */
?>
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2>
                <?= ('Todos los productos') ?>
                <?= $this->Html->link('Nuevo Producto', ['controller' => 'Products', 'action' => 'add'], ['class' => 'btn btn-warning pull-right']) ?>
            </h2>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id', ['id']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name', ['Nombre']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('quantity', ['Cantidad']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('price', ['Precio']) ?></th>



                       <!-- <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('photo_dir') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>  -->



                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $this->Number->format($product->id) ?></td>
                        <td><?= h($product->name) ?></td>
                        <td><?= $this->Number->format($product->quantity) ?></td>
                        <td><?= $this->Number->format($product->price) ?></td>


                        <!--<td><?= h($product->photo) ?></td>
                        <td><?= h($product->photo_dir) ?></td>
                        <td><?= h($product->created) ?></td>
                        <td><?= h($product->modified) ?></td> -->



                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $product->id], ['class' => 'btn btn-info btn-sm']) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $product->id], ['class' => 'btn btn-primary btn-sm']) ?>
                            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $product->id], ['confirm' => __('Estas seguro que deseas eliminar el producto?'), 'class' => 'btn btn-danger btn-sm']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
      
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('primero')) ?>
                <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
                <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} fila(s) de {{count}} totales')]) ?></p>
        </div>
    </div>
</div>