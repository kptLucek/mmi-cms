<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong>{if !$request->id}{#template.text.edit.header.new#}{else}{#template.text.edit.header.edit#}{/if}</strong>
                    </div>
                    <div class="card-body">
                        {$textForm}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
