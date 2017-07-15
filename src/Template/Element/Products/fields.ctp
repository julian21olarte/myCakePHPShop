<?php
    echo $this->Form->control('name', ['label' => 'Nombre']);
    echo $this->Form->control('description', ['label' => 'Descripción']);
    echo $this->Form->control('quantity', ['label' => 'Cantidad']);
    echo $this->Form->control('price', ['label' => 'Precio']);
    echo $this->Form->control('photo', ['type' => 'file', 'label' => 'Foto', 'class' => 'filestyle', 'data-buttonName' => 'btn-info', 'data-buttonText' => 'Subir Archivo']);
?>