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
<div class="<?php echo $pluralVar; ?> index">
	<h2><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h2>
	<div class="row">
		<div class="actions col-xs-12">
			<?php echo "<?php echo \$this->Html->link(__('Adicionar " . $singularHumanName . "'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>"; ?>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">Descrição da Tabela</div>
		<div class="table-responsive">
			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>
						<?php foreach ($fields as $field): ?>
						<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
						<?php endforeach; ?>
						<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
					echo "\t<tr>\n";
					foreach ($fields as $field) {
						$isKey = false;
						if (!empty($associations['belongsTo'])) {
							foreach ($associations['belongsTo'] as $alias => $details) {
								if ($field === $details['foreignKey']) {
									$isKey = true;
									echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
									break;
								}
							}
						}
						if ($isKey !== true) {
							echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
						}
					}

					echo "\t\t<td class=\"actions\">\n";
					echo "\t\t\t<?php echo \$this->Html->link(__('Visualizar'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-info btn-block')); ?>\n";
					echo "\t\t</td>\n";
					echo "\t</tr>\n";

					echo "<?php endforeach; ?>\n";
					?>
				</tbody>
			</table>
			<div class="panel-footer">
				<div class="paging">
					<ul class="pagination text-center">						
						<li><?php echo "<?php"; ?> <?php echo "\t\techo \$this->Paginator->prev(__('Anterior'), array(), null, array('class' => 'prev disabled'));"; ?><?php echo "\t?>"; ?></li>
						<li><?php echo "<?php"; ?> <?php echo "\t\techo \$this->Paginator->numbers(array('separator' => ''));"; ?><?php echo "\t?>"; ?></li>
						<li><?php echo "<?php"; ?> <?php echo "\t\techo \$this->Paginator->next(__('Próxima'), array(), null, array('class' => 'next disabled'));"; ?><?php echo "\t?>"; ?> </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="actions col-xs-12">
			<?php echo "<?php echo \$this->Html->link(__('Adicionar " . $singularHumanName . "'), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>"; ?>
		</div>
	</div>
</div>
