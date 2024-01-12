<div class="navigation">
  <ul>
    <li class="list @if(Route::is('main')) active @endif">
      <a href="<?php echo '/main' ?>">
        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
        <span class="text">Jobs</span>
      </a>
    </li>
    <li class="list @if(Route::is('showgarage')) active @endif">
      <a href="<?php echo '/garage_paint' ?>">
        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
        <span class="text">Docs</span>
      </a>
    </li>
    <li class="list @if(Route::is('invoice')) active @endif">
      <a href="<?php echo '/invoice' ?>">
        <span class="icon"><ion-icon name="newspaper-outline"></ion-icon></span>
        <span class="text">Invoice</span>
      </a>
    </li>
    <li class="list @if(Route::is('painter.profile')) active @endif">
      <a href="<?php echo '/profile' ?>">
        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
        <span class="text">Profile</span>
      </a>
    </li>
  </ul>
</div>