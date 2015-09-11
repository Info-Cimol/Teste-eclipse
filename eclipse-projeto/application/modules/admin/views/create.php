<div id="content">
<h2>Criar Noticia</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('admin/post') ?>

    <label for="title">Título</label>
    <input type="input" name="title" /><br />

    <label for="text">Texto</label>
    <textarea name="text"></textarea><br />

    <input type="submit" name="submit" value="Postar" />

</form>
</div>