<?php extract($_POST); ?>
<div id="divResultadoModal">
    <div class="row">
        <div class="col-sm-2">
            N&ordm; poliza:
        </div>
        <div class="col-sm-4">
            <?php echo $nropoliza; ?>
        </div>
        <div class="col-sm-2">
            N&ordm; Cuota:
        </div>
        <div class="col-sm-4">
            <?php echo $nrocuota; ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-2">
            Monto:
        </div>
        <div class="col-sm-3">
            <input class="form-control" type="text" value="<?php echo $monto; ?>" name="monto" id="monto" />
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            1&ordm; vencimiento:
        </div>
        <div class="col-sm-4">
            <input class="form-control" type="text" value="<?php echo $vencimiento1; ?>" name="vencimiento1" id="vencimiento1" onblur="validarFecha(this)" onKeypress="return fechaControl(this.id, event);" maxlength="10" />
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            2&ordm; vencimiento:
        </div>
        <div class="col-sm-4">
            <input class="form-control" type="text" value="<?php echo $vencimiento2; ?>" name="vencimiento2" id="vencimiento2" onblur="validarFecha(this)" onKeypress="return fechaControl(this.id, event);" maxlength="10" />
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            Fecha Pago:
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="fechapago" name="fechapago"
                   alt="Fecha de cobro de la cuota del seguro"
                   title="Fecha de cobro de la cuota del seguro"
                   value="<?php echo date('d/m/Y'); ?>" onblur="validarFecha(this)" onKeypress="return fechaControl(this.id, event);" maxlength="10" />
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-3">
            N&ordm; Recibo:
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="recibo" name="recibo" />
        </div>
    </div>
    <input type="hidden" id="nropoliza" name="nropoliza" value="<?php echo $nropoliza; ?>" />
    <input type="hidden" id="nrocuota" name="nrocuota" value="<?php echo $nrocuota; ?>" />
</div>