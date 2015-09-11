<div id="content">
<h2><?php echo $title ?></h2>

<?php if(!empty($results)){
        foreach ($results as $news_item): ?>

        <h3><?php echo $news_item->title ?></h3>
        <div class="main">
                <?php echo $news_item->text ?>
        </div>
        <p><a href="<?php echo base_url().$news_item->id ?>/<?php echo $news_item->slug?>">Ver notícia</a></p>
<?php endforeach;
echo $links;
}else{
    echo "Sem noticias para exibir";
};?>
</div>