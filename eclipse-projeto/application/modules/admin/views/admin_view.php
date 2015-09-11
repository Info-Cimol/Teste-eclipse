<div id="content">
<?php
if(!empty($results)){
    foreach ($results as $news_item):
        echo "<p>".$news_item->title."</p>";
        echo "<p><a href='".base_url()."admin/delete/".$news_item->id."'>Deletar notícia</a></p>";
    endforeach;
}else{
    echo "Sem noticias para exibir";
}
?>
</div>
