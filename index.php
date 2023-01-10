<?php i_frame(); ?> 
<body>  
    <?php get_header(); ?>
    <section>
        <div>
            <?php i_home(); ?>
        </div>
        <?php get_footer(); ?>
    </section>
    <?php i_frame_js(); ?>
</body>
</html>
<?php if(get_option("i_mourn") == 1) { ?><style>html{filter:grayscale(1);}body::-webkit-scrollbar-thumb{background-color: gray !important;}</style><?php } ?>