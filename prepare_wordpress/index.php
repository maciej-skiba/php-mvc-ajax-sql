<!DOCTYPE html>
<html>
    
<?php get_header(); ?>

<body>
    <main>
        <div id="mainpage" tal:condition="exists: tresc" tal:content="tresc"></div>
    </main>   
</body>

<?php get_footer(); ?>

</html>


