<table class="table table-bordered table-condensed table-hover table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image</th>
            <th>Location</th>
            <th>Property Type</th>
            <th>Update_at</th>
            <th>Price</th>
            <th>More info</th>
        </tr>
    </thead>
    <tbody>
        @php $item=0 @endphp
        @foreach ($content as $uncontact)
            @php $item++; @endphp
            <tr>
                <td>{{ $uncontact['public_id'] ?? 0 }}</td>
                <td>{{ $uncontact['title'] ?? '' }}</td>
                <td><img onclick="JoshyVisor('{{ $uncontact['title_image_full'] }}','jpg',tipo='boostrap')"
                        src="{{ $uncontact['title_image_thumb'] }}"></td>
                <td>{{ $uncontact['location'] }}</td>
                <td>{{ $uncontact['property_type'] }}</td>
                <td>{{ $uncontact['updated_at'] }}</td>
                <td>{{ $uncontact['show_prices'] }}</td>
                <td><a class="btn btn-info rounded" href="#item_{{ $item }}"
                        onclick="document.getElementById('item_{{ $item }}').style.display=''">Show</a>
                </td>
            </tr>
            <tr style="display: none" id="item_{{ $item }}">
                <td colspan="8">
                    <a name="item_{{ $item }}"></a>
                    <div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-5 text-end"><strong>bedrooms</strong>:</div>
                                    <div class="col-lg-7">{{ $uncontact['bedrooms'] }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 text-end"><strong>bathrooms</strong>:</div>
                                    <div class="col-lg-7">{{ $uncontact['bathrooms'] }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 text-end"><strong>lot_size</strong>:</div>
                                    <div class="col-lg-7">{{ $uncontact['lot_size'] }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 text-end"><strong>construction_size</strong>:</div>
                                    <div class="col-lg-7">{{ $uncontact['construction_size'] }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 text-end"><strong>agent</strong>:</div>
                                    <div class="col-lg-7">{{ $uncontact['agent'] }}</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12 text-center"><h6>Operations</h6></div>
                                </div>
                                @foreach ($uncontact['operations'] as $index => $anOper)
                                        @foreach ($anOper as $index => $deatils)
                                        <div class="row">
                                            <div class="col-lg-5 text-end"><strong>{{ $index }}</strong>:</div>
                                            <div class="col-lg-7">{{ $deatils }}</div>
                                        </div>                                        
                                        @endforeach
                                        <hr>
                                @endforeach
                            </div>
                            <div class="col-lg-4 text-end">
                                <button class="btn btn-danger rounded"
                                onclick="document.getElementById('item_{{ $item }}').style.display='none'">Hide</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        @php
            $previus_page = $paginator['previus_page'];
            $page_first = $paginator['page_first'];
            $page_second = $paginator['page_second'];
            $page_third = $paginator['page_third'];
            $next_page = $paginator['next_page'];
            $page_total = $paginator['page_total'];
        @endphp
        <li class="page-item {{ $paginator['previus_status'] }}"><a class="page-link" href="#"
                onclick="easybroker.findNext('contentpro1','propertiesgetall/{{ $previus_page }}')">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#"
                onclick="easybroker.findNext('contentpro1','propertiesgetall/{{ $page_first }}')">{{ $page_first }}</a>
        </li>
        <li class="page-item"><a class="page-link" href="#"
                onclick="easybroker.findNext('contentpro1','propertiesgetall/{{ $page_second }}')">{{ $page_second }}</a>
        </li>
        <li class="page-item"><a class="page-link" href="#"
                onclick="easybroker.findNext('contentpro1','propertiesgetall/{{ $page_third }}')">{{ $page_third }}</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">. . .{{ $page_total }}</a></li>
        <li class="page-item {{ $paginator['next_status'] }}"><a class="page-link" href="#"
                onclick="easybroker.findNext('contentpro1','propertiesgetall/{{ $next_page }}')">Next</a></li>
    </ul>
</nav>
