<?php echo $this->Html->link('Add Post', array('controller' => 'posts', 'action' => 'add')); ?>
<h1>Posts do Blog</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Título</th>
        <th>Data de Criação</th>
    </tr>

    <!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo as informações dos posts -->

    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>

            <td>
                <?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
            </td>
            <td>
                <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id']));?>
            </td>

            <td>
                <?php echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $post['Post']['id']),
                    array('confirm' => 'Are you sure?'));
                ?>
            </td>
            
            <td><?php echo $post['Post']['created']; ?></td>
        </tr>
    <?php endforeach; ?> 
</table>