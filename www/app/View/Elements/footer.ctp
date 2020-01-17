	<?php echo $this->element('sql_dump'); ?>
				<?php
				echo $this->fetch('script');
				echo $this->Html->script(array('jquery.min', 'bootstrap.min', 'bootstrap-progressbar.min', 'Chart.min', 'custom.min', 'moment.min', 'nprogress', 'fastclick', 'jquery.smartWizard'));
				?>
<footer>
	<div class="row">
	<div class="pull-right">
		<strong>Scaffold - <a href="https://nic.br">NIC.br</a></strong>
	</div>
	<div class="clearfix"></div>
	</div>
</footer>