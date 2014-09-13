<h2>Verwaltung des Infoscreens</h2>
<hr>
<h3>LVB-Anzeige:</h3>
<div class="row">
    <div class="col-lg-3">
        <p>Anzahl der Verbindungen:</p>
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-2">
        <div class="input-group">
            <input type="text" class="form-control">
            <span class="input-group-btn">
        <button class="btn btn-default" type="button">OK</button>
      </span>
        </div>
        <!-- /input-group -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /row -->



<h3>Layout ändern:</h3>
<div class="btn-group">
<button id="slate_layout_btn" type="button" class="btn btn-primary btn-lg">Slate</button>
<button id="cyborg_layout_btn" type="button" class="btn btn-primary btn-lg">Cyborg</button>
<button id="darkly_layout_btn" type="button" class="btn btn-primary btn-lg">Darkly</button>
<button id="superhero_layout_btn" type="button" class="btn btn-primary btn-lg">Superhero</button>
<button id="flatly_layout_btn" type="button" class="btn btn-primary btn-lg">Flatly</button>
<button id="sandstone_layout_btn" type="button" class="btn btn-primary btn-lg">Sandstone</button>
<button id="yeti_layout_btn" type="button" class="btn btn-primary btn-lg">Yeti</button>
</div>
<script>
    $('#slate_layout_btn').click(function () {
        swapStyleSheet('css/slate.min.css');
    });
    $('#cyborg_layout_btn').click(function () {
        swapStyleSheet('css/bootstrap.min.css');
    });
    $('#darkly_layout_btn').click(function () {
        swapStyleSheet('css/darkly.min.css');
    });
    $('#superhero_layout_btn').click(function () {
        swapStyleSheet('css/superhero.min.css');
    });
    $('#flatly_layout_btn').click(function () {
        swapStyleSheet('css/flatly.min.css');
    });
    $('#sandstone_layout_btn').click(function () {
        swapStyleSheet('css/sandstone.min.css');
    });
    $('#yeti_layout_btn').click(function () {
        swapStyleSheet('css/yeti.min.css');
    });
</script>
