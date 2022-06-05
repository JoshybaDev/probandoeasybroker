<table class="table table-bordered table-condensed table-hover table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Message</th>
            <th>Source</th>
            <th>Happend</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($content as $uncontact)
        <tr>
            <td>{{$uncontact["property_id"]}}</td>            
            <td>{{$uncontact["name"]}}</td>
            <td>{{$uncontact["phone"]}}</td>
            <td>{{$uncontact["email"]}}</td>
            <td>{{$uncontact["message"]}}</td>
            <td>{{$uncontact["source"]}}</td>
            <td>{{$uncontact["happened_at"]}}</td>
        </tr>
        @endforeach        
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        @php 
        $previus_page=$paginator["previus_page"];  
        $page_first=$paginator["page_first"];  
        $page_second=$paginator["page_second"];  
        $page_third=$paginator["page_third"]; 
        $next_page=$paginator["next_page"]; 
        $page_total=$paginator["page_total"]; 
        @endphp
        <li class="page-item {{$paginator["previus_status"]}}"><a class="page-link" href="#" onclick="easybroker.findNext('contentcr1','contactreqgetall/{{$previus_page}}')">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#" onclick="easybroker.findNext('contentcr1','contactreqgetall/{{$page_first}}')">{{$page_first}}</a></li>
        <li class="page-item"><a class="page-link" href="#" onclick="easybroker.findNext('contentcr1','contactreqgetall/{{$page_second}}')">{{$page_second}}</a></li>
        <li class="page-item"><a class="page-link" href="#" onclick="easybroker.findNext('contentcr1','contactreqgetall/{{$page_third}}')">{{$page_third}}</a></li>
        <li class="page-item"><a class="page-link" href="#">. . .{{$page_total}}</a></li>
        <li class="page-item {{$paginator["next_status"]}}"><a class="page-link" href="#" onclick="easybroker.findNext('contentcr1','contactreqgetall/{{$next_page}}')">Next</a></li>
    </ul>
</nav>    