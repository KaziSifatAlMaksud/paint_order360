<div class="navigation">
  <ul>
    <li class="list @if(Route::is('main')) active @endif">
      <a href="<?php echo '/main' ?>">
        <span class="icon"><i class="fa-solid fa-house-chimney"></i></span>
        <span class="text">Jobs</span>
      </a>
    </li>
    <li class="list @if(Route::is('showgarage')) active @endif">
      <a href="<?php echo '/garage_paint' ?>">
        <span class="icon"> <i class="fa-solid fa-suitcase"></i></span>
        <span class="text">Docs</span>
      </a>
    </li>
    <li class="list @if(Route::is('invoice')) active @endif">
      <a href="<?php echo '/invoice' ?>">
        <span class="icon"> <i class="fa-solid fa-file-lines"></i></span>
        <span class="text">Invoice</span>
      </a>
    </li>
    <li class="list @if(Route::is('painter.profile')) active @endif">
      <a href="<?php echo '/profile' ?>">
        <span class="icon"> <i class="fa-solid fa-user "></i></span>
        <span class="text">Profile</span>
      </a>
    </li>
  </ul>
</div>

