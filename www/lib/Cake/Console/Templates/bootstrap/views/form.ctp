<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="<?php echo $pluralVar; ?> form">
	<legend><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></legend>
<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('inputDefaults' => array('div' => 'form-group', 'class' => 'form-control'), 'class' => 'well form-horizontal')); ?>\n"; ?>
	<fieldset>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field === $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->Form->input('{$field}', array('class' => 'form-control'));\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
	</fieldset>
<?php
	echo "<?php echo \$this->Form->button('Salvar', array('class' => 'btn btn-success'))?>\n";
	echo "<?php echo \$this->Form->end(); ?>\n";
?>
</div>
<div class="actions">
	<h3><?php echo "<?php echo __('Opções'); ?>"; ?></h3>

<div class="row">
<?php if (strpos($action, 'add') === false): ?>
		<?php echo "<?php echo \$this->Form->postLink(__('Excluir'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?>
<?php endif; ?>
		<?php echo "<?php echo \$this->Html->link(__('Ver " . $pluralHumanName . "'), array('action' => 'index'), array('class' => 'btn btn-default')); ?>"; ?>
		</div>
<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "<div class='row'>";
					echo "\t\t<?php echo \$this->Html->link(__('Ver " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), array('class' => 'btn btn-default')); ?>\n";
					echo "\t\t<?php echo \$this->Html->link(__('Adicionar " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('class' => 'btn btn-success')); ?>\n";
					echo "</div>";
					$done[] = $details['controller'];
				}
			}
		}
?>
</div>
