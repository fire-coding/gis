<div class="menu module">
  <div class="module-title gradient">Адміністрування</div>
  <div class="module-wrapper">
    <ul>
      <li {if $page == "index"} class="active" {/if}><a href="/">{fa_icon name="hand-o-right"}Панель керування</a></li>
      <li {if $page == "system"} class="active" {/if}><a href="/system">{fa_icon name="hand-o-right"}Система</a></li>
      <li>
        {fa_icon name="hand-o-right"}<span>Користувачі</span>
        <ul>
          <li {if $page == "users"} class="active" {/if}><a href="/users">{fa_icon name="caret-right"}Користувачі</a></li>
          <li {if $page == "user_groups"} class="active" {/if}><a href="/user_groups">{fa_icon name="caret-right"}Групи користувачів</a></li>
        </ul>
      </li>
      <li {if $page == "import"} class="active" {/if}><a href="/import">{fa_icon name="hand-o-right"}Імпорт</a></li>
    </ul>
  </div>
</div>