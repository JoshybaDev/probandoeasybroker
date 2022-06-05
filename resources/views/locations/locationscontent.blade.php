@if (count($content)>0)
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <strong>Name</strong>: {{$content["name"]}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <strong>Full Name</strong>: {{$content["full_name"]}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <strong>Type</strong>: {{$content["type"]}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <strong>localities</strong>:
                        @foreach ($content["localities"] as $index => $anagent)
                        <div class="row">
                            <div class="col-lg-5 text-end"><strong>{{ $index }}</strong>:</div>
                            <div class="col-lg-7">{{ $anagent }}</div>
                        </div>                                        
                @endforeach                        
                    </div>
                </div>                                
            </div>
        </div>
    </div>
</div>
@else
<div class="alert alert-success">
    No localizado
</div>
@endif