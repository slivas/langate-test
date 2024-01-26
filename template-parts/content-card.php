<article class="flex flex-col">
  <div class="h-64 mb-2"><?php the_post_thumbnail('', array('class' => 'object-cover h-full w-full max-w-none')); ?></div>
  <div class="flex justify-between items-baseline">
    <h2 class="text-xl font-bold"><?php the_title(); ?></h2>
    <time><?php echo get_the_date(); ?></time>
  </div>
</article>
