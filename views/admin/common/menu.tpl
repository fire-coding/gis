<div class="menu module">
  <div class="module-title gradient">Адміністрування</div>
  <div class="module-wrapper">
    <ul>
      <li {if $page == "index"} class="active" {/if}><a href="/"><span class="fa fa-hand-o-right">&nbsp;</span>Панель керування</a></li>
      <li {if $page == "system"} class="active" {/if}><a href="/system"><span class="fa fa-hand-o-right">&nbsp;</span>Система</a></li>
      <li>
        <span class="fa fa-hand-o-right">&nbsp;</span><span>Користувачі</span>
        <ul>
          <li><a href="/users"><span class="fa fa-caret-right">&nbsp;</span>Користувачі</a></li>
          <li><a href="/user_groups"><span class="fa fa-caret-right">&nbsp;</span>Групи користувачів</a></li>
          <li><a href="/objects"><span class="fa fa-caret-right">&nbsp;</span>Об`єкти</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>