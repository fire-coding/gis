<div class="menu module">
  <div class="module-title gradient">Меню</div>
  <div class="module-wrapper">
    <ul>
      <li {if $page == "maps_search"} class="active" {/if}><a href="/maps_search">{fa_icon name="hand-o-right"}Адміністративний пошук</a></li>
      <li {if $page == "maps_choice"} class="active" {/if}><a href="/maps_choice">{fa_icon name="hand-o-right"}Вибір карти</a></li>
      <li {if $page == "maps_editor"} class="active" {/if}><a href="/maps_editor">{fa_icon name="hand-o-right"}Редактор</a></li>
      <li {if $page == "maps_gps"} class="active" {/if}><a href="/maps_gps">{fa_icon name="hand-o-right"}GPS Моніторинг</a></li>
      <li {if $page == "maps_view"} class="active" {/if}><a href="/maps_view">{fa_icon name="hand-o-right"}Синтезоване зображення</a></li>
      <li {if $page == "maps_content"} class="active" {/if}><a href="/maps_content">{fa_icon name="hand-o-right"}Тематичний зміст</a></li>
      <li {if $page == "maps_events"} class="active" {/if}><a href="/maps_events">{fa_icon name="hand-o-right"}Реєстрація подій</a></li>
    </ul>
  </div>
</div>