<!--<div class="container">
    <form class="form-horizontal" name="formulario">-->
        <div class="row" id="nuevo">
            <div class="col-sm-12">
                <label class="label-success label">Marca</label><br />
                <input class="form-control" data-toggle="tooltip" name="marca" id="marca" title="Descripci&oacute;n de la marca" alt="Descripci&oacute;n de la marca" placeholder="Descripci&oacute;n de la marca" type="text"
                       onkeyup="ajax_showOptionsDependencia(this, 'getListadoByLetters', event);" /><br/>
                <input type="hidden" id="marca_hidden" name="marca_ID" value="" />
            </div>
        </div>
<!--    </form>
</div>-->