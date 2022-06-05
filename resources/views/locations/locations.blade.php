<div class="row mt-3">
    <div class="col-lg-5 text-center">
        <form id="formlocationsfindbyid">
            @csrf
            <div class="row">
                <div class="col-auto"><input type="text" name="locationdata" id="locationdata" class="form-control text-center" placeholder="Monterrey, Nuevo León"></div>
                <div class="col-auto"><button class="btn btn-primary">Find Location</button></div>
            </div>
        </form>        
    </div>    
</div>
<hr>
<div class="row">
    <div class="col-lg-12" id="contentlocation">

    </div>
</div>
