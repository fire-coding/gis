<div class="menu module">
  <div class="module-title gradient">Властивості</div>
  <div class="module-wrapper">

    <form action="/maps_search" method="post">
      <div class="fields_group small">Пошук</div>
      <table>
        <tr>
          <td>
            <input type="text" name="search_str" placeholder="Введіть фрагмент назви" />
          </td>
          <td>
            <button type="submit">Пошук</button>
          </td>
        </tr>
        <tr>
          <td colspan="2"><label for="search_regions"><input type="checkbox" checked name="search_place[0][]" id="search_regions" />Області</label></td>
        </tr>
        <tr>
          <td colspan="2"><label for="search_rajon"><input type="checkbox" name="search_place[0][]" id="search_rajon" />Райони</label></td>
        </tr>
        <tr>
          <td colspan="2"><label for="search_city"><input type="checkbox" name="search_place[0][]" id="search_city" />Міста</label></td>
        </tr>
        <tr>
          <td colspan="2"><label for="search_village"><input type="checkbox" name="search_place[1][]" id="search_village" />Сільради</label></td>
        </tr>
      </table>
      {*<div class="fields_group small">Вигляд</div>*}
      {*<table>*}
        {*<tr>*}
          {*<td><label for="view_cloud"><input type="checkbox" checked name="view_cloud[2][]" id="view_cloud" />Хмара</label></td>*}
          {*<td><label for="view_def"><input type="checkbox" name="view_cloud[2][]" id="view_def" />Звичайний</label></td>*}
        {*</tr>*}
      {*</table>*}
      <div class="fields_group small">Області</div>
      <table class="search_filter">
        <tr>
          <td>
            <a href="#" onclick="$('.filter-regions').prop('checked', true);return false;">Виділити всі</a>
            &nbsp;/&nbsp;
            <a href="#" onclick="$('.filter-regions').prop('checked', false);return false;">Зняти всі</a>
          </td>
        </tr>
        {foreach from=$regions item=region}
          <tr>
            <td>
              <label for="region_{$region.CODEOBJ}"><input type="checkbox" class="filter-regions" name="regions[{$region.CODEOBJ}]" id="region_{$region.CODEOBJ}" />{$region.TITLE_R}</label>
            </td>
          </tr>
        {/foreach}

      </table>
    </form>
  </div>
</div>