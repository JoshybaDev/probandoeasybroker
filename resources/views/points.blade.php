@extends("layouts",['title'=>'Consultas'])
@section("content")
<div class="card">
    <div class="card-body">List of Functions</div>
</div>
<div class="">&nbsp;</div>
<div id="msg_global_ajax"></div>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="contactr-tab" data-bs-toggle="tab" data-bs-target="#contactr-tab-pane" type="button" role="tab" aria-controls="contactr" aria-selected="true">Contact Requests</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="properties-tab" data-bs-toggle="tab" data-bs-target="#properties-tab-pane" type="button" role="tab" aria-controls="properties-tab-pane" aria-selected="false">Properties</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="mlsproperties-tab" data-bs-toggle="tab" data-bs-target="#mlsproperties-tab-pane" type="button" role="tab" aria-controls="mlsproperties-tab-pane" aria-selected="false">Mls Properties</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="locations-tab" data-bs-toggle="tab" data-bs-target="#locations-tab-pane" type="button" role="tab" aria-controls="locations-tab-pane" aria-selected="false">Locations</button>
    </li>
</ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="contactr-tab-pane" role="tabpanel" aria-labelledby="contactr-tab" tabindex="0">
        @include('contact_request/contacts')
    </div>
    <div class="tab-pane fade" id="properties-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
      @include('properties/properties')
    </div>
    <div class="tab-pane fade" id="mlsproperties-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
      @include('mls_properties/mlsproperties')
    </div>
    <div class="tab-pane fade" id="locations-tab-pane" role="tabpanel" aria-labelledby="locations-tab" tabindex="0">
      @include('locations/locations')
    </div>
  </div>
  @include('modal')  
  @include('contact_request/contactsnewmodal')
  @include('properties/propertiesbyidmodalshow')
  @include('mls_properties/mlspropertiesbyidmodalshow')  
  <div id="joshyvisorcontent"></div>
@endsection
@section("script")
<script src="{{asset('js/joshyvisor.js')}}"></script>
@endsection