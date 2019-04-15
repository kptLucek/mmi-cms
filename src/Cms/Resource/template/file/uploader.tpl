{if $error}
    <h2 style="color: red">{$error}</h2>
{/if}
<div id="fileUpload">
    <span id="upload">{#wgraj#}</span>
    <form id="uploader" action="{url($ajaxParams)}" accept-encoding="utf-8" enctype="multipart/form-data" method="post">
        <div>
            <input id="file" name="file[]" type="file" multiple />
        </div>
    </form>
</div>
<div id="uploaderEdit">
    <form id="uploaderEditForm" action="" accept-encoding="utf-8" enctype="multipart/form-data" method="post">
        <div>
            <label>{#template.file.uploader.title#}:</label>
            <input id="editTitle" name="title" type="text" />
            <label>{#template.file.uploader.source#}:</label>
            <input id="editSource" name="source" type="text" />
            <label>{#template.file.uploader.author#}:</label>
            <input id="editAuthor" name="author" type="text" />
            <input id="editReset" name="reset" type="reset" value="{#template.file.uploader.cancel#}" />
            <input id="editSubmit" name="submit" type="submit" value="{#template.file.uploader.save#}" />
        </div>
    </form>
</div>
{$imgC = $images|count}
{$fileC = $files|count}
<div id="fileWidget" class="{if $imgC}imageInside{/if}{if $fileC} fileInside{/if}">
    {if !$imgC && !$fileC}
        <div class="attachmentManage empty">
            <div id="manageOther">{#template.file.uploader.click.to.add#}</div>
        </div>
    {/if}
    {if $imgC}
        <div class="attachmentManage imageManage">
            <ul class="imageFiles" id="manageImage">
                {foreach $images as $file}
                    <li id="item-file-{$file->id}" class="image item">
                        <img src="{thumb($file, 'scaley', '80')}" alt="" />
                        <a href="#" id="edit-file-{$file->id}-{$file->getHashName()}" class="edit-file">{#template.file.uploader.edit#}</a> | 
                        <a href="#" id="file-{$file->id}-{$file->getHashName()}" title="{#template.file.uploader.delete.confirm#}" class="remove-file confirm">{#template.file.uploader.delete#}</a>
                        <div>
                            <label for="file-sticky-{$file->id}-{$file->name}">{#template.file.uploader.stick#}</label>
                            <input name="sticky" id="file-sticky-{$file->id}-{$file->name}" class="sticky" {if $file->sticky}checked="checked" {/if}type="radio" />
                            <div class="clear"></div>
                        </div>
                    </li>
                {/foreach}
            </ul>
            <div class="cl"></div>
        </div>
    {/if}
    {if $fileC}
        <div class="attachmentManage">
            <ul class="otherFiles" id="manageOther">
                {foreach $files as $file}
                    <li id="item-file-{$file->id}" class="item">
                        <div class="img-center">
                            {if $file->mimeType == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'} {*xlsx*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/xlsx-{if $imgIns}32{else}48{/if}.png" alt="Microsoft Office - OOXML - Spreadsheet" />
                                {elseif $file->mimeType == 'application/vnd.ms-excel'} {*xls*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/xls-{if $imgIns}32{else}48{/if}.png" alt="Microsoft Excel Sheet File" />
                                {elseif $file->mimeType == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'} {*docx*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/docx-{if $imgIns}32{else}48{/if}.png" alt="Microsoft Office - OOXML - Document" />
                                {elseif $file->mimeType == 'application/msword'} {*doc*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/doc-{if $imgIns}32{else}48{/if}.png" alt="Microsoft Word Document" />
                                {elseif $file->mimeType == 'application/vnd.openxmlformats-officedocument.presentationml.presentation'} {*pptx*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/pptx-{if $imgIns}32{else}48{/if}.png" alt="Microsoft Office - OOXML - Presentation" />
                                {elseif $file->mimeType == 'application/vnd.ms-powerpoint'} {*ppt*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/ppt-{if $imgIns}32{else}48{/if}.png" alt="Microsoft PowerPoint Presentation" />
                                {elseif $file->mimeType == 'text/csv'} {*csv*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/csv-{if $imgIns}32{else}48{/if}.png" alt="Comma-Seperated Values" />
                                {elseif $file->mimeType == 'application/pdf'} {*pdf*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/pdf-{if $imgIns}32{else}48{/if}.png" alt="Adobe Portable Document Format" />
                                {elseif $file->mimeType == 'application/rtf'} {*rtf*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/rtf-{if $imgIns}32{else}48{/if}.png" alt="Rich Text Format" />
                                {elseif $file->mimeType == 'application/zip'} {*zip*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/zip-{if $imgIns}32{else}48{/if}.png" alt="Zip Archive" />
                                {elseif $file->mimeType == 'application/xml'} {*xml*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/xml-{if $imgIns}32{else}48{/if}.png" alt="XML - Extensible Markup Language" />
                                {elseif $file->mimeType == 'text/plain'} {*txt*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/txt-{if $imgIns}32{else}48{/if}.png" alt="Text File" /> 
                                {elseif $file->mimeType == 'audio/mpeg'} {*mp3*}
                                    <img src="{$baseUrl}/resource/cmsAdmin/images/types/mp3-{if $imgIns}32{else}48{/if}.png" alt="Music File" />
                                {/if}
                            </div>
                            {$file->original|truncate:32}<br />
                            <a href="#" id="edit-file-{$file->id}-{$file->getHashName()}" class="edit-file">{#template.file.uploader.edit#}</a> | 
                            <a href="#" id="file-{$file->id}-{$file->getHashName()}" title="{#template.file.uploader.delete.confirm#}" class="remove-file confirm">{#template.file.uploader.delete#}</a>
                        </li>
                        {/foreach}
                        </ul>
                        <div class="cl"></div>
                    </div>
                    {/if}
                    </div>
