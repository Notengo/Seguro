<div class="col-sm-12">
    <div class="col-sm-12 col-lg-12" id="divResultadoModal">
        <label class="label-success label">Tipo</label><br />
        <input class="form-control" data-toggle="tooltip" name="tipo_modal" id="tipo_modal" title="Descripci&oacute;n del tipo" alt="Descripci&oacute;n del tipo" placeholder="Descripci&oacute;n del tipo" type="text"
               onkeyup="ajax_showOptionsTipo(this, 'getListadoByLetters', event);" /><br/>
        <input type="hidden" id="tipo_hidden" name="tipo_ID" value="" />
    </div>
    <input id="item" value="3" type="hidden"/>
</div>