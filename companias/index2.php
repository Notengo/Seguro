<div class="row col-sm-12" id="divResultadoModal" >
    <div class="row">
        <div class="col-lg-12">
            <label class="label-success label">Razon Social</label><br />
            <input class="form-control" data-toggle="tooltip" name="razonSocial" id="razonSocial"
                   title="Razon Social de la Compa&ntilde;ia" alt="Razon Social de la Compa&ntilde;ia" 
                   placeholder="Razon Social de la Compa&ntilde;ia" type="text" />
            <!--onkeyup="ajax_showOptionsDependencia(this, 'getListadoByLetters', event);" />-->
            <input type="hidden" id="razonSocial_hidden" name="razonSocial_ID" value="" />
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-3">
            <label class="label-success label">N&ordm; de Productor</label><br />
            <input class="form-control" data-toggle="tooltip" name="nroproductor" id="nroproductor" 
                   title="N&uacute;mero de productor" alt="N&uacute;mero de productor" type="number" 
                   min="0" onkeypress="return soloNumeros(event);" />
        </div>
        <div class="col-lg-3">
            <label class="label-success label">CUIT</label><br />
            <input class="form-control" data-toggle="tooltip" name="cuit" id="cuit"
                   title="N&uacute;mero de cuit" alt="N&uacute;mero de cuit" type="number"
                   min="0" onkeypress="return soloNumeros(event);" />
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-9">
            <label class="label-success label">Calle</label>
            <input class="form-control" data-toggle="tooltip" name="calle" id="calle"
                   title="Direcci&oa&oacute;n de la oficina" alt="Direcci&oa&oacute;n de la oficina" type="text" />
        </div>
        <div class="col-lg-3">
            <label class="label-success label">N&ordm;</label>
            <input class="form-control" data-toggle="tooltip" name="nro" id="nro"
                   title="Altura de la calle" alt="Altura de la calle" type="number"
                   min="0" onkeypress="return soloNumeros(event);" />
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-3">
            <label class="label-success label">Piso</label><br />
            <input class="form-control" data-toggle="tooltip" name="piso" id="piso" 
                   title="Piso" alt="Piso" type="number" onkeypress="return soloNumeros(event);" />
        </div>
        <div class="col-lg-3">
            <label class="label-success label">Dpto</label><br />
            <input class="form-control" data-toggle="tooltip" name="dpto" id="dpto" title="Departamento" alt="Departamento" type="text" />
        </div>
        <div class="col-lg-3">
            <label class="label-success label">C.P.</label><br />
            <input class="form-control" data-toggle="tooltip" name="cp" id="cp"
                   title="C&oacute;digo postal" alt="C&oacute;digo postal" type="number" />
        </div>
        <div class="col-lg-3">
            <label class="label-success label">N&ordm; Tel&eacute;fono</label><br />
            <input class="form-control" data-toggle="tooltip" name="telefono" id="telefono" 
                   title="N&uacute;mero de telefono" alt="N&uacute;mero de telefono" />
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-lg-6">
            <label class="label-success label">Correo Electronico</label><br />
            <input class="form-control" data-toggle="tooltip" name="email" id="email"
                   title="Correo electronico" alt="Correo electronico" type="email" />
        </div>
        <div class="col-lg-6">
            <label class="label-success label">Link</label><br />
            <input class="form-control" data-toggle="tooltip" name="pagina" id="pagina"type="url"
                   title="P&aacute;gina oficial de la compa&ntilde;ia" alt="P&aacute;gina oficial de la compa&ntilde;ia" />
        </div>
    </div>
    <input id="item" value="1" type="hidden"/>
</div>