!function($,e,t){$(t).ready(function(){$("#the-list").find("tr.active span.deactivate a").each(function(){var e=this,t=$._data($(e)[0],"events");"undefined"!=typeof t&&jQuery.each(t,function(t,n){jQuery.each(n,function(t,n){"click"==n.type&&($(e).off("click "),$(e).closest("tr").find("td.column-description .plugin-version-author-uri").append(' | <span class="ps-stopper-detected">Disabled Deactivation Script</span>'))})})})})}(jQuery,window,document);