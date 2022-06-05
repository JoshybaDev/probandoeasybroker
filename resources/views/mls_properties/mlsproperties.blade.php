<div class="row mt-3">
    <div class="col-lg-2 text-center">
        <form id="formmlspropertiesgetall">
            @csrf
            <button class="btn btn-success">Get Page 1</button>
        </form>
    </div>
    {{-- <div class="col-lg-2 text-center">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalNewPropertie">New Propertie</button>
    </div> --}}
    <div class="col-lg-5 text-center">
        <form id="formmlspropertiefindbyid">
            @csrf
            <div class="row">
                <div class="col-auto"><input type="text" name="idmls" id="idmls" class="form-control text-center" placeholder="MlsPropertie_id"></div>
                <div class="col-auto"><button class="btn btn-primary">Find by Id</button></div>
            </div>
        </form>        
    </div>    
</div>
<hr>
<div class="row">
    <div class="col-lg-12" id="contentmlspro">

    </div>
</div>
