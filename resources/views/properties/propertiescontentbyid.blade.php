    <div style="overflow-y:auto;height:400px;">
        <div class="row">
            <div class="col-lg-12">
                <label for="public_id"><strong>public_id</strong></label>
                <input type="text" name="public_id" id="public_id" class="form-control"
                    value="{{ $PropertiesResponseById['public_id'] }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label for="title"><strong>title</strong></label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ $PropertiesResponseById['title'] }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label for="property_type"><strong>property type</strong></label>
                <input type="text" name="property_type" id="property_type" class="form-control"
                    value="{{ $PropertiesResponseById['property_type'] }}" readonly>
            </div>
        </div>        
        <div class="row">
            <div class="col-lg-12">
                <label for="description"><strong>description</strong></label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" readonly>
                    {{ $PropertiesResponseById['description'] }}
                </textarea>
            </div>
        </div>
        <div class="row">
            @php
            $itema=1;
            $itemb=1;
            $property_images=$PropertiesResponseById['property_images'] ?? [];
            @endphp
            @if(count($property_images)>0)
            <div class="col-lg-12">
                <label for="agent"><strong>Images</strong></label>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @foreach ($property_images as $ximg)
                            @if($itema==1)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$itema-1}}" class="active" aria-current="true" aria-label="Slide {{$itema}}"></button>                            
                            @else
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$itema-1}}" aria-label="Slide {{$itema}}"></button>
                            @endif
                            @php
                                $itema++;
                            @endphp
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($property_images as $ximg)
                        @if($itemb==1)
                        <div class="carousel-item active">
                            <img src="{{$ximg["url"]}}" class="d-block w-100" alt="">
                          </div>                        
                        @else
                        <div class="carousel-item">
                            <img src="{{$ximg["url"]}}" class="d-block w-100" alt="">
                          </div>
                        @endif
                        @php
                            $itemb++;
                        @endphp                            
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            @endif
        </div>         
        <div class="row">
            <div class="col-lg-6">
                <label for="bedrooms"><strong>bedrooms</strong></label>
                <input type="text" name="bedrooms" id="bedrooms" class="form-control"
                    value="{{ $PropertiesResponseById['bedrooms'] ?? 'N/A' }}" readonly>
            </div>
            <div class="col-lg-6">
                <label for="bathrooms"><strong>bathrooms</strong></label>
                <input type="text" name="bathrooms" id="bathrooms" class="form-control"
                    value="{{ $PropertiesResponseById['bathrooms'] ?? 'N/A' }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="half_bathrooms"><strong>half bathrooms</strong></label>
                <input type="text" name="half_bathrooms" id="half_bathrooms" class="form-control"
                    value="{{ $PropertiesResponseById['half_bathrooms'] ?? 'N/A' }}" readonly>
            </div>
            <div class="col-lg-6">
                <label for="parking_spaces"><strong>parking spaces</strong></label>
                <input type="text" name="parking_spaces" id="parking_spaces" class="form-control"
                    value="{{ $PropertiesResponseById['parking_spaces'] ?? 'N/A' }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <label for="lot_size"><strong>lot size</strong></label>
                <input type="text" name="lot_size" id="lot_size" class="form-control"
                    value="{{ $PropertiesResponseById['lot_size'] ?? 'N/A' }}" readonly>
            </div>
            <div class="col-lg-6">
                <label for="construction_size"><strong>construction size</strong></label>
                <input type="text" name="construction_size" id="construction_size" class="form-control"
                    value="{{ $PropertiesResponseById['construction_size'] ?? 'N/A' }}" readonly>
            </div>
        </div> 
        <div class="row">
            <div class="col-lg-12">
                <label><strong>location</strong></label><br>
                <div class="card">
                    <div class="card-body">
                        @php
                        $Location =$PropertiesResponseById['location'] ?? [];
                    @endphp
                        <strong>location</strong>: {{$Location["name"]}}<br>
                        <strong>latitude</strong>: {{$Location["latitude"]}}<br>
                        <strong>longitude</strong>: {{$Location["longitude"]}}<br>
                        <strong>street</strong>: {{$Location["street"]?? ''}}<br>
                        <strong>postal code</strong>: {{$Location["postal_code"] ?? ''}}<br>
                    </div>
                </div>

            </div>
        </div>  
        <div class="row">
            @php
                $agent=$PropertiesResponseById['agent'] ?? [];
            @endphp
            <div class="col-lg-12">
                <label for="agent"><strong>agent</strong></label>
                @if(count($agent)>0)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="{{$agent["profile_image_url"]}}" alt="" width="200px">
                            </div>
                            <div class="col-lg-8">
                                <strong>id</strong>: {{$agent["id"]}}<br>
                                <strong>name</strong>: {{$agent["full_name"]}}<br>
                                <strong>mobile phone</strong>: {{$agent["mobile_phone"]}}<br>
                                <strong>email</strong>: {{$agent["email"]}}<br>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>           
        <div class="row">          
            <div class="col-lg-12">
                <label><strong>Operations</strong></label>
                <div class="card">
                    <div class="card-body">
                        @foreach ($PropertiesResponseById['operations'] as $index => $anOper)
                        @foreach ($anOper as $index => $deatils)
                        <div class="row">
                            <div class="col-lg-5 text-end"><strong>{{ $index }}</strong>:</div>
                            <div class="col-lg-7">{{ $deatils }}</div>
                        </div>                                        
                        @endforeach
                        <hr>
                        @endforeach                          
                    </div>
                </div>
            </div>           
        </div>        
    </div>