{if $ldap}
	{headLink()->appendStyleSheet($baseUrl . '/resource/cmsAdmin/js/jquery-ui/jquery-ui.min.css')}
	{headScript()->appendFile($baseUrl . '/resource/cmsAdmin/js/jquery-ui/jquery-ui.min.js')}
	{headScript()->appendFile($baseUrl . '/resource/cmsAdmin/js/auth.js')}
{/if}
<div class="content-box">
	<div class="content-box-header">
		<h3>{if !$request->id}{#Dodawanie#}{else}{#Edycja#}{/if} {#użytkownika CMS#}</h3>
		<div class="clear"></div>
	</div>
	<div class="content-box-content clearfix">
		{$authForm}
	</div>
</div>