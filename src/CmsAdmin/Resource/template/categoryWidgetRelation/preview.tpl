<ul class="wlist ui-sortable" id="widget-list" data-category-id="{$category->id}">
    {foreach $category->getWidgetModel()->getWidgetRelations() as $widgetRelation}
        <li id="widget-item-{$widgetRelation->id}" class="ui-sortable-handle">
            <div class="preview">
                {$widgetPreviewRequest = $widgetRelation->getWidgetRecord()->getMvcPreviewParamsAsRequest()}
                {widget($widgetPreviewRequest->module, $widgetPreviewRequest->controller, $widgetPreviewRequest->action, $widgetPreviewRequest->toArray() + ['widgetId' => $widgetRelation->id])}
            </div>
            <div class="operation">
                {if aclAllowed(['module' => 'cmsAdmin', 'controller' => 'categoryWidgetRelation', 'action' => 'config'])}
                <a href="javascript:void(0);" onclick="PopupCenter('{@module=cmsAdmin&controller=categoryWidgetRelation&action=config&widgetId={$widgetRelation->getWidgetRecord()->id}&categoryId={$category->id}&id={$widgetRelation->id}@}', 'edycja widgetu id={$widgetRelation->id}');return false;" class="button new-window edit" title="zmień widget" id="widget-edit-{$widgetRelation->getWidgetRecord()->id}"><i class="fa fa-pencil-square-o pull-right fa-2"></i></a>
                {/if}
                {if $widgetRelation->active == 1}
                    {$class='fa fa-2 fa-eye pull-right'}
                    {$title='aktywny'}
                {else}
                    {$class='fa fa-2 fa-eye-slash pull-right'}
                    {$title='ukryty'}
                {/if}
                {if aclAllowed(['module' => 'cmsAdmin', 'controller' => 'categoryWidgetRelation', 'action' => 'toggle'])}
                <a href="{@module=cmsAdmin&controller=categoryWidgetRelation&action=toggle&widgetId={$widgetRelation->getWidgetRecord()->id}&categoryId={$category->id}&id={$widgetRelation->id}@}" data-state="{$widgetRelation->active}" class="button toggle-widget" target="_blank" title="{$title}" id="widget-activate-{$widgetRelation->getWidgetRecord()->id}"><i class="fa fa-eye pull-right fa-2 {$class}"></i></a>
                {/if}
                {if aclAllowed(['module' => 'cmsAdmin', 'controller' => 'categoryWidgetRelation', 'action' => 'sort'])}
                <a href="#" class="button handle-widget" title="sortuj"><i class="fa fa-2 mr-fix-6  pull-right fa-sort"></i></a>
                {/if}
                {if aclAllowed(['module' => 'cmsAdmin', 'controller' => 'categoryWidgetRelation', 'action' => 'delete'])}
                <a href="{@module=cmsAdmin&controller=categoryWidgetRelation&action=delete&categoryId={$category->id}&id={$widgetRelation->id}@}" class="button delete-widget" target="_blank" title="usuń widget"><i class="fa fa-trash-o mr-fix-3 pull-right fa-2"></i></a>
                {/if}
            </div>
        </li>
    {/foreach}
</ul>
