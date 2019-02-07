<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    var repeater = $('.repeater-default').repeater({
  initval: 1,
});


jQuery(".drag").sortable({
    axis: "y",
    cursor: 'pointer',
    opacity: 0.5,
    placeholder: "row-dragging",
    delay: 150,
    update: function(event, ui) {
      console.log('repeaterVal');
      console.log(repeater.repeaterVal());
      console.log('serializeArray');
      console.log(repeater.serializeArray());
    }

}).disableSelection();

</script>

<form method="POST" class="form-horizontal well" role="form">
  <fieldset>
    <legend>Cars</legend>
    <div class="repeater-default">
      <div data-repeater-list="car" class="drag">
        <div data-repeater-item="">
          <div class="form-group">
            <label class="col-sm-1 control-label">Make</label>
            <div class="col-sm-2">
              <select name="car[0][make]" class="form-control">
                <option value="volkswagon" selected="">Volkswagon</option>
                <option value="honda">Honda</option>
                <option value="ford">Ford</option>
              </select>
            </div>

            <label class="col-sm-1 control-label">Model</label>
            <div class="col-sm-2">
              <input type="text" name="car[0][model]" value="Beetle" class="form-control">
            </div>

            <div class="col-sm-4">
              <label class="checkbox-inline">
                <input type="checkbox" name="car[0][features][]" value="ac">
                Air Conditioning
              </label>

              <label class="checkbox-inline">
                <input type="checkbox" name="car[0][features][]" value="abs">
                Anti-Lock Brakes
              </label>
            </div>

            <div class="col-sm-2">
              <span data-repeater-delete="" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-remove"></span> Delete
              </span>
            </div>
          </div>
        </div>

        <div data-repeater-item="">
          <div class="form-group">
            <label class="col-sm-1 control-label">Make</label>
            <div class="col-sm-2">
              <select name="car[1][make]" class="form-control">
                <option value="volkswagon">Volkswagon</option>
                <option value="honda" selected="">Honda</option>
                <option value="ford">Ford</option>
              </select>
            </div>

            <label class="col-sm-1 control-label">Model</label>
            <div class="col-sm-2">
              <input type="text" name="car[1][model]" value="Accord" class="form-control">
            </div>

            <div class="col-sm-4">
              <label class="checkbox-inline">
                <input type="checkbox" name="car[1][features][]" value="ac">
                Air Conditioning
              </label>

              <label class="checkbox-inline">
                <input type="checkbox" name="car[1][features][]" value="abs">
                Anti-Lock Brakes
              </label>
            </div>

            <div class="col-sm-2">
              <span data-repeater-delete="" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-remove"></span> Delete
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-1 col-sm-11">
          <span data-repeater-create="" class="btn btn-info btn-md">
            <span class="glyphicon glyphicon-plus"></span> Add
          </span>
        </div>
      </div>

      <hr>

    </div>
    <div class="form-group">
      <div class="col-sm-offset-1 col-sm-11">
        <input type="submit" value="Submit" class="btn btn-primary btn-lg">
      </div>
    </div>
  </fieldset>
</form>
