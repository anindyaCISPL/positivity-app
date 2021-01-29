 <nav>
     <span>
         <?php if (auth()) { ?>
             Hello, <?= ucwords(auth()->name); ?>
         <?php } else { ?>
             Hello,Guest
         <?php } ?>
     </span>
     <ul>
         <li class="<?php echo (route() == '') ? 'current_page_item' : ''; ?>"><a href="/">Home</a></li>
         <li class="<?php echo (route() == 'about') ? 'current_page_item' : ''; ?>"><a href="/about/">About</a></li>
         <li class="<?php echo (route() == 'story/create') ? 'current_page_item' : ''; ?>"><a href="/story/create/">Add Story</a></li>
         <li class="<?php echo (route() == 'stories') ? 'current_page_item' : ''; ?>"><a href="/stories/">View Stories</a></li>

         <?php if (auth()) { ?>
             <li class="<?php echo (route() == 'login') ? 'current_page_item' : ''; ?>"><a href="/logout/">Logout</a></li>
         <?php } else { ?>
             <li class="<?php echo (route() == 'login') ? 'current_page_item' : ''; ?>"><a href="/login/">Login</a></li>
         <?php } ?>
     </ul>
 </nav>