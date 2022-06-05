<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JoshybaCorpDevs\EasyBroker\EasyBroker;

class EasybrokerController extends Controller
{
    /** CONTACTS_REQUEST */
    public function contact_req_getall()
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        $contactosResponsePagination = $easy->client()->contact_requests()->search([]);
        session()->put("contactosResponsePagination",$contactosResponsePagination);
        if(!$contactosResponsePagination->error())
        {
            $content=$contactosResponsePagination->content();
            $paginator=$this->paginator($contactosResponsePagination->page(),$contactosResponsePagination->total());
            return view("contact_request/contactoscontent",compact('content','paginator'));
        }
        else
        {
            return AlertError($contactosResponsePagination->response()["error"]);
        }
    }
    public function contact_req_get_all_next($page)
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        if(!session()->has("contactosResponsePagination"))
        {
            $contactosResponsePagination = $easy->client()->contact_requests()->search([]);
            session()->put("contactosResponsePagination",$contactosResponsePagination);            
        }
        else
        {
            $contactosResponsePagination = session()->get("contactosResponsePagination");
        }   
        if(!$contactosResponsePagination->error())
        {
            $contactosResponsePagination->select_page($page);
            $content=$contactosResponsePagination->content();
            $paginator=$this->paginator($contactosResponsePagination->page(),$contactosResponsePagination->total());              
            return view("contact_request/contactoscontent",compact('content','paginator'));
        }
        else
        {
            return AlertError($contactosResponsePagination->response()["error"]);
        } 
    }
    function paginator($page,$total)
    {
        $previus_page=0;
        $previus_status="disabled";
        $page_first=$page;
        $page_first_status="";
        $page_second=2;
        $page_second_status="disabled";
        $page_third=3;
        $page_third_status="disabled";
        $next_page=0;
        $next_page_status="disabled";
        //
        if($page>1)
        {
            $previus_status="";
            $previus_page=$page-1;
        }

        if($page<$total)//1<1
        {
            $page_second=$page+1;
            $page_second_status="";
            $next_page=$page_second;
            $next_page_status="";
        }
        if(($page+2)<=$total)//3<=1
        {
            $page_third=$page+2;
            $page_third_status="";
        }
        $paginator["previus_page"]=$previus_page;  
        $paginator["previus_status"]=$previus_status;          
        $paginator["page_first"]=$page_first;
        $paginator["page_first_status"]=$page_first_status;        
        $paginator["page_second"]=$page_second;
        $paginator["page_second_status"]=$page_second_status;
        $paginator["page_third"]=$page_third;
        $paginator["page_third_status"]=$page_third_status; 
        $paginator["next_page"]=$next_page;   
        $paginator["next_status"]=$next_page_status;
        $paginator["page_total"]=$total;
        return $paginator;            
    }
    public function contact_req_save()
    {
        $validator = Validator::make(request()->all(), [
            'cname' => 'required|max:255',
            'cphone' => 'required',
            'cemail'=> 'required',
            'cid'=> 'required',
            'cmsg'=> 'required',
            'csource'=> 'required',
        ]);
        if ($validator->fails()) {
            /*
                return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
            */
            return view("errorsvalidators")->with("errors",$validator->errors());         
        }        
        $parameters=request()->all();
        $parameters=[
            "name"=>$parameters["cname"],
            "phone"=>$parameters["cphone"],
            "email"=>$parameters["cemail"],
            "property_id"=>$parameters["cid"],
            "message"=>$parameters["cmsg"],
            "source"=>$parameters["csource"],           
        ];
        $parameters=json_encode($parameters);
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        $contactNewResponse=$easy->client()->contact_requests()->create($parameters);
        $contactNewResponse=json_decode($contactNewResponse,true);
        return view("errorsresponse",["response"=>$contactNewResponse]);
    }
    /** PROPERTIES */
    public function properties_get_all()
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        $PropertiesResponsePagination = $easy->client()->properties()->search([]);
        session()->put("PropertiesResponsePagination",$PropertiesResponsePagination);
        if(!$PropertiesResponsePagination->error())
        {
            $content=$PropertiesResponsePagination->content();
            $paginator=$this->paginator($PropertiesResponsePagination->page(),$PropertiesResponsePagination->total());
            return view("properties/propertiescontent",compact('content','paginator'));
        }
        else
        {
            return AlertError($PropertiesResponsePagination->response()["error"]);
        }
    }  
    public function properties_get_all_next($page)
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        if(!session()->has("PropertiesResponsePagination"))
        {
            $PropertiesResponsePagination = $easy->client()->properties()->search([]);
            session()->put("PropertiesResponsePagination",$PropertiesResponsePagination);            
        }
        else
        {
            $PropertiesResponsePagination = session()->get("PropertiesResponsePagination");
        }     
        if(!$PropertiesResponsePagination->error())
        {
            $PropertiesResponsePagination->select_page($page);
            $content=$PropertiesResponsePagination->content();
            $paginator=$this->paginator($PropertiesResponsePagination->page(),$PropertiesResponsePagination->total());       
            return view("properties/propertiescontent",compact('content','paginator'));
        }
        else
        {
            return AlertError($PropertiesResponsePagination->response()["error"]);
        }
    }     
    public function properties_get_by_id($id)
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        $PropertiesResponseById = $easy->client()->properties()->find($id);
        if(isset($PropertiesResponseById["error"]))
        return AlertError($PropertiesResponseById["error"]);
        else
        return view("properties/propertiescontentbyid",compact('PropertiesResponseById'));
    }   
    /** MLS PROPERTIES */
    public function mlsproperties_get_all()
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        $MlsPropertiesResponsePagination = $easy->client()->mls_properties()->search([]);
        session()->put("MlsPropertiesResponsePagination",$MlsPropertiesResponsePagination);
        if(!$MlsPropertiesResponsePagination->error())
        {
            $content=$MlsPropertiesResponsePagination->content();
            $paginator=$this->paginator($MlsPropertiesResponsePagination->page(),$MlsPropertiesResponsePagination->total());
            return view("mlsproperties/mlspropertiescontent",compact('content','paginator'));
        }
        else
        {
            return AlertError($MlsPropertiesResponsePagination->response()["error"]);
        }
    }  
    public function mlsproperties_get_all_next($page)
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        if(!session()->has("MlsPropertiesResponsePagination"))
        {
            $MlsPropertiesResponsePagination = $easy->client()->properties()->search([]);
            session()->put("MlsPropertiesResponsePagination",$MlsPropertiesResponsePagination);            
        }
        else
        {
            $MlsPropertiesResponsePagination = session()->get("MlsPropertiesResponsePagination");
        }   
        if(!$MlsPropertiesResponsePagination->error())
        {
            $MlsPropertiesResponsePagination->select_page($page);
            $content=$MlsPropertiesResponsePagination->content();
            $paginator=$this->paginator($MlsPropertiesResponsePagination->page(),$MlsPropertiesResponsePagination->total()); 
            return view("mlsproperties/mlspropertiescontent",compact('content','paginator'));
        }
        else
        {
            return AlertError($MlsPropertiesResponsePagination->response()["error"]);
        }        
    }    
    public function mlsproperties_get_by_id($id)
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        $MlsPropertiesResponseById = $easy->client()->mls_properties()->find($id);
        if(isset($MlsPropertiesResponseById["error"]))
        return AlertError($MlsPropertiesResponseById["error"]);
        else
        return view("mls_properties/mlspropertiescontentbyid",compact('MlsPropertiesResponseById'));
    }  
    /**Locations */      
    public function locations($location="")
    {
        $easy=new EasyBroker(env("API_KEY_EasyBroker"),env('APP_ENV'));
        $contactosResponsePagination = $easy->client()->locations()->search("query=".$location);
        if(!$contactosResponsePagination->error())
        {
            $content=$contactosResponsePagination->content();
            $paginator=$this->paginator($contactosResponsePagination->page(),$contactosResponsePagination->total());
            return view("locations/locationscontent",compact('content','paginator'));
        }
        else
        {
            return AlertError($contactosResponsePagination->response()["error"]);
        }
    }
}
