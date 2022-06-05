<form action="" id="formcontactnew">
    @csrf
    <div class="modal fade" id="ModalNewContact" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div id="conactnewmsg"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="cname">Name</label>
                            <input type="text" name="cname" id="cname" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="cphone">Phone</label>
                            <input type="text" name="cphone" id="cphone" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="cemail">Email</label>
                            <input type="text" name="cemail" id="cemail" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="cid">Id</label>
                            <input type="text" name="cid" id="cid" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="cmsg">Message</label>
                            <input type="text" name="cmsg" id="cmsg" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="csource">Source</label>
                            <input type="text" name="csource" id="csource" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
