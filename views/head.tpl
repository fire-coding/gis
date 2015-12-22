<title>GIS</title>

<meta charset = "utf-8" />

<link href='https://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="/css/main.css" />
<link rel="stylesheet" href="/css/zwindow.css" />

<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/js/zwindow.js"></script>
<script type="text/javascript" src="/js/map.js"></script>
<script type="text/javascript" src="/js/app.js"></script>

{* PROJ4JS *}
{if !$user->is_admin() }
  <script type="text/javascript" src="/libs/proj4js/proj4js.js"></script>
  <script type="text/javascript" src="/libs/proj4js/defs/EquidistantConic_Ukraine.js"></script>
  <script type="text/javascript" src="/libs/proj4js/defs/EPSG900913.js"></script>
  <script type="text/javascript" src="/libs/proj4js/defs/EPSG27200.js"></script>
  <script type="text/javascript" src="/libs/proj4js/defs/My_proj.js"></script>
{/if}