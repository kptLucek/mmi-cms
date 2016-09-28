{headLink()->appendStyleSheet($baseUrl . '/resource/cmsAdmin/css/category.css')}
<div class="content-box">
	<div class="content-box-header">
		<h3>{#Zarządzanie treścią#}</h3>
		<div class="clear"></div>
	</div>
	<div class="content-box-content clearfix">
		<div id="categoryTreeContainer">
			<div id="jstree">
				{jsTree([], $baseUrl . '/resource/cmsAdmin/js/category.js')}
			</div>
		</div>
		<div id="categoryNodeContainer">
			<div id="categoryMessageContainer"></div>
			<div id="categoryContentContainer">
				{if $categoryForm}
					<ul class="tabs">
						<li>
							<a href="#tab-config">Konfiguracja</a>
						</li>
						<li>
							<a href="#tab-content">Treść i tagi</a>
						</li>
						<li>
							<a href="#tab-seo">SEO</a>
						</li>
						<li>
							<a href="#tab-advanced">Zaawansowane</a>
						</li>
						<li>
							<a href="#tab-section">Widgety</a>
						</li>
						<li>
							<a href="#tab-preview">Podgląd</a>
						</li>
					</ul>
					{$categoryForm->start()}
					<div class="tab-content clearfix" id="tab-config">
						{$categoryForm->getElement('cmsCategoryTypeId')}
						{$categoryForm->getElement('name')}
						{$categoryForm->getElement('active')}
						{$categoryForm->getElement('submit1')}
					</div>
					<div class="tab-content clearfix" id="tab-seo">
						{$categoryForm->getElement('title')}
						{$categoryForm->getElement('description')}
						{$categoryForm->getElement('customUri')}
						{$categoryForm->getElement('follow')}
						{$categoryForm->getElement('submit2')}
					</div>
					<div class="tab-content clearfix" id="tab-content">
						{foreach $categoryForm->getElements() as $element}
						{if php_substr($element->getName(), 0 ,12) != 'cmsAttribute'}{continue}{/if}
						{$element}
					{/foreach}
					{$categoryForm->getElement('tags')}
					{$categoryForm->getElement('submit3')}
				</div>
				<div class="tab-content clearfix" id="tab-advanced">
					{$categoryForm->getElement('redirect')}
					{$categoryForm->getElement('mvcParams')}
					{$categoryForm->getElement('https')}
					{$categoryForm->getElement('blank')}
					{$categoryForm->getElement('submit4')}
				</div>
				{$categoryForm->end()}
				<div class="tab-content clearfix" id="tab-section">
					{$categorySectionForm}
					<ul class="list ui-sortable" id="navigation-list">
						<li id="navigation-item-1" class="ui-sortable-handle">
							<div>
								<a href="#" class="button edit"><i class="icon-edit"></i> edytuj</a>
								<a href="#" class="button delete confirm" title="Czy na pewno usunąć widget?"><i class="icon-remove-sign"></i> usuń</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="tab-content clearfix" id="tab-preview">
					<iframe id="preview-frame" src="{if $categoryForm->getRecord()->customUri}{@module=cms&controller=category&action=dispatch&uri={$categoryForm->getRecord()->customUri}@}{else}{@module=cms&controller=category&action=dispatch&uri={$categoryForm->getRecord()->uri}@}{/if}"></iframe>
				</div>
			{/if}
		</div>
	</div>
	<div class="cl"></div>
</div>
</div>