<div id="content">
<h2>Pesquisar</h2>
<div id="login_form">

    <?php 
	$atributos = array('id'=>'form','oninput'=>'ajaxTest();');
	$att = array('id'=>'search');
	echo form_open('site/search', $atributos);
	echo form_input('search');
	echo form_close();
	?>
</div>
<div id="results">
<p>Ok.</p>
</div>
</div>